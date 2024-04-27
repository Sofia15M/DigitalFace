<?php
include '../../Conexion/conexion.php';

if (isset($_POST['submit'])) {
    $ID_Apartamento = $_POST['ID_Apartamento'];
    $Descripcion_Apartamento = $_POST['Descripcion_Apartamento'];
    $ID_UNIDAD = $_POST['ID_UNIDAD'];

    $query = "INSERT INTO apartamentos (ID_Apartamento, Descripcion_Apartamento, ID_UNIDAD) 
              VALUES ('$ID_Apartamento', '$Descripcion_Apartamento', '$ID_UNIDAD')";

    if (mysqli_query($connection, $query)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connection);
    }
}

mysqli_close($connection);
?>
