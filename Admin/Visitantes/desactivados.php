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
    <title>Info. Visitantes</title>
</head>
<body>
    <header class="header">
        <div class="container">
        <nav class="menu">
                <a href="#">Visitantes Desactivados</a>
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
                                    <th colspan="9" class="titulo">Visitantes Desactivados</th>
                                </tr>

                                <tr>
                                    <th scope="col">N. documento</th>
                                    <th scope="col">Foto</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Telefono</th>
                                    <th scope="col">Fecha de Modificación</th>
                                    <th scope="col">Hora de entrada</th>
                                    <th scope="col">Hora de salida</th>
                                    <th scope="col">N. Apartamento</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $queryDesactivados = "SELECT * FROM visitantes WHERE status = 'inactive'";
                                    $resultDesactivados = mysqli_query($connection, $queryDesactivados);

                                    while ($row = mysqli_fetch_assoc($resultDesactivados)) {
                                        echo "<tr>
                                                <td>{$row['ID_Visitante']}</td>
                                                <td><img src='mostrar_imagen.php?id={$row['ID_Visitante']}' style='width: 150px; height: 180px;'></td>
                                                <td>{$row['Nombre_Visitante']}</td>
                                                <td>{$row['Tel_Cel_Visitante']}</td>
                                                <td>{$row['Fecha_Registro']}</td>
                                                <td>{$row['Hora_Ingreso']}</td>
                                                <td>{$row['Hora_Salida']}</td>
                                                <td>{$row['ID_Apartamento']}</td>
                                                <td>
                                                <a href='activar.php?id={$row['ID_Visitante']}' class='activar'>Activar</a>
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
