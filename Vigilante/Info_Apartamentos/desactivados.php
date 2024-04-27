<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../CSS/styleDesativar.css">
    <link rel="icon" href="../../IMG/Logo.jpg" type="image/x-icon">
    <title>Info. Apartamentos</title>
</head>
<body>
    <header class="header">
        <div class="container">
        <nav class="menu">
                <a href="#">Apartamentos Desativados</a>
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
                                    <th colspan="5" class="titulo">Apartamentos Desactivados</th>
                                </tr>

                                <tr>
                                    <th scope="col">ID Apartamento</th>
                                    <th scope="col">Descripcion Apartamento</th>
                                    <th scope="col">ID_UNIDAD</th>
                                    <th scope="col">Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    include '../../Conexion/conexion.php';
                                    $queryDesactivados = "SELECT * FROM apartamentos WHERE status = 'inactive'";
                                    $resultDesactivados = mysqli_query($connection, $queryDesactivados);

                                    while ($row = mysqli_fetch_assoc($resultDesactivados)) {
                                        echo "<tr>
                                                <td>{$row['ID_Apartamento']}</td>
                                                <td>{$row['Descripcion_Apartamento']}</td>
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
</body>
</html>
