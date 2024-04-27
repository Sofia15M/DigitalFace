<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../CSS/nav.css">
    <link rel="stylesheet" href="../../CSS/styleAnadir.css">
    <link rel="icon" href="../../IMG/Logo.jpg" type="image/x-icon">
    <title>Añadir Vigilante</title>

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
                <a href="#">Añadir Vigilante</a>
                <a href="index.php" class="atras">Volver atrás</a>
            </nav>
        </div>
    </header>
    <form action="add.php" method="post" enctype="multipart/form-data">
        <h2>Añadir Nuevo Vigilante</h2>
            <div class="column column-left">
                <label for="ID_Vigilante">Identificación Del Usuario</label>
                <input type="text" id="ID_Vigilante" name="ID_Vigilante" required>
                <br>
                <label for="Foto_Vigilante">Foto</label>
                <input type="file" id="Foto_Vigilante" name="Foto_Vigilante" accept="image/*" required>
                <br>
                <label for="Nombre_Vigilante">Nombre Usuario</label>
                <input type="text" id="Nombre_Vigilante" name="Nombre_Vigilante" required>
                <br>
                <label for="Edad_Vigilante">Edad Usuario</label>
                <input type="text" id="Edad_Vigilante" name="Edad_Vigilante" required>
                <br>
                <label for="Cargo_Vigilante">Cargo Personal</label>
                <input type="text" id="Cargo_Vigilante" name="Cargo_Vigilante" required>
            </div>
            <div class="column column-right">
                <label for="Direccion_Vigilante">Dirección Personal</label>
                <input type="text" id="Direccion_Vigilante" name="Direccion_Vigilante" required>
                <br>
                <label for="Tel_Cel_Vigilante">Teléfono Celular</label>
                <input type="text" id="Tel_Cel_Vigilante" name="Tel_Cel_Vigilante" required>
                <br>
                <label for="Tiempo_trabajo">Tiempo de trabajo</label>
                <input type="text" id="Tiempo_trabajo" name="Tiempo_trabajo" required>
                <br>
                <label for="ID_UNIDAD">ID UNIDAD</label>
                <input type="text" id="ID_UNIDAD" name="ID_UNIDAD" required>
                <br><br>
                <button type="submit" name="submit">Añadir nuevo Vigilante</button>
            </div>
    </form>
</body>
</html>

