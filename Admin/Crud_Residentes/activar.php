<?php
include '../../Conexion/conexion.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sqlActivar = "UPDATE residentes SET status = 'active' WHERE ID_Residente = $id";

    if (mysqli_query($connection, $sqlActivar)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($connection);
    }
} else {
    echo "ID de residente no proporcionado.";
}

mysqli_close($connection);
?>
