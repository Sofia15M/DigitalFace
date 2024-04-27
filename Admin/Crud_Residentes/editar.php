<?php
include '../../Conexion/conexion.php';

if (isset($_POST['editar'])) {
    $ID_Residente = $_POST['id'];
    $Nombre_Residente = $_POST['Nombre_Residente'];
    $Tel_Cel_Residente = $_POST['Tel_Cel_Residente'];
    $ID_Apartamento = $_POST['ID_Apartamento'];

    if ($_FILES['Foto_Residente']['error'] === UPLOAD_ERR_OK) {

        $uploadDir = 'ruta/donde/subir/'; // Reemplaza con la ruta correcta
        $newFilename = uniqid() . '_' . $_FILES['Foto_Residente']['name'];
        $targetFile = $uploadDir . $newFilename;

        if (move_uploaded_file($_FILES['Foto_Residente']['tmp_name'], $targetFile)) {
            $query = "UPDATE residentes 
                      SET Foto_Residente = '$newFilename',
                          Nombre_Residente = '$Nombre_Residente',
                          Tel_Cel_Residente = '$Tel_Cel_Residente',
                          ID_Apartamento = '$ID_Apartamento'
                      WHERE ID_Residente = '$ID_Residente'";
            if (mysqli_query($connection, $query)) {
                header("Location: index.php");
                exit();
            } else {
                echo "Error: " . $query . "<br>" . mysqli_error($connection);
            }
        } else {
            echo "Error al cargar la imagen.";
        }
    } else {
        $query = "UPDATE residentes 
                SET Nombre_Residente = '$Nombre_Residente',
                    Tel_Cel_Residente = '$Tel_Cel_Residente',
                    ID_Apartamento = '$ID_Apartamento'
                WHERE ID_Residente = '$ID_Residente'";
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

