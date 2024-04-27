<?php
include '../../Conexion/conexion.php';

if (isset($_POST['editar'])) {
    $ID_PersonalL = $_POST['id'];
    $Nombre_PersonalL = $_POST['Nombre_PersonalL'];
    $Edad_PersonalL = $_POST['Edad_PersonalL'];
    $Cargo_PersonalL = $_POST['Cargo_PersonalL'];
    $Direccion_PersonalL = $_POST['Direccion_PersonalL'];
    $Tel_Cel_PersonalL = $_POST['Tel_Cel_PersonalL'];
    $Tiempo_trabajo = $_POST['tiempo_trabajo'];

    if ($_FILES['Foto_PersonalL']['error'] === UPLOAD_ERR_OK) {
        $newFilename = uniqid() . '_' . $_FILES['Foto_PersonalL']['name'];
        $targetFile = $uploadDir . $newFilename;

        if (move_uploaded_file($_FILES['Foto_PersonalL']['tmp_name'], $targetFile)) {
            $query = "UPDATE personal_limpieza 
                      SET Foto_PersonalL = '$newFilename',
                          Nombre_PersonalL = '$Nombre_PersonalL',
                          Edad_PersonalL = '$Edad_PersonalL',
                          Cargo_PersonalL = '$Cargo_PersonalL',
                          Direccion_PersonalL = '$Direccion_PersonalL',
                          Tel_Cel_PersonalL = '$Tel_Cel_PersonalL',
                          Tiempo_trabajo = '$Tiempo_trabajo'
                      WHERE ID_PersonalL = '$ID_PersonalL'";
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
        $query = "UPDATE personal_limpieza 
                SET Nombre_PersonalL = '$Nombre_PersonalL',
                    Edad_PersonalL = '$Edad_PersonalL',
                    Cargo_PersonalL = '$Cargo_PersonalL',
                    Direccion_PersonalL = '$Direccion_PersonalL',
                    Tel_Cel_PersonalL = '$Tel_Cel_PersonalL',
                    Tiempo_trabajo = '$Tiempo_trabajo'
                WHERE ID_PersonalL = '$ID_PersonalL'";
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

