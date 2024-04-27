<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../CSS/nav.css">
    <link rel="stylesheet" href="../../CSS/styleEditar.css">
    <link rel="icon" href="../../IMG/Logo.jpg" type="image/x-icon">
    <title>Editar Residente</title>
</head>
<body>
    <header class="header">
        <div class="container">
            <nav class="menu">
                <a href="#">Editar Residente</a>
                <a href="index.php" class="atras">Volver atrás</a>
            </nav>
        </div>
    </header>
    <div class="container">
        <?php
            include '../../Conexion/conexion.php';
            if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                $id = $_GET['id']; 
                $query = "SELECT * FROM residentes WHERE ID_Residente = $id AND status = 'active'";
                $result = mysqli_query($connection, $query);
                                
                if (mysqli_num_rows($result) == 1) {
                    $row = mysqli_fetch_assoc($result);
                                
                    include 'editar.php';
                } else {
                    echo "No se encontró ningún registro con el ID proporcionado.";
                }
            } else {
                echo "ID no válido.";
            }
        ?>
        <form action="editar.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row['ID_Residente']; ?>">
            <h2>Editar Información del Residente</h2>
            <div class="column column-left">
                <label for="imagen">Imagen:</label>
                <img src="data:image/jpeg;base64,<?php echo base64_encode($row['Foto_Residente']); ?>" alt="Foto actual del trabajador" width="280">
                <input type="file" name="Foto_Residente" accept="image/*">
            </div>
            <div class="column column-right">
                <br>
                <label>Nombre del Residente</label>
                <input type="text" name="Nombre_Residente" class="form-control" required="" placeholder="Nombre_Residente" value="<?php echo $row['Nombre_Residente']; ?>">
                <br>
                <label>Telefono</label>
                <input type="text" name="Tel_Cel_Residente" class="form-control" required="" placeholder="Tel_Cel_Residente" value="<?php echo $row['Tel_Cel_Residente']; ?>">
                <br>
                <label>ID del Apartamento</label>
                <input type="text" name="ID_Apartamento" class="form-control" required="" placeholder="ID_Apartamento " value="<?php echo $row['ID_Apartamento']; ?>">
                <br>
                <br/>
                <input type="submit" class="button" name="editar" value="Editar Residente">
            </div>
        </form>
    </div>
</body>
</html>
