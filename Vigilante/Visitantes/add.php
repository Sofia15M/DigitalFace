<?php
include '../../Conexion/conexion.php';

if ($_FILES['Foto_Visitante']['size'] > 0) {
    $ID_Visitante = $_POST['ID_Visitante'];
    $Nombre_Visitante = $_POST['Nombre_Visitante'];
    $Tel_Cel_Visitante = $_POST['Tel_Cel_Visitante'];
    $Hora_Ingreso = $_POST['Hora_Ingreso'];
    $ID_Apartamento = $_POST['ID_Apartamento'];

    // Obtén el contenido binario de la imagen
    $Foto_Visitante = file_get_contents($_FILES['Foto_Visitante']['tmp_name']);

    // Escapa el contenido binario para evitar problemas de SQL Injection
    $Foto_Visitante = mysqli_real_escape_string($connection, $Foto_Visitante);

    $query = "INSERT INTO Visitantes (ID_Visitante, Foto_Visitante, Nombre_Visitante, Tel_Cel_Visitante, Hora_Ingreso, ID_Apartamento) 
    VALUES ('$ID_Visitante', '$Foto_Visitante', '$Nombre_Visitante', '$Tel_Cel_Visitante', '$Hora_Ingreso', '$ID_Apartamento')";

    if (mysqli_query($connection, $query)) {
        header("Location: index.php"); // Redirige a la página principal o a donde necesites
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connection);
    }
} else {
    echo "Error al subir la imagen.";
}

mysqli_close($connection);
?>
