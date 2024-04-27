<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../CSS/nav.css">
    <link rel="stylesheet" href="../../CSS/styleAnadir.css">
    <link rel="icon" href="../../IMG/Logo.jpg" type="image/x-icon">
    <title>Añadir personal de limpieza</title>
    <style>
        form {
            height: 500px;
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="container">
            <nav class="menu">
                <a href="#">Añador Personal</a>
                <a href="index.php" class="atras">Volver atrás</a>
            </nav>
        </div>
    </header>
    <form action="add.php" method="post" enctype="multipart/form-data">
            <h2>Añadir Nuevo pesonal de limpieza</h2>
            <div class="column column-left">
                <label for="ID_PersonalL">Identificación Del Usuario</label>
                <input type="text" id="ID_PersonalL" name="ID_PersonalL" required>

                <label for="Foto_PersonalL">Foto Usuario</label>
                <input type="file" id="Foto_PersonalL" name="Foto_PersonalL" accept="image/*" required>

                <label for="Nombre_PersonalL">Nombre Usuario</label>
                <input type="text" id="Nombre_PersonalL" name="Nombre_PersonalL" required>

                <label for="Edad_PersonalL">Edad Usuario</label>
                <input type="text" id="Edad_PersonalL" name="Edad_PersonalL" required>

                <label for="Cargo_PersonalL">Cargo Personal</label>
                <input type="text" id="Cargo_PersonalL" name="Cargo_PersonalL" required>
            </div>
            <div class="column column-right">
                <label for="Direccion_PersonalL">Dirección Personal</label>
                <input type="text" id="Direccion_PersonalL" name="Direccion_PersonalL" required>

                <label for="Tel_Cel_PersonalL">Teléfono Celular</label>
                <input type="text" id="Tel_Cel_PersonalL" name="Tel_Cel_PersonalL" required>

                <label for="Tiempo_trabajo">Tiempo de trabajo</label>
                <input type="text" id="Tiempo_trabajo" name="Tiempo_trabajo" required>

                <label for="ID_UNIDAD">ID UNIDAD</label>
                <input type="text" id="ID_UNIDAD" name="ID_UNIDAD" required>
                <br>
                <button type="submit" name="submit">Añadir nuevo Propietario</button>
            </div>
    </form>
</body>
</html>

