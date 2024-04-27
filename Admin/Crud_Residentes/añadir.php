<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../CSS/nav.css">
    <link rel="stylesheet" href="../../CSS/styleAnadir.css">
    <link rel="icon" href="../../IMG/Logo.jpg" type="image/x-icon">
    <title>Añadir Residente</title>
    <style>
        form {
            height: 520px;
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="container">
            <nav class="menu">
                <a href="#">Editar Residente</a>
                <a href="index.php" class="atras">Volver atrás</a>
            </nav>
        </div>
    </header>
    <form action="add.php" method="post" enctype="multipart/form-data">
        <h1>Añadir Nuevo Residente</h1>
        <label for="ID_Residente">ID del Residente:</label>
        <input type="text" id="ID_Residente" name="ID_Residente" required>

        <label for="Foto_Residente">Foto Residente</label>
        <input type="file" id="Foto_Residente" name="Foto_Residente" accept="image/*" required>

        <label for="Nombre_Residente">Nombre del Residente:</label>
        <input type="text" id="Nombre_Residente" name="Nombre_Residente" required>

        <label for="Tel_Cel_Residente">Telefono:</label>
        <input type="text" id="Tel_Cel_Residente" name="Tel_Cel_Residente" required>

        <label for="ID_Apartamento">ID del Apartamento:</label>
        <input type="text" id="ID_Apartamento" name="ID_Apartamento" required>

        <button type="submit" name="submit">Añadir nuevo Residente</button>
    </form>
</body>
</html>
