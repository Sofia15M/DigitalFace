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
                <a href="#">Propietarios</a>
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
                                    <th colspan="6" class="titulo">Propietarios</th>
                                </tr>
                                <tr>
                                    <th scope="col">N. documento</th>
                                    <th scope="col">Foto</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Telefono</th>
                                    <th scope="col">Fecha de Modificacion</th>
                                    <th scope="col">Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    include '../../Conexion/conexion.php';

                                    $queryActivos = "SELECT * FROM propietarios WHERE status = 'active'";
                                    $resultActivos = mysqli_query($connection, $queryActivos);

                                    while ($row = mysqli_fetch_assoc($resultActivos)) {
                                        echo "<tr>
                                                <td>{$row['ID_Propietario']}</td>
                                                <td><img src='mostrar_imagen.php?id={$row['ID_Propietario']}' style='width: 150px; height: 180px;'></td>
                                                <td>{$row['Nombre_Propietario']}</td>
                                                <td>{$row['Tel_Cel_Propietario']}</td>
                                                <td>{$row['Fecha_Registro']}</td>
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
