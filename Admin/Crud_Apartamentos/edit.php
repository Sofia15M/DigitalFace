<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../CSS/nav.css">
    <link rel="stylesheet" href="../../CSS/styleEditar.css">
    <link rel="icon" href="../../IMG/Logo.jpg" type="image/x-icon">
    <title>Editar Info. Apartamento</title>

    <style>
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            height: 300px;
            width: 300px;
            background-color: var(--gris2);
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="container">
            <nav class="menu">
                <a href="#">Editar Apartamento</a>
                <a href="index.php" class="atras">Volver atrás</a>
            </nav>
        </div>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <?php
                        include '../../Conexion/conexion.php';

                        $id = $_GET['id'];
                        $query = "SELECT * FROM apartamentos WHERE ID_Apartamento = $id";
                        $result = mysqli_query($connection, $query);
                        $row = mysqli_fetch_assoc($result);
                        ?>
                        <form action="editar.php" method="post">
                            <h2>Editar Apartamento</h2>
                            <input type="hidden" name="ID_Apartamento" value="<?php echo $row['ID_Apartamento']; ?>">
                            <div class="form-group">
                                <label>Informacion Apartamento</label>
                                <input type="text" name="Descripcion_Apartamento" class="form-control" required="" placeholder="Descripcion Apartamento" value="<?php echo $row['Descripcion_Apartamento']; ?>">
                            </div>
                            <div class="form-group">
                                <label>Numero UNIDAD</label>
                                <input type="text" name="ID_UNIDAD" class="form-control" required="" placeholder="ID_UNIDAD" value="<?php echo $row['ID_UNIDAD']; ?>">
                            </div>
                            <br/>
                            <input type="submit" class="button" name="editar" value="Editar Apartamento">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

