<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../CSS/style.css">
    <link rel="stylesheet" href="../../CSS/nav.css">
    <link rel="icon" href="../../IMG/Logo.jpg" type="image/x-icon">
    <title>Info. Apartamentos</title>
</head>
<body>
    <header class="header">
        <div class="container">
        <nav class="menu">
                <a href="#">Apartamentos</a>
                <a href="desactivados.php" class="desativados">Ver Desactivados</a>
                <a href="../IndexVigilante.php" class="atras" >Volver atras</a>
            </nav>
        </div>
    </header>
    <div class="row">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body">

                            <br>

                            <form method="post" action="index.php">
                                <button type="submit" name="download_pdf" class="btn btn-primary">Descargar PDF</button>
                            </form>

                            <br/><br/>

                            <table class="table">
                    
                                <thead>
                                    <tr>
                                        <th colspan="5" class="titulo">Apartamentos</th>
                                    </tr>

                                    <tr>
                                        <th scope="col">Numero Apartamento</th>
                                        <th scope="col">Descripcion del Apartamento</th>
                                        <th scope="col">UNIDAD</th>
                                        <th cope="col">Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    include '../../Conexion/conexion.php';
                                    $queryActivos = "SELECT * FROM apartamentos WHERE status = 'active'";
                                    $resultActivos = mysqli_query($connection, $queryActivos);

                                    while ($row = mysqli_fetch_assoc($resultActivos)) {
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
    <br>

</body>
</html>
