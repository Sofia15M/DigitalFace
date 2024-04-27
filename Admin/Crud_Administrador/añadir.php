<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../CSS/nav.css">
    <link rel="stylesheet" href="../../CSS/styleAnadir.css">
    <link rel="icon" href="../../IMG/Logo.jpg" type="image/x-icon">
    <title>Añadir Administradores</title>

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
                <a href="#">Añadir Administrador</a>
                <a href="index.php" class="atras">Volver atrás</a>
            </nav>
        </div>
    </header>
    <form action="add.php" method="post" enctype="multipart/form-data">
        <h2>Añadir Nuevo Administrador</h2>
            <div class="column column-left">
                <label for="ID_Administrador">Identificación Del Usuario</label>
                <input type="text" id="ID_Administrador" name="ID_Administrador" required>
                <br>
                <label for="Foto_Administrador">Foto</label>
                <input type="file" id="Foto_Administrador" name="Foto_Administrador" accept="image/*" required>
                <br>
                <label for="Nombre_Administrador">Nombre Usuario</label>
                <input type="text" id="Nombre_Administrador" name="Nombre_Administrador" required>
                <br>
                <label for="Edad_Administrador">Edad Usuario</label>
                <input type="text" id="Edad_Administrador" name="Edad_Administrador" required>
                <br>
                <label for="Cargo_Administrador">Cargo Personal</label>
                <input type="text" id="Cargo_Administrador" name="Cargo_Administrador" required>
            </div>
            <div class="column column-right">
                <label for="Direccion_Administrador">Dirección Personal</label>
                <input type="text" id="Direccion_Administrador" name="Direccion_Administrador" required>
                <br>
                <label for="Tel_Cel_Administrador">Teléfono Celular</label>
                <input type="text" id="Tel_Cel_Administrador" name="Tel_Cel_Administrador" required>
                <br>
                <label for="Tiempo_trabajo">Tiempo de trabajo</label>
                <input type="text" id="Tiempo_trabajo" name="Tiempo_trabajo" required>
                <br>
                <label for="ID_UNIDAD">ID UNIDAD</label>
                <input type="text" id="ID_UNIDAD" name="ID_UNIDAD" required>
                <br><br>
                <button type="submit" name="submit">Añadir nuevo Administrador</button>
            </div>
    </form>
</body>
</html>

