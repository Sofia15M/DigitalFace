<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../CSS/nav.css">
    <link rel="stylesheet" href="../../CSS/styleEditar.css">
    <link rel="icon" href="../../IMG/Logo.jpg" type="image/x-icon">
    <title>Editar Personal de Limpieza</title>
    <style>
        form {
            height: 550px;
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="container">
            <nav class="menu">
                <a href="#">Editar Personal</a>
                <a href="index.php" class="atras">Volver atrás</a>
            </nav>
        </div>
    </header>
    <div class="container">
        <?php
            include '../../Conexion/conexion.php';

            if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                $id = $_GET['id'];                          $query = "SELECT * FROM personal_limpieza WHERE ID_PersonalL = $id AND status = 'active'";
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
            <input type="hidden" name="id" value="<?php echo $row['ID_PersonalL']; ?>">
            <div class="column column-left">
                <h2>Editar Información Personal de Limpieza</h2>
                <label for="imagen">Imagen:</label>
                <img src="data:image/jpeg;base64,<?php echo base64_encode($row['Foto_PersonalL']); ?>" alt="Foto actual del trabajador" width="280">
                <input type="file" name="Foto_PersonalL" accept="image/*">
            </div>
            <div class="column column-right">
                <label for="nombre">Nombre:</label>
                <input type="text" name="Nombre_PersonalL" value="<?php echo $row['Nombre_PersonalL']; ?>">
                <br>
                <label for="edad">Edad:</label>
                <input type="text" name="Edad_PersonalL" value="<?php echo $row['Edad_PersonalL']; ?>">
                <br>
                <label for="cargo">Cargo:</label>
                <input type="text" name="Cargo_PersonalL" value="<?php echo $row['Cargo_PersonalL']; ?>">
                <label for="direccion">Dirección:</label>
                <input type="text" name="Direccion_PersonalL" value="<?php echo $row['Direccion_PersonalL']; ?>">
                <br>
                <label for="telefono">Teléfono:</label>
                <input type="text" name="Tel_Cel_PersonalL" value="<?php echo $row['Tel_Cel_PersonalL']; ?>">
                <br>
                <label for="tiempo_trabajo">Tiempo de Trabajo:</label>
                <input type="text" name="tiempo_trabajo" value="<?php echo $row['Tiempo_trabajo']; ?>">
                <br>
                <br/>
                <input type="submit" class="button" name="editar" value="Editar Trabajador">
            </div>
        </form>
    </div>
</body>
</html>

