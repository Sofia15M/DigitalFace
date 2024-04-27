<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../CSS/styleAnadir.css">
    <link rel="stylesheet" href="../../CSS/nav.css">
    <link rel="icon" href="../../IMG/Logo.jpg" type="image/x-icon">
    <title>Añadir Visitante</title>
</head>
<body>
    <header class="header">
        <div class="container">
            <nav class="menu">
                <a href="#">Añadir Nuevo Visitante</a>
                <a href="index.php" class="atras">Volver atrás</a>
            </nav>
        </div>
    </header>
    <form action="add.php" method="post" enctype="multipart/form-data">
        <h2>Añadir Nuevo Visitante</h2>
            <div class="column column-left">
                <br>
                <label for="ID_Visitante">N. Identificación</label>
                <input type="text" id="ID_Visitante" name="ID_Visitante" required>
                <br>
                <label for="Foto_Visitante">Foto</label>
                <input type="file" id="Foto_Visitante" name="Foto_Visitante" accept="image/*" required>
                <br>
                <label for="Nombre_Visitante">Nombre</label>
                <input type="text" id="Nombre_Visitante" name="Nombre_Visitante" required>
                <br>
                <label for="Tel_Cel_Visitante">Teléfono Celular</label>
                <input type="text" id="Tel_Cel_Visitante" name="Tel_Cel_Visitante" required>
                <br>
            </div>
            <div class="column column-right">
                <br>
                <label for="Hora_Ingreso">Hora de ingreso</label>
                <input type="datetime-local" name="Hora_Ingreso" value="<?php echo isset($row['Hora_Ingreso']) ? date('Y-m-d\TH:i', strtotime($row['Hora_Ingreso'])) : ''; ?>">
                <br>
                <label for="ID_Apartamento">Aparatemto al que se dirige</label>
                <input type="text" id="ID_Apartamento" name="ID_Apartamento" required>
                <br><br>
                <input type="submit" class="button" name="editar" value="Añadir Visitante">
            </div>
    </form>
</body>
</html>
