<?php 
  session_start();

  require_once '../database/Conexion.php';

  $conexion = new Conexion();
 

  $MiConexion = $conexion->getConection();

  $conexion->sql = "SELECT *FROM usuarios where ID_user=? and
  token_password=?  ";

  try {
    $conexion->pps = $MiConexion->prepare($conexion->sql);
    $conexion->pps->bindParam(1,$_GET['id']);
    $conexion->pps->bindParam(2,$_GET['token']);
 

    $conexion->pps->execute();

    $data = $conexion->pps->fetchAll(PDO::FETCH_OBJ);
  } catch (\Throwable $th) {
    echo $th->getMessage();
  }finally{
    $conexion->closeDataBase();
  }

  if (count($data) > 0 and $data[0]->token_password > time()) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Obtener datos del formulario
        $nueva_contrasena = $_POST['nueva_contrasena'];
        $confirmar_contrasena = $_POST['confirmar_contrasena'];

        // Verificar si las contraseñas coinciden
        if ($nueva_contrasena !== $confirmar_contrasena) {
          $_SESSION['mensaje'] = "Las contraseñas no coinciden. Vuelve a intentarlo.";
        } else {
            // Actualizar la contraseña en la base de datos (sin encriptar)
            $conexion = new Conexion();
            $MiConexion = $conexion->getConection();
            
            $conexion->sql = "UPDATE usuarios SET password = ?, token_password = NULL, expired_session= NULL WHERE ID_user = ? AND token_password = ?";
            $conexion->pps = $MiConexion->prepare($conexion->sql);
            $conexion->pps->bindParam(1, $nueva_contrasena);
            $conexion->pps->bindParam(2, $_GET['id']);
            $conexion->pps->bindParam(3, $_GET['token']);

            if ($conexion->pps->execute()) {
              $_SESSION['mensaje'] = "Contraseña actualizada exitosamente.";
            } else {
              $_SESSION['mensaje'] = "Error al actualizar la contraseña.". $conexion->pps->error;
            }
            
            $conexion->closeDataBase();
        }
    }
} else {
    $_SESSION['mensaje'] = "Lo sentimos, tú enlace ha expirado...";
    header("location:login.php");
}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar contrasenia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
   <div class="container">
    <div class="row justify-content-center align-items-center vh-100">
        <div class="col-xl-6 col-lg-5 col-md-6 col-sm-9 col-12">
        <div class="card">
            <div class="card-header bg bg-primary">
                <p class="h4 text-white">Reset Password</p>
            </div>

           <form action="" method="post">
           <div class="card-body">

                <?php 
                 if(isset($_SESSION['error'])):
                 ?>
                  <div class="alert alert-danger">
                    <?php echo  $_SESSION['error']; ?>
                  </div>
                 <?php unset($_SESSION['error']); endif;?>
                 
                <div class="form-group">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" name="nueva_contrasena" id="nueva_contrasena" class="form-control" >
                </div> 
                <div class="form-group">
                    <label for="password_confirm" class="form-label">Confirmar Contraseña/label>
                    <input type="password" name="confirmar_contrasena" id="confirmar_contrasena" class="form-control" >
                </div> 
 
               
           </div>

           <div class="card-footer">
            <button class="btn btn-primary" name="save">Guardar</button>
            <button type="reset" class="btn btn-danger">Cancelar</button>
           </div>
           </form>
        </div>
        </div>
    </div>
   </div> 
</body>
</html>

 

 