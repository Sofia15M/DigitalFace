<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../CSS/nav.css">
    <link rel="stylesheet" href="../../CSS/styleEditar.css">
    <link rel="icon" href="../../IMG/Logo.jpg" type="image/x-icon">
    <title>Editar Administrador</title>
    <style>

        form {
            width: 800px; /* Ajustar el ancho del formulario */
            height: 600px;
            margin-top: 80px;
        }

    </style>
</head>
<body>
    <header class="header">
        <div class="container">
            <nav class="menu">
                <a href="#">Editar Administrador</a>
                <a href="index.php" class="atras">Volver atrás</a>
            </nav>
        </div>
    </header>
    <div class="container">
        <?php
            include '../../Conexion/conexion.php';

            if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                $id = $_GET['id'];                          
                    $query = "SELECT * FROM Administrador WHERE ID_Administrador = $id AND Estado = 'activo'";
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
            <h2>Editar Información del Administrador</h2>
            <input type="hidden" name="id" value="<?php echo $row['ID_Administrador']; ?>">
            <div class="column column-left">
                <label for="imagen">Imagen:</label>
                <img src="data:image/jpeg;base64,<?php echo base64_encode($row['Foto_Administrador']); ?>" alt="Foto actual del trabajador" width="250">
                <input type="file" name="Foto_Administrador" accept="image/*">
            </div>
            <div class="column column-right">
                <label for="nombre">Nombre:</label>
                <input type="text" name="Nombre_Administrador" value="<?php echo $row['Nombre_Administrador']; ?>">
                <br>
                <label for="edad">Edad:</label>
                <input type="text" name="Edad_Administrador" value="<?php echo $row['Edad_Administrador']; ?>">
                <br>
                <label for="cargo">Cargo:</label>
                <input type="text" name="Cargo_Administrador" value="<?php echo $row['Cargo_Administrador']; ?>">
                <br>
                <label for="direccion">Dirección:</label>
                <input type="text" name="Direccion_Administrador" value="<?php echo $row['Direccion_Administrador']; ?>">
                <br>
                <label for="telefono">Teléfono:</label>
                <input type="text" name="Tel_Cel_Administrador" value="<?php echo $row['Tel_Cel_Administrador']; ?>">
                <br>
                <label for="tiempo_trabajo">Tiempo de Trabajo:</label>
                <input type="text" name="tiempo_trabajo" value="<?php echo $row['Tiempo_trabajo']; ?>">
                <br/>
                <input type="submit" class="button" name="editar" value="Editar Administrador">
            </div>
        </form>
    </div>
</body>
</html>

