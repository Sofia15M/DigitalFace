<?php
include '../../Conexion/conexion.php';

if ($_FILES['Foto_Administrador']['size'] > 0) {
    $ID_Administrador = $_POST['ID_Administrador'];
    $Nombre_Administrador = $_POST['Nombre_Administrador'];
    $Edad_Administrador = $_POST['Edad_Administrador'];
    $Cargo_Administrador = $_POST['Cargo_Administrador'];
    $Direccion_Administrador = $_POST['Direccion_Administrador'];
    $Tel_Cel_Administrador = $_POST['Tel_Cel_Administrador'];
    $Tiempo_trabajo = $_POST['Tiempo_trabajo'];
    $ID_UNIDAD = $_POST['ID_UNIDAD'];

    // Obtén el contenido binario de la imagen
    $Foto_Administrador = file_get_contents($_FILES['Foto_Administrador']['tmp_name']);

    // Escapa el contenido binario para evitar problemas de SQL Injection
    $Foto_Administrador = mysqli_real_escape_string($connection, $Foto_Administrador);

    $query = "INSERT INTO Administrador (ID_Administrador, Foto_Administrador, Nombre_Administrador, Edad_Administrador, Cargo_Administrador, Direccion_Administrador, Tel_Cel_Administrador, Tiempo_trabajo, ID_UNIDAD) 
    VALUES ('$ID_Administrador', '$Foto_Administrador', '$Nombre_Administrador', '$Edad_Administrador', '$Cargo_Administrador', '$Direccion_Administrador', '$Tel_Cel_Administrador', '$Tiempo_trabajo', '$ID_UNIDAD')";

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

