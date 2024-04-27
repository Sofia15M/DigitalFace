<?php
include 'conexion.php';

if (isset($_POST['submit'])) {
    $ID_Residente = $_POST['ID_Residente'];
    $Nombre_Residente = $_POST['Nombre_Residente'];
    $Tel_Cel_Residente = $_POST['Tel_Cel_Residente'];
    $ID_Apartamento = $_POST['ID_Apartamento'];

    // Obtén el contenido binario de la imagen
    $Foto_Residente = file_get_contents($_FILES['Foto_Residente']['tmp_name']);

    // Escapa el contenido binario para evitar problemas de SQL Injection
    $Foto_Residente = mysqli_real_escape_string($connection, $Foto_Residente);

    $query = "INSERT INTO residentes (ID_Residente, Foto_Residente, Nombre_Residente, Tel_Cel_Residente, ID_Apartamento) 
    VALUES ('$ID_Residente', '$Foto_Residente', '$Nombre_Residente', '$Tel_Cel_Residente', '$ID_Apartamento')";

    if (mysqli_query($connection, $query)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connection);
    }
} else {
    echo "Error al subir la imagen.";
}

mysqli_close($connection);
?>
