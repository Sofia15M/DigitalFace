<?php
include '../../Conexion/conexion.php';

if (isset($_POST['editar'])) {
    $ID_Propietario = $_POST['id'];
    $Nombre_Propietario = $_POST['Nombre_Propietario'];
    $Tel_Cel_Propietario = $_POST['Tel_Cel_Propietario'];

    // Verificar si se ha subido una imagen
    if (isset($_FILES['Foto_Propietario']) && $_FILES['Foto_Propietario']['error'] === UPLOAD_ERR_OK) {
        $newFilename = uniqid() . '_' . $_FILES['Foto_Propietario']['name'];
        $targetFile = $uploadDir . $newFilename;

        if (move_uploaded_file($_FILES['Foto_Propietario']['tmp_name'], $targetFile)) {
            $query = "UPDATE propietarios 
                      SET Foto_Propietario = '$newFilename',
                          Nombre_Propietario = '$Nombre_Propietario',
                          Tel_Cel_Propietario = '$Tel_Cel_Propietario'
                      WHERE ID_Propietario = '$ID_Propietario'";
        } else {
            echo "Error al cargar la imagen.";
        }
    } else {
        $query = "UPDATE propietarios 
                SET Nombre_Propietario = '$Nombre_Propietario',
                    Tel_Cel_Propietario = '$Tel_Cel_Propietario'
                WHERE ID_Propietario = '$ID_Propietario'";
    }

    if (isset($query)) {
        if (mysqli_query($connection, $query)) {
            header("Location: index.php");
            exit();
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($connection);
        }
    }
}

mysqli_close($connection);
?>

