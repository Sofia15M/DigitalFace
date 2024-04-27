<?php
include '../../Conexion/conexion.php';

if (isset($_POST['editar'])) {
    $ID_Apartamento = $_POST['ID_Apartamento'];
    $Descripcion_Apartamento = $_POST['Descripcion_Apartamento'];
    $ID_UNIDAD = $_POST['ID_UNIDAD'];

    $query = "UPDATE apartamentos 
              SET Descripcion_Apartamento = '$Descripcion_Apartamento', ID_UNIDAD = '$ID_UNIDAD' 
              WHERE ID_Apartamento = '$ID_Apartamento'";

    if (mysqli_query($connection, $query)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connection);
    }
}

mysqli_close($connection);
?>
