<?php
include '../../Conexion/conexion.php';

if (isset($_POST['editar'])) {
    $ID_Visitante = $_POST['id'];
    $Nombre_Visitante = $_POST['Nombre_Visitante'];
    $Tel_Cel_Visitante = $_POST['Tel_Cel_Visitante'];
    $Hora_Salida = $_POST['Hora_Salida'];

    if ($_FILES['Foto_Visitante']['error'] === UPLOAD_ERR_OK) {
        $newFilename = uniqid() . '_' . $_FILES['Foto_Visitante']['name'];
        $targetFile = $uploadDir . $newFilename;

        if (move_uploaded_file($_FILES['Foto_Visitante']['tmp_name'], $targetFile)) {
            $query = "UPDATE Visitantes 
                      SET Foto_Visitante = '$newFilename',
                          Tel_Cel_Visitante = '$Tel_Cel_Visitante',
                          Hora_Salida = '$Hora_Salida'
                      WHERE ID_Visitante = '$ID_Visitante'";
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
        $query = "UPDATE Visitantes
                SET Nombre_Visitante = '$Nombre_Visitante',
                    Tel_Cel_Visitante = '$Tel_Cel_Visitante',
                    Hora_Salida = '$Hora_Salida'
                WHERE ID_Visitante = '$ID_Visitante'";
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

