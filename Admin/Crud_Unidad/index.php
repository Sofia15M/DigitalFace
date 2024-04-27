<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../CSS/styleUnidad.css">
    <link rel="stylesheet" href="../../CSS/nav.css">
    <link rel="icon" href="../../IMG/Logo.jpg" type="image/x-icon">
    <title>Info. Unidad</title>
</head>
<body>
    <header class="header">
        <div class="container">
            <nav class="menu">
                <a href="#">Unidad</a>
                <a href="../IndexAdmin.php" class="atras">Volver atrás</a>
            </nav>
        </div>
    </header>

    <br>

    <form method="post" action="index.php">
        <button type="submit" name="download_pdf" class="btn btn-primary">Descargar PDF</button>
    </form>

    <br>

    <section class="conteiner">
        <article class="post">
            <?php
            include '../../Conexion/conexion.php';
            $query = "SELECT * FROM unidad";
            $result = mysqli_query($connection, $query);

            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<h1><strong>Informacion Unidad</strong></h1>
                        <br>
                        <img src='mostrar_imagen.php?id={$row['ID_UNIDAD']}' style='width: 150px; height: 180px;'></td>   
                        <br>
                        <p>ID Unidad: {$row['ID_UNIDAD']}</p>
                        <p>Nombre: {$row['Nombre_Unidad']}</p>
                        <p>Telefono: {$row['Tel_Unidad']}</p>
                        <p>Dirección: {$row['Direccion_Unidad']}</p>
                        <p>Cantidad Apartamentos: {$row['Cantida_Apartamentos_Unidad']}</p>
                        <p><a href='edit.php?id={$row['ID_UNIDAD']}' class='editar'>Editar</a></p>";
                }
            }

            mysqli_close($connection);
            ?>
                      
        </article>
    </section>
</body>
</html>
