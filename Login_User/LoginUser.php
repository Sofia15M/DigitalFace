<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="" type="image/x-icon">
    <link rel="stylesheet" href="../CSS/styleLogin.css" />
    <link rel="icon" href="../IMG/Logo.jpg" type="image/x-icon">
    <title>Inicio de sesión</title>
</head>

<body>
    <section>
        <div class="container">
            <div class="user login">
                <div class="form-box">
                    <form method="POST" action="validar.php">
                        <div class="form-control">
                            <h1>Bienvenidos</h1>
                            <br>
                            <input type="email" name="Gmail_User" required="" placeholder="Ingrese su correo electrónico" autocomplete="off">
                            <input type="password" name="Contrasena_User" required="" placeholder="Ingrese su Contraseña" autocomplete="off">
                            <br>
                            <button type="submit">Iniciar Sesión</button>
                        </div>
                    </form>
                </div>
                <div class="img-box">
                    <img src="../IMG/Logo.jpg" alt="" />
                </div>
            </div>
        </div>
    </section>

</body>

</html>
