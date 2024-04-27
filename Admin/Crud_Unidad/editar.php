<?php
include '../../Conexion/conexion.php';

if (isset($_POST['editar'])) {
    $ID_UNIDAD = $_POST['ID_UNIDAD'];
    $Nombre_Unidad = $_POST['Nombre_Unidad'];
    $Tel_Unidad = $_POST['Tel_Unidad'];
    $Direccion_Unidad = $_POST['Direccion_Unidad'];
    $Cantida_Apartamentos_Unidad = $_POST['Cantida_Apartamentos_Unidad'];

    $query = "UPDATE unidad
    SET ID_UNIDAD = '$ID_UNIDAD', Nombre_Unidad = '$Nombre_Unidad', Tel_Unidad = '$Tel_Unidad', Direccion_Unidad = '$Direccion_Unidad', 
    Cantida_Apartamentos_Unidad = '$Cantida_Apartamentos_Unidad'
    WHERE ID_UNIDAD = '$ID_UNIDAD'";


    if (mysqli_query($connection, $query)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connection);
    }
}

mysqli_close($connection);
?>
