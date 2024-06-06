<?php
include '../../Conexion/conexion.php';

if (isset($_POST['editar'])) {
    $ID_Administrador = $_POST['id'];
    $Nombre_Administrador = $_POST['Nombre_Administrador'];
    $Edad_Administrador = $_POST['Edad_Administrador'];
    $Cargo_Administrador = $_POST['Cargo_Administrador'];
    $Direccion_Administrador = $_POST['Direccion_Administrador'];
    $Tel_Cel_Administrador = $_POST['Tel_Cel_Administrador'];
    $Tiempo_trabajo = $_POST['tiempo_trabajo'];

    if ($_FILES['Foto_Administrador']['error'] === UPLOAD_ERR_OK) {
        $newFilename = uniqid() . '_' . $_FILES['Foto_Administrador']['name'];
        $targetFile = $uploadDir . $newFilename;

        if (move_uploaded_file($_FILES['Foto_Administrador']['tmp_name'], $targetFile)) {
            $query = "UPDATE Administrador 
                      SET Foto_Administrador = '$newFilename',
                          Nombre_Administrador = '$Nombre_Administrador',
                          Edad_Administrador = '$Edad_Administrador',
                          Cargo_Administrador = '$Cargo_Administrador',
                          Direccion_Administrador = '$Direccion_Administrador',
                          Tel_Cel_Administrador = '$Tel_Cel_Administrador',
                          Tiempo_trabajo = '$Tiempo_trabajo'
                      WHERE ID_Administrador = '$ID_Administrador'";
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
        $query = "UPDATE Administrador
                SET Nombre_Administrador = '$Nombre_Administrador',
                    Edad_Administrador = '$Edad_Administrador',
                    Cargo_Administrador = '$Cargo_Administrador',
                    Direccion_Administrador = '$Direccion_Administrador',
                    Tel_Cel_Administrador = '$Tel_Cel_Administrador',
                    Tiempo_trabajo = '$Tiempo_trabajo'
                WHERE ID_Administrador = '$ID_Administrador'";
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