<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../CSS/style.css">
    <link rel="stylesheet" href="../../CSS/nav.css">
    <link rel="icon" href="../../IMG/Logo.jpg" type="image/x-icon">
    <title>Info. Personal De Limpieza</title>
</head>
<body>
    <header class="header">
        <div class="container">
            <nav class="menu">
                <a href="#">Personal De Limpieza</a>
                <a href="desactivados.php" class="desativados">Ver Desactivados</a>
                <a href="../IndexVigilante.php" class="atras">Volver atrás</a>
            </nav>
        </div>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <br>
                        <form method="post" action="index.php">
                            <button type="submit" name="download_pdf" class="btn btn-primary">Descargar PDF</button>
                        </form>
                        <br/><br/>
                        <table>
                            <thead>
                                <tr>
                                    <th colspan="11" class="titulo">Personal Limpieza</th>
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
                                    <th scope="col">ID Unidad</th>
                                    <th scope="col">Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    include '../../Conexion/conexion.php';

                                    $queryActivos = "SELECT * FROM personal_limpieza WHERE status = 'active'";
                                    $resultActivos = mysqli_query($connection, $queryActivos);

                                    while ($row = mysqli_fetch_assoc($resultActivos)) {
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
                                                <td>{$row['ID_UNIDAD']}</td>
                                                <td>{$row['status']}</td>
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
    <br>
</body>
</html>
