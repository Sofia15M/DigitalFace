<?php
include '../../Conexion/conexion.php';

if ($_FILES['Foto_PersonalL']['size'] > 0) {
    $ID_PersonalL = $_POST['ID_PersonalL'];
    $Nombre_PersonalL = $_POST['Nombre_PersonalL'];
    $Edad_PersonalL = $_POST['Edad_PersonalL'];
    $Cargo_PersonalL = $_POST['Cargo_PersonalL'];
    $Direccion_PersonalL = $_POST['Direccion_PersonalL'];
    $Tel_Cel_PersonalL = $_POST['Tel_Cel_PersonalL'];
    $Tiempo_trabajo = $_POST['Tiempo_trabajo'];
    $ID_UNIDAD = $_POST['ID_UNIDAD'];

    // Obtén el contenido binario de la imagen
    $Foto_PersonalL = file_get_contents($_FILES['Foto_PersonalL']['tmp_name']);

    // Escapa el contenido binario para evitar problemas de SQL Injection
    $Foto_PersonalL = mysqli_real_escape_string($connection, $Foto_PersonalL);

    $query = "INSERT INTO personal_limpieza (ID_PersonalL, Foto_PersonalL, Nombre_PersonalL, Edad_PersonalL, Cargo_PersonalL, Direccion_PersonalL, Tel_Cel_PersonalL, Tiempo_trabajo, ID_UNIDAD) 
    VALUES ('$ID_PersonalL', '$Foto_PersonalL', '$Nombre_PersonalL', '$Edad_PersonalL', '$Cargo_PersonalL', '$Direccion_PersonalL', '$Tel_Cel_PersonalL', '$Tiempo_trabajo', '$ID_UNIDAD')";

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
