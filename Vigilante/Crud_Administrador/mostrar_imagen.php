<?php
include '../../Conexion/conexion.php'; 

if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    
    $query = "SELECT Foto_Administrador FROM Administrador WHERE ID_Administrador = $id";
    $result = mysqli_query($connection, $query);

    if($row = mysqli_fetch_assoc($result)) {
        $imageData = $row['Foto_Administrador'];
        header("Content-type: image/jpeg"); // Asegúrate de establecer el tipo de contenido correcto
        echo $imageData;
    } else {
        echo "Imagen no encontrada";
    }
} else {
    echo "ID no válido";
}

mysqli_close($connection);
?>
