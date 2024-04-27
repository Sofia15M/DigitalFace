<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../CSS/styleDesativar.css">
    <link rel="icon" href="../../IMG/Logo.jpg" type="image/x-icon">
    <title>Info. Residentes</title>
</head>
<body>
    <header class="header">
        <div class="container">
        <nav class="menu">
                <a href="#">Residentes Desativados</a>
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
                                    <th colspan="7" class="titulo">Residentes Desactivados</th>
                                </tr>

                                <tr>
                                <th scope="col">N. Documento</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Nombre completo</th>
                                <th scope="col">Telefono</th>
                                <th scope="col">Fecha de Registro</th>
                                <th scope="col">N. Apartamento</th>
                                <th cope="col">Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    include '../../Conexion/conexion.php';
                                    $queryDesactivados = "SELECT * FROM residentes WHERE status = 'inactive'";
                                    $resultDesactivados = mysqli_query($connection, $queryDesactivados);

                                    while ($row = mysqli_fetch_assoc($resultDesactivados)) {
                                        echo "<tr>
                                                <td>{$row['ID_Residente']}</td>
                                                <td><img src='mostrar_imagen.php?id={$row['ID_Residente']}' style='width: 150px; height: 180px;'></td>
                                                <td>{$row['Nombre_Residente']}</td>
                                                <td>{$row['Tel_Cel_Residente']}</td>
                                                <td>{$row['Fecha_Registro']}</td>
                                                <td>{$row['ID_Apartamento']}</td>
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
</body>
</html>
