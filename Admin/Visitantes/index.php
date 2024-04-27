<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../CSS/style.css">
    <link rel="stylesheet" href="../../CSS/nav.css">
    <link rel="icon" href="../../IMG/Logo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="barraB.css">
    <title>Info. Visitantes</title>
</head>
<body>
    <header class="header">
        <div class="container">
            <nav class="menu">
                <a href="#">Visitante</a>
                <a href="desactivados.php" class="desativados">Ver Desactivados</a>
                <a href="../IndexAdmin.php" class="atras">Volver atrás</a>
            </nav>
        </div>
    </header>
    <section class="search-form">
        <form action="" method="post">
            <input type="text" id="search_box" name="search_box" placeholder="Qué estás buscando..." maxlength="100" class="box" required>
        </form>
   </section>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <br>
                        <form method="post" action="index.php">
                            <button type="submit" name="download_pdf" class="btn btn-primary">Descargar PDF</button>
                        </form>
                        <br>
                        <a href="añadir.php" class="boton">Añadir nuevo visitante</a>
                        <br/><br/>
                        <table>
                            <thead>
                                <tr>
                                    <th colspan="10" class="titulo">Visitantes</th>
                                </tr>
                                <tr>
                                    <th scope="col">N. documento</th>
                                    <th scope="col">Foto</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Telefono</th>
                                    <th scope="col">Fecha de Modificación</th>
                                    <th scope="col">Hora de entrada</th>
                                    <th scope="col">Hora de salida</th>
                                    <th scope="col">N. Apartamento</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    include '../../Conexion/conexion.php';

                                    $queryActivos = "SELECT * FROM visitantes WHERE status = 'active'";
                                    $resultActivos = mysqli_query($connection, $queryActivos);

                                    while ($row = mysqli_fetch_assoc($resultActivos)) {
                                        echo "<tr>
                                                <td>{$row['ID_Visitante']}</td>
                                                <td><img src='mostrar_imagen.php?id={$row['ID_Visitante']}' style='width: 150px; height: 180px;'></td>
                                                <td>{$row['Nombre_Visitante']}</td>
                                                <td>{$row['Tel_Cel_Visitante']}</td>
                                                <td>{$row['Fecha_Registro']}</td>
                                                <td>{$row['Hora_Ingreso']}</td>
                                                <td>{$row['Hora_Salida']}</td>
                                                <td>{$row['ID_Apartamento']}</td>
                                                <td>{$row['status']}</td>
                                                <td>
                                                    <a href='edit.php?id={$row['ID_Visitante']}' class='editar'>Editar</a>
                                                    <a href='desactivar.php?id={$row['ID_Visitante']}' class='desativar'>Desactivar</a>
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
    <script>
      $(document).ready(function() {
         $('#search_box').on('input', function() {
            var searchValue = $(this).val();
            $.ajax({
               type: 'POST',
               url: '../../Busqueda/search.php',
               data: { search_box: searchValue },
               success: function(response) {
                  $('.box-container').html(response);
               }
            });
         });
      });
   </script>
</body>
</html>
