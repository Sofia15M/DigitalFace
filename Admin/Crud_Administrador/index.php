<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../CSS/style.css">
    <link rel="stylesheet" href="../../CSS/nav.css">
    <link rel="icon" href="../../IMG/Logo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Info. Administradores</title>
</head>
<body>
    <header class="header">
        <div class="container">
            <nav class="menu">
                <a href="#">Administradores</a>
                <a href="#" class="fa fa-print icono" title="Imprimir"></a>
                <a href="desactivados.php" class="desativados">Ver Desactivados</a>
                <a href="../IndexAdmin.php" class="atras">Volver atrás</a>
            </nav>
        </div>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <br>
                        <a href="añadir.php" class="boton">Añadir nuevo Administrador</a>
                        <br/><br/>
                        <table>
                            <thead>
                                <tr>
                                    <th colspan="11" class="titulo">Personal de Administrador</th>
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
                                    <th scope="col">Fecha de Modificación</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    include '../../Conexion/conexion.php';

                                    $queryActivos = "SELECT * FROM Administrador WHERE Estado = 'activo'";
                                    $resultActivos = mysqli_query($connection, $queryActivos);

                                    while ($row = mysqli_fetch_assoc($resultActivos)) {
                                        echo "<tr>
                                                <td>{$row['ID_Administrador']}</td>
                                                <td><img src='mostrar_imagen.php?id={$row['ID_Administrador']}' style='width: 150px; height: 180px;'></td>
                                                <td>{$row['Nombre_Administrador']}</td>
                                                <td>{$row['Edad_Administrador']}</td>
                                                <td>{$row['Cargo_Administrador']}</td>
                                                <td>{$row['Direccion_Administrador']}</td>
                                                <td>{$row['Tel_Cel_Administrador']}</td>
                                                <td>{$row['Tiempo_trabajo']}</td>
                                                <td>{$row['Fecha_Registro']}</td>
                                                <td>
                                                    <a href='edit.php?id={$row['ID_Administrador']}' class='editar'>Editar</a>
                                                    <a href='desactivar.php?id={$row['ID_Administrador']}' class='desativar'>Desactivar</a>
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
</body>
</html>
