<?php
include '../../Conexion/conexion.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Actualiza el campo 'status' en lugar de eliminar el apartamento
    $sql = "UPDATE propietarios SET status = 'inactive' WHERE ID_Propietario = $id";

    if (mysqli_query($connection, $sql)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }
} else {
    echo "ID de Usuario no proporcionado.";
}

mysqli_close($connection);
?>
