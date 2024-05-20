<?php
include '../../Conexion/conexion.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../CSS/styleDesativar.css">
    <link rel="icon" href="../../IMG/Logo.jpg" type="image/x-icon">
    <title>Info. Usuarios</title>
</head>
<body>
    <header class="header">
        <div class="container">
        <nav class="menu">
                <a href="#">Usuarios Desactivados</a>
                <a href="index.php" class="atras" >Volver atras</a>
            </nav>
        </div>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th colspan="12" class="titulo">Usuarios Desactivados</th>
                                </tr>

                                <tr>
                                    <th scope="col">N. documento</th>
                                    <th scope="col">Foto</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Edad</th>
                                    <th scope="col">Cargo</th>
                                    <th scope="col">Direccion</th>
                                    <th scope="col">Telefono</th>
                                    <th scope="col">Tiempo trabajo</th>
                                    <th scope="col">Fecha de modificacion</th>
                                    <th scope="col">Acciones</th>>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $queryDesactivados = "SELECT * FROM Personal_Limpieza WHERE status = 'inactive'";
                                    $resultDesactivados = mysqli_query($connection, $queryDesactivados);

                                    while ($row = mysqli_fetch_assoc($resultDesactivados)) {
                                        echo "<tr>
                                                <td>{$row['ID_PersonalL']}</td>
                                                <td><img src='mostrar_imagen.php?id={$row['ID_PersonalL']}' style='width: 150px; height: 180px;'></td>
                                                <td>{$row['Nombre_PersonalL']}</td>
                                                <td>{$row['Edad_PersonalL']}</td>
                                                <td>{$row['Cargo_PersonalL']}</td>
                                                <td>{$row['Direccion_PersonalL']}</td>
                                                <td>{$row['Tel_Cel_PersonalL']}</td>
                                                <td>{$row['Tiempo_trabajo']}</td>
                                                <td>{$row['Fecha_Registro']}</td>
                                                <td>
                                                <a href='activar.php?id={$row['ID_PersonalL']}' class='activar'>Activar</a>
                                                </td>
                                            </tr>";
                                    }

                                    mysqli_close($connection);
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
