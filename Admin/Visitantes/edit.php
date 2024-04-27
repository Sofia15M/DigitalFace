<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../CSS/styleEditar.css">
    <link rel="stylesheet" href="../../CSS/nav.css">
    <link rel="icon" href="../../IMG/Logo.jpg" type="image/x-icon">
    <title>Editar Personal de Limpieza</title>
</head>
<body>
    <header class="header">
        <div class="container">
            <nav class="menu">
                <a href="#">Editar Visitante</a>
                <a href="index.php" class="atras">Volver atrás</a>
            </nav>
        </div>
    </header>
    <div class="container">
        <?php
            include '../../Conexion/conexion.php';

            if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                $id = $_GET['id'];                          
                    $query = "SELECT * FROM visitantes WHERE ID_Visitante = $id AND status = 'active'";
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
            <h2>Editar Información Visitante</h2>
            <input type="hidden" name="id" value="<?php echo $row['ID_Visitante']; ?>">
            <div class="column column-left">
                <label for="imagen">Imagen:</label>
                <img src="data:image/jpeg;base64,<?php echo base64_encode($row['Foto_Visitante']); ?>" alt="Foto actual del trabajador" width="250">
                <input type="file" name="Foto_Visitante" accept="image/*">
            </div>
            <div class="column column-right">
                <label for="nombre">Nombre:</label>
                <input type="text" name="Nombre_Visitante" value="<?php echo $row['Nombre_Visitante']; ?>">
                <br>
                <label for="telefono">Teléfono:</label>
                <input type="text" name="Tel_Cel_Visitante" value="<?php echo $row['Tel_Cel_Visitante']; ?>">
                <br>
                <label for="Hora_Salida">Hora de salida:</label>
                <input type="datetime-local" name="Hora_Salida" value="<?php echo isset($row['Hora_Salida']) ? date('Y-m-d\TH:i', strtotime($row['Hora_Salida'])) : ''; ?>">
                <br>
                <br/>
                <input type="submit" class="button" name="editar" value="Editar Visitante">
            </div>
        </form>
    </div>
</body>
</html>
