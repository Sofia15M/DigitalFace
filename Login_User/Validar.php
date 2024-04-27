<?php
$conexion = new mysqli("localhost", "root", "", "v_014_digitalface");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    $Gmail_User = isset($_POST["Gmail_User"]) ? trim($_POST["Gmail_User"]) : null;
    $Contrasena_User = isset($_POST["Contrasena_User"]) ? $_POST["Contrasena_User"] : null;

    if ($Gmail_User !== null && $Contrasena_User !== null) {
        $consulta = "SELECT * FROM usuarios WHERE Gmail_User=? AND Contrasena_User=?";
        $stmt = $conexion->prepare($consulta);
        $stmt->bind_param("ss", $Gmail_User, $Contrasena_User);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows > 0) {
            $usuario = $resultado->fetch_assoc();
            session_start();
            $_SESSION["user_id"] = $usuario["ID_user"];
            $_SESSION["user_name"] = $usuario["nombre"];
            $_SESSION["user_email"] = $usuario["Gmail_User"];
            session_regenerate_id(true);

            // Obtener el rol del usuario
            $consultaRol = "SELECT ID_ROL FROM Usuarios WHERE Gmail_User = '$Gmail_User' AND Contrasena_User = '$Contrasena_User'";
            $resultadoRol = $conexion->query($consultaRol);

            if ($resultadoRol->num_rows === 1) {
                $filaRol = $resultadoRol->fetch_assoc();
                $idRol = $filaRol['ID_ROL'];

                // Redireccionar según el rol del usuario
                switch ($idRol) {
                    case 1:
                        // Rol 1 - Redirigir a la página de administrador
                        header("Location: ../Admin/IndexAdmin.php");
                        break;
                    case 2:
                        // Rol 2 - Redirigir a la página de usuario
                        header("Location: ../Vigilante/IndexVigilante.php");
                        break;
                    default:
                        // Rol desconocido - Manejar el error o redirigir a una página de error
                        header("Location: error_login.php");
                        break;
                }
            } else {
                // Error al obtener el rol
                header("Location: error_login.php");
            }
        } else {
            header("Location: error_login.php");
        }
    } else {
        header("Location: error_login.php");
    }
    $conexion->close();
}

