<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../CSS/nav.css">
    <link rel="stylesheet" href="../../CSS/styleEditar.css">
    <link rel="icon" href="../../IMG/Logo.jpg" type="image/x-icon">
    <title>Editar Info. Unidad</title>
</head>
<body>

<div class="container">
    <header class="header">
        <div class="container">
            <nav class="menu">
                <a href="#">Editar Unidad</a>
                <a href="index.php" class="atras">Volver atrás</a>
            </nav>
        </div>
    </header>
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <?php
                    include '../../Conexion/conexion.php';

                    $id = $_GET['id'];
                    $query = "SELECT * FROM unidad WHERE ID_UNIDAD = $id";
                    $result = mysqli_query($connection, $query);
                    $row = mysqli_fetch_assoc($result);
                    ?>
                    <form action="editar.php" method="post">
                        <h2>Editar informacion de la unidad</h2>
                        <input type="hidden" name="ID_UNIDAD" value="<?php echo $row['ID_UNIDAD']; ?>">
                        <div class="form-group">
                            <label>Nombre Unidad</label>
                            <input type="text" name="Nombre_Unidad" class="form-control" required="" placeholder="Nombre_Unidad" value="<?php echo $row['Nombre_Unidad']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Tel Unidad</label>
                            <input type="text" name="Tel_Unidad" class="form-control" required="" placeholder="Tel_Unidad" value="<?php echo $row['Tel_Unidad']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Direccion Unidad</label>
                            <input type="text" name="Direccion_Unidad" class="form-control" required="" placeholder="Direccion_Unidad" value="<?php echo $row['Direccion_Unidad']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Cantidad Apartamentos</label>
                            <input type="text" name="Cantida_Apartamentos_Unidad" class="form-control" required="" placeholder="Cantida_Apartamentos_Unidad" value="<?php echo $row['Cantida_Apartamentos_Unidad']; ?>">
                        </div>
                        <br/>
                        <input type="submit" class="button" name="editar" value="Editar Info. Unidad">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
