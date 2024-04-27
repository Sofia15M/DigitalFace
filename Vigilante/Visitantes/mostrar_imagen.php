<?php
include '../../Conexion/conexion.php'; // Asegúrate de incluir tu archivo de conexión

if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    
    $query = "SELECT Foto_Visitante FROM visitantes WHERE ID_Visitante = $id";
    $result = mysqli_query($connection, $query);

    if($row = mysqli_fetch_assoc($result)) {
        $imageData = $row['Foto_Visitante'];
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