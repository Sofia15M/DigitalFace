<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../CSS/styleAnadir.css">
    <link rel="stylesheet" href="../../CSS/nav.css">
    <link rel="icon" href="../../IMG/Logo.jpg" type="image/x-icon">
    <title>Añadir Apartamento</title>
    <style>
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            width: 300px;
            background-color: var(--gris2);
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="container">
            <nav class="menu">
                <a href="#">Añadir Apartamento</a>
                <a href="index.php" class="atras">Volver atrás</a>
            </nav>
        </div>
    </header>
    <form action="add.php" method="post">
        <h2>Añadir un nuevo Apartamento</h2>
        <br><br>
        <label for="ID_Apartamento">Numero de Apartamento:</label>
        <input type="text" id="ID_Apartamento" name="ID_Apartamento" required>

        <label for="Descripcion_Apartamento">Informacion del Apartamento:</label>
        <input type="text" id="Descripcion_Apartamento" name="Descripcion_Apartamento" required>

        <label for="ID_UNIDAD">Numero de la Unidad:</label>
        <input type="text" id="ID_UNIDAD" name="ID_UNIDAD" required>
        <br><br>
        <button type="submit" name="submit">Añadir nuevo Apartamento</button>
    </form>
</body>
</html>
