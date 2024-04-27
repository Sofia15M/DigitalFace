<?php
include '../../Conexion/conexion.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Actualiza el campo 'status' en lugar de eliminar el apartamento
    $sql = "UPDATE residentes SET status = 'inactive' WHERE ID_Residente = $id";

    if (mysqli_query($connection, $sql)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }
} else {
    echo "ID de residente no proporcionado.";
}

mysqli_close($connection);
?>
