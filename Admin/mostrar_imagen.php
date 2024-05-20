<?php
$conexion = new mysqli("localhost", "root", "", "v_015_digitalface");

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT Foto_User FROM usuarios WHERE ID_User = $id";
    $result = mysqli_query($conexion, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        $imageData = $row['Foto_User'];
        header("Content-type: image/jpeg"); // Asegúrate de establecer el tipo de contenido correcto
        echo $imageData;
    } else {
        echo "Imagen no encontrada";
    }
} else {
    echo "ID no válido";
}

mysqli_close($conexion);
?>
