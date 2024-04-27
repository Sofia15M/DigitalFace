<?php
include "../../Conexion/conexion.php";

if (isset($_POST['submit'])) {
    $Gmail_User = $_POST['Gmail_User'];
    $Contrasena_User = $_POST['Contrasena_User'];
    $ID_ROL = $_POST['ID_ROL'];

    // Validación de contraseña
    $longitud_minima = 10;
    if (strlen($Contrasena_User) < $longitud_minima || !preg_match('/[0-9]/', $Contrasena_User) || !preg_match('/[A-Z]/', $Contrasena_User) || !preg_match('/[a-z]/', $Contrasena_User)) {
        header("Location: error_Contraseñas.php");
        exit(); // Detener la ejecución si la contraseña no cumple los requisitos
    }

    // Verificar si el ID_ROL existe en la tabla roles
    $check_query = "SELECT ID_ROL FROM roles WHERE ID_ROL = '$ID_ROL'";
    $result = mysqli_query($connection, $check_query);

    if (mysqli_num_rows($result) > 0) {
        // El ID_ROL existe en la tabla roles, continuar con la inserción en la tabla usuarios
        $Foto_User = file_get_contents($_FILES['Foto_User']['tmp_name']);
        $Foto_User = mysqli_real_escape_string($connection, $Foto_User);

        $query = "INSERT INTO usuarios(Gmail_User, Contrasena_User, ID_ROL, Foto_User) 
                    VALUES ('$Gmail_User', '$Contrasena_User', '$ID_ROL', '$Foto_User')";

        if (mysqli_query($connection, $query)) {
            echo '<script>alert("Usuario creado correctamente");</script>';
            echo '<script>window.location.href = "CrearUsuario.php";</script>';
            exit();
        } else {
            echo "Error al ejecutar la consulta: " . mysqli_error($connection);
        }
    } else {
        header("Location: error_rol.php");
    }
} else {
    header("Location: error_crear.php");
}

mysqli_close($connection);
?>
