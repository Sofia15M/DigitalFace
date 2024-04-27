<?php
include '../../Conexion/conexion.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sqlActivar = "UPDATE propietarios SET status = 'active' WHERE ID_Propietario = $id";

    if (mysqli_query($connection, $sqlActivar)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($connection);
    }
} else {
    echo "ID de Usuario no proporcionado.";
}

mysqli_close($connection);
?>