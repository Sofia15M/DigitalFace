<?php
include '../../Conexion/conexion.php';

if (isset($_POST['editar'])) {
    $ID_Vigilante = $_POST['id'];
    $Nombre_Vigilante = $_POST['Nombre_Vigilante'];
    $Edad_Vigilante = $_POST['Edad_Vigilante'];
    $Cargo_Vigilante = $_POST['Cargo_Vigilante'];
    $Direccion_Vigilante = $_POST['Direccion_Vigilante'];
    $Tel_Cel_Vigilante = $_POST['Tel_Cel_Vigilante'];
    $Tiempo_trabajo = $_POST['tiempo_trabajo'];

    if ($_FILES['Foto_Vigilante']['error'] === UPLOAD_ERR_OK) {
        $newFilename = uniqid() . '_' . $_FILES['Foto_Vigilante']['name'];
        $targetFile = $uploadDir . $newFilename;

        if (move_uploaded_file($_FILES['Foto_Vigilante']['tmp_name'], $targetFile)) {
            $query = "UPDATE vigilante 
                      SET Foto_Vigilante = '$newFilename',
                          Nombre_Vigilante = '$Nombre_Vigilante',
                          Edad_Vigilante = '$Edad_Vigilante',
                          Cargo_Vigilante = '$Cargo_Vigilante',
                          Direccion_Vigilante = '$Direccion_Vigilante',
                          Tel_Cel_Vigilante = '$Tel_Cel_Vigilante',
                          Tiempo_trabajo = '$Tiempo_trabajo'
                      WHERE ID_Vigilante = '$ID_Vigilante'";
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
        $query = "UPDATE vigilante
                SET Nombre_Vigilante = '$Nombre_Vigilante',
                    Edad_Vigilante = '$Edad_Vigilante',
                    Cargo_Vigilante = '$Cargo_Vigilante',
                    Direccion_Vigilante = '$Direccion_Vigilante',
                    Tel_Cel_Vigilante = '$Tel_Cel_Vigilante',
                    Tiempo_trabajo = '$Tiempo_trabajo'
                WHERE ID_Vigilante = '$ID_Vigilante'";
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

