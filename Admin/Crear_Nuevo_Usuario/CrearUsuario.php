<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../CSS/nav.css">
    <link rel="stylesheet" href="../../CSS/styleCrear.css">
    <title>Regístrar</title>
</head>

<body>
    <header class="header">
        <div class="container">
            <nav class="menu">
                <a href="#">Crear Usuario</a>
                <a href="../../Admin/IndexAdmin.php" class="atras">Volver atrás</a>
            </nav>
        </div>
    </header>
    <br><br><br><br><br>
    <section>
        <div class="container">
            <div class="user login">
                <div class="img-box">
                    <img src="../../IMG/User.jpg" alt="" />
                </div>
                <div class="form-box">
                    <form method="POST" action="registro.php" enctype="multipart/form-data" id="registroForm">
                        <div class="form-control">
                            <h1>¡Bienvenidos!</h1>
                            <br>
                            <label for="Gmail_User">Correo:</label>
                            <input type="email" name="Gmail_User" required="" placeholder="Ingresa el correo" />
                            <br>
                            <label for="Contrasena_User">Contraseña:</label>
                            <input type="password" name="Contrasena_User" required="" placeholder="Ingresa la contraseña" />
                            <br>
                            <label for="Foto_User">Añade una foto:</label>
                            <input type="file" id="Foto_User" name="Foto_User" accept="image/*" required>
                            <br>
                            <label for="ID_ROL">Rol:</label>
                            <p>(1 - para administrador) <br> (2 - para vigilante)</p>
                            <input type="text" name="ID_ROL" required="" placeholder="Ingresa tu rol" />
                            <br><br>
                            <input type="submit" name="submit" value="Register" id="registroButton" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script>
        document.getElementById('registroForm').addEventListener('submit', function(event) {
            var rolInput = document.getElementById('ID_ROL').value;

            if (rolInput !== '1' && rolInput !== '2') {
                // Utilizando SweetAlert2 para mostrar el mensaje de error
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Ingresa un número válido para el rol (1 o 2)'
                });
                event.preventDefault(); // Evita que se envíe el formulario si la validación falla
            }
        });
    </script>

</body>
</html>