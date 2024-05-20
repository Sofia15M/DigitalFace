<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../CSS/style.css">
    <link rel="stylesheet" href="../../CSS/nav.css">
    <link rel="icon" href="../../IMG/Logo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Info. Residentes</title>
</head>
<body>
    <header class="header">
        <div class="container">
        <nav class="menu">
                <a href="#">Residentes</a>
                <a href="#" class="fa fa-print icono" title="Imprimir"></a>
                <a href="desactivados.php" class="desativados">Ver Desactivados</a>
                <a href="../IndexAdmin.php" class="atras" >Volver atras</a>
            </nav>
        </div>
    </header>
    <div class="row">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body">

                            <br>

                            <a href="añadir.php" class="boton">Añadir nuevo Residente</a>

                            <br/><br/>

                            <table class="table">
                    
                                <thead>
                                    <tr>
                                        <th colspan="7" class="titulo">Residentes</th>
                                    </tr>

                                    <tr>
                                        <th scope="col">N. Documento</th>
                                        <th scope="col">Foto</th>
                                        <th scope="col">Nombre completo</th>
                                        <th scope="col">Telefono</th>
                                        <th scope="col">Fecha de Modificación</th>
                                        <th scope="col">N. Apartamento</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    include '../../Conexion/conexion.php';
                                    $queryActivos = "SELECT * FROM residentes WHERE status = 'active'";
                                    $resultActivos = mysqli_query($connection, $queryActivos);

                                    while ($row = mysqli_fetch_assoc($resultActivos)) {
                                        echo "<tr>
                                                <td>{$row['ID_Residente']}</td>
                                                <td><img src='mostrar_imagen.php?id={$row['ID_Residente']}' style='width: 150px; height: 180px;'></td>
                                                <td>{$row['Nombre_Residente']}</td>
                                                <td>{$row['Tel_Cel_Residente']}</td>
                                                <td>{$row['Fecha_Registro']}</td>
                                                <td>{$row['ID_Apartamento']}</td>
                                                <td>
                                                    <a href='edit.php?id={$row['ID_Residente']}' class='editar'>Editar</a>
                                                    <a href='desactivar.php?id={$row['ID_Residente']}'class='desativar''>Desactivar</a>
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
    <br>

</body>
</html>
