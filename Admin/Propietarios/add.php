<?php
include '../../Conexion/conexion.php';

if (isset($_POST['submit'])) {
    $ID_Propietario = $_POST['ID_Propietario'];
    $Nombre_Propietario = $_POST['Nombre_Propietario'];
    $Tel_Cel_Propietario = $_POST['Tel_Cel_Propietario'];

    // Obtén el contenido binario de la imagen
    $Foto_Propietario = file_get_contents($_FILES['Foto_Propietario']['tmp_name']);

    // Escapa el contenido binario para evitar problemas de SQL Injection
    $Foto_Propietario = mysqli_real_escape_string($connection, $Foto_Propietario);

    // Define $Edad_Propietario si es necesario, de lo contrario elimínalo de la consulta SQL
    $Edad_Propietario = $_POST['Edad_Propietario']; // Asegúrate de obtener este valor correctamente

    $query = "INSERT INTO propietarios (ID_Propietario, Foto_Propietario, Nombre_Propietario, Tel_Cel_Propietario) 
    VALUES ('$ID_Propietario', '$Foto_Propietario', '$Nombre_Propietario', '$Tel_Cel_Propietario')";

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


