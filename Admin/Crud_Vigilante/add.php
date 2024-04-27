<?php
include '../../Conexion/conexion.php';

if ($_FILES['Foto_Vigilante']['size'] > 0) {
    $ID_Vigilante = $_POST['ID_Vigilante'];
    $Nombre_Vigilante = $_POST['Nombre_Vigilante'];
    $Edad_Vigilante = $_POST['Edad_Vigilante'];
    $Cargo_Vigilante = $_POST['Cargo_Vigilante'];
    $Direccion_Vigilante = $_POST['Direccion_Vigilante'];
    $Tel_Cel_Vigilante = $_POST['Tel_Cel_Vigilante'];
    $Tiempo_trabajo = $_POST['Tiempo_trabajo'];
    $ID_UNIDAD = $_POST['ID_UNIDAD'];

    // Obtén el contenido binario de la imagen
    $Foto_Vigilante = file_get_contents($_FILES['Foto_Vigilante']['tmp_name']);

    // Escapa el contenido binario para evitar problemas de SQL Injection
    $Foto_Vigilante = mysqli_real_escape_string($connection, $Foto_Vigilante);

    $query = "INSERT INTO vigilante (ID_Vigilante, Foto_Vigilante, Nombre_Vigilante, Edad_Vigilante, Cargo_Vigilante, Direccion_Vigilante, Tel_Cel_Vigilante, Tiempo_trabajo, ID_UNIDAD) 
    VALUES ('$ID_Vigilante', '$Foto_Vigilante', '$Nombre_Vigilante', '$Edad_Vigilante', '$Cargo_Vigilante', '$Direccion_Vigilante', '$Tel_Cel_Vigilante', '$Tiempo_trabajo', '$ID_UNIDAD')";

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

