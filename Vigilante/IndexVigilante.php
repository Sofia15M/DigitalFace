<?php
$conexion = new mysqli("localhost","root","","v_014_digitalface");

session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: ../Login_User/LoginUser.php");
    exit();
}

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$user_id = $_SESSION["user_id"];
$consulta = "SELECT * FROM usuarios WHERE ID_user=?";
$stmt = $conexion->prepare($consulta);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
    $usuario = $resultado->fetch_assoc();
} else {
    echo "Usuario no encontrado";
    exit();
}
function obtenerTextoRol($idRol) {
    switch ($idRol) {
        case 1:
            return 'Administrador';
        case 2:
            return 'Vigilante';
        // Agrega más casos según sea necesario para otros roles
        default:
            return 'Rol Desconocido';
    }
}

$conexion->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/styleIndex.css">
    <link rel="stylesheet" href="../CSS/IMGStyle.css">
    <link rel="icon" href="../IMG/Logo.jpg" type="image/x-icon">
    <title>Vigilante</title>
</head>
<body>
    <header class="header">
		<div class="container">
			<div class="btn-menu">
				<label for="btn-menu">☰</label>
			</div>
			<nav class="menu">
				<a href="#">Bienvenido</a>
				<button id="cerrarSesion">Cerrar sesión</button>
			</nav>
		</div>
	</header>

	<input type="checkbox" id="btn-menu">
	<div class="container-menu">
		<div class="cont-menu">
			<nav>
				<a href="Crud_Unidad/index.php">Info. Unidad</a>
				<div class="dropdown">
					<a href="#">Personal unidad</a>
					<div class="dropdown-content">
                        <a href="Crud_Vigilante/index.php">Info. vigilancia</a>
                        <a href="Crud_Personal/index.php">Info. Personal</a>
                        <a href="Crud_Administrador/index.php">Info. Administradores</a>
					</div>
				</div>
				<a href="Info_Apartamentos/index.php">Info. Apartamentos</a>
				<a href="Crud_Residentes/index.php">Info. Residentes</a>
				<a href="Propietarios/index.php">Info. Propietarios</a>
				<a href="Visitantes/index.php">Info. Visitantes</a>
			</nav>
			<label for="btn-menu">X</label>
		</div>
	</div>
    <section class="conteiner">
        <article class="post">
            <h1><strong>Bienvenido Vigilante</strong></h1>
            <p>Recuerda que como vigilante podras:
                <br>1. Ver la informacion de todas las personas registradas ben la unidad.
                <br>2. Añador nuevos visitantes, editarlos y desativarlos.
                <br><br> Cuida la seguria de la unidad
            </p>
            <img src='mostrar_imagen.php?id=<?php echo $usuario["ID_user"]; ?>' class="img">
            <p><strong>Numero que te identifica: </strong><?php echo $usuario["ID_user"]; ?></p>
            <p><strong>Nombre Completo: </strong><?php echo $usuario["nombreCompleto"]; ?></p>
            <p><strong>Correo: </strong><?php echo $usuario["Gmail_User"]; ?></p>
            <p><strong>Rol: </strong><?php echo obtenerTextoRol($usuario["ID_ROL"]); ?></p>
        </article>
    </section>

    <script>
        // Función para cerrar la sesión
        function cerrarSesion() {
            // Lógica para cerrar la sesión aquí
            // Por ejemplo, redirigir a una página de inicio de sesión o limpiar los datos de sesión
            // Ejemplo básico de redirección a una página de inicio de sesión:
            window.location.href = "../Login_User/LoginUser.php";
        }

        // Función para limpiar los datos de sesión (si es necesario)
        function limpiarDatosSesion() {
            // Lógica para limpiar los datos de sesións
            localStorage.clear(); // Limpiar el almacenamiento local
        }

        // Asignar el evento click al botón
        document.getElementById("cerrarSesion").addEventListener("click", function() {
            cerrarSesion(); // Llamar a la función para cerrar la sesión
            limpiarDatosSesion(); // Llamar a la función para limpiar los datos de sesión si es necesario
        });
    </script>
</body>
</html>