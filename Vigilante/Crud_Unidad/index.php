<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../CSS/styleUnidad.css">
    <link rel="icon" href="../../IMG/Logo.jpg" type="image/x-icon">
    <title>Info. Unidad</title>
    
    <style>
        .cuadro-contenedor {
            height: 310px;
        }

        .imagen-al-lado {
            margin-top: -280px;
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="container">
            <nav class="menu">
                <a href="#">Unidad</a>
                <a href="../IndexVigilante.php" class="atras">Volver atrás</a>
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
                    <br>
                    <div class="cuadro-contenedor">
                        <?php
                            include '../../Conexion/conexion.php';
                            $query = "SELECT * FROM unidad";
                            $result = mysqli_query($connection, $query);

                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<div class='unidad'>
                                        <h2>Informacion de la unidad</h2>
                                        <br>
                                        <p>ID Unidad: {$row['ID_UNIDAD']}</p>
                                        <p>Nombre Unidad: {$row['Nombre_Unidad']}</p>
                                        <p>Tel Unidad: {$row['Tel_Unidad']}</p>
                                        <p>Dirección Unidad: {$row['Direccion_Unidad']}</p>
                                        <p>Cantidad Apartamentos: {$row['Cantida_Apartamentos_Unidad']}</p>
                                        <img src='./img/edificio.jpeg' alt='' class='imagen-al-lado'>
                                    </div>";
                                }
                            }

                            mysqli_close($connection);
                        ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <br>
</body>
</html>
