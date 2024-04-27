<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../CSS/styleAnadir.css">
    <link rel="stylesheet" href="../../CSS/nav.css">
    <link rel="icon" href="../../IMG/Logo.jpg" type="image/x-icon">
    <title>Añadir Propietario</title>
</head>
<body>
    <header class="header">
        <div class="container">
            <nav class="menu">
                <a href="#">Editar Propietario</a>
                <a href="index.php" class="atras">Volver atrás</a>
            </nav>
        </div>
    </header>
    <form action="add.php" method="post" enctype="multipart/form-data">
        <h2>Añadir nuevo Propietario</h2>
        <label for="ID_Propietario">N. documento</label>
        <input type="text" id="ID_Propietario" name="ID_Propietario" required>

        <label for="Foto_Propietario">Foto (solo imágenes)</label>
        <input type="file" id="Foto_Propietario" name="Foto_Propietario" accept="image/*" required>

        <label for="Nombre_Propietario">Nombre:</label>
        <input type="text" id="Nombre_Propietario" name="Nombre_Propietario" required>

        <label for="Tel_Cel_Propietario">Telefono o celular</label>
        <input type="text" id="Tel_Cel_Propietario" name="Tel_Cel_Propietario" required>
        <br><br>
        <button type="submit" name="submit">Añadir nuevo Propietario</button>
    </form>
</body>
</html>
