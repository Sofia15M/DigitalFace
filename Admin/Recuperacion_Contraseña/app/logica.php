<?php 
 session_start();
 require '../database/Conexion.php';
# login de acceso
 if(isset($_POST['login']))
 {
    /// realiza el proceso de login

  if(isset($_POST['Gmail_User']) and $_POST['Contraseña_User'])
  {
   $login = $_POST['Gmail_User'];

   $Contraseña_User  = $_POST['Contraseña_User'];

   login(
    ["nombrecompleto"=>$login,
     "Contraseña_User"=>$Contraseña_User
    ]
  );
  }
  else
  {
    $_SESSION['error'] = 'Ingrese sus credenciales';
    header("location:../view/login.php");
  }

 }

 # registrar nuevos usuarios

 if(isset($_POST['registrate']))
 {
     /// crear las variables para los datos a enviar
     $nombrecompleto = $_POST['nombrecompleto'] ?? '';
     $Id = $_POST['ID_user'] ?? '';
     $Gmail_User = $_POST['Gmail_User'] ?? '';
     $Contraseña_User = $_POST['Contraseña_User'];
     $ID_ID_ROL = $_POST['ID_ID_ROL'];
     $ID_UNIDAD = $_POST['ID_UNIDAD'];
     $Foto_User = $_POST['Foto_User'];
     $token_Contraseña_User = $_POST['token_Contraseña_User'];
     $expired_session = $_POST['Iexpired_session'];

    $respuesta =  saveUser([
        "id"=>$ID_user,
        "nombrecompleto"=>$ombrecompleto,
        "Gmail_User"=>$Gmail_User,
        "Contraseña_User"=>Contraseña_User_hash($Contraseña_User,Contraseña_User_BCRYPT),
        "ID_ID_ROL"=>$ID_ID_ROL,
        "ID_UNIDAD"=>$ID_UNIDAD,
        "Foto_User"=>$Foto_User,
        "token_Contraseña_User"=>$token_Contraseña_User,
        "expired_session"=>$expired_session
     ]);

    $Mensaje = $respuesta? 'usuario registrado':'error al registrar usuario';

    $_SESSION['mensaje'] = $Mensaje;

    header("location:../view/registrate.php");
 }


 /** 
  * Método para registrar usuario
  */

  function saveUser(array $datos)
  {
  try {
    $Conex = new Conexion;

    $MiConexion = $Conex->getConection();
 
    $Conex->pps = $MiConexion->prepare(
     "INSERT INTO usuarios(nombrecompleto,Gmail_User,Contraseña_User,ID_ROL) VALUES(:nombrecompleto,:Gmail_User,:Contraseña_User,:ID_ROL)"
    );
 
    $Conex->pps->bindParam(":nombrecompleto",$datos['nombrecompleto']);$Conex->pps->bindParam(":Gmail_User",$datos['Gmail_User']);
     $Conex->pps->bindParam(":Contraseña_User",$datos['Contraseña_User']);
    $Conex->pps->bindParam(":ID_ROL",$datos['ID_ROL']);
 
    return $Conex->pps->execute(); /// 1 | 0
  } catch (\Throwable $th) {
    echo $th->getMessage();
  }finally
  {
    $Conex->closeDataBase();
  }
  }

  /// realizar el login al sistema
  function login(array $credenciales)
  {
    /// consultar a la base de datos
    $conex = new Conexion;

    $usuario = ConsultaUsuario($conex,["nombrecompleto"=>$credenciales['nombrecompleto']]);

     if(count($usuario) > 0)
     {
      $Usernombrecompleto = $usuario[0]['nombrecompleto']; 
      $Gmail_User = $usuario[0]['Gmail_User'];

      $HashContraseña_User = $usuario[0]['Contraseña_User'];

      if($Usernombrecompleto === $credenciales['nombrecompleto'] or $Gmail_User === $credenciales['nombrecompleto'])
      {
       /// hacemos la verificación del Contraseña_User

        if(Contraseña_User_verify($credenciales['Contraseña_User'],$HashContraseña_User))
        {
          header("location:../view/dashboard.php");
        }
        else
        {
           $_SESSION['error'] = 'Error en Contraseña_User';
         header("location:../view/login.php");
        }
      }
      else
      {
        $_SESSION['error'] = 'Error en el nombre de usuario';
         header("location:../view/login.php");
      }
     }
     else
     {
      $_SESSION['error'] = 'Error, no existe ese usuario';
       header("location:../view/login.php");
     }
  }

  /// consultamos al usuario
  function ConsultaUsuario($conexion,array $dataConsulta)
  {
    $consulta = "
    SELECT *FROM usuarios WHERE nombrecompleto =:nombrecompleto or Gmail_User=:Gmail_User
    ";

    try {
    $conexion->pps = $conexion->getConection()->prepare($consulta);

    $conexion->pps->bindParam(":nombrecompleto",$dataConsulta['nombrecompleto']);
    $conexion->pps->bindParam(":Gmail_User",$dataConsulta['nombrecompleto']);

    $conexion->pps->execute();

    return $conexion->pps->fetchAll();

    } catch (Exception $e) {
      echo $e->getMessage();
    }finally{
      $conexion->closeDataBase();
    }


  }

  // Función para actualizar la contraseña de un usuario
function actualizarContraseña(array $datos)
{
    try {
        $Conex = new Conexion;
        $MiConexion = $Conex->getConection();
 
        // Verificar si el usuario existe en la base de datos
        $usuario = ConsultaUsuario($Conex, ["nombrecompleto" => $datos['nombrecompleto']]);

        if (count($usuario) > 0) {
            // Obtener el ID del usuario
            $ID_user = $usuario[0]['id'];

            // Hash de la nueva contraseña
            $hashed_Contraseña_User = Contraseña_User_hash($datos['Contraseña_User'], Contraseña_User_BCRYPT);

            // Consulta SQL para actualizar la contraseña
            $Conex->pps = $MiConexion->prepare("UPDATE usuarios SET Contraseña_User = :Contraseña_User WHERE ID_user = :ID_user");
            $Conex->pps->bindParam(":Contraseña_User", $hashed_Contraseña_User);
            $Conex->pps->bindParam(":ID_user", $ID_user);

            // Ejecutar la consulta
            if ($Conex->pps->execute()) {
                return true; // Contraseña actualizada correctamente
            } else {
                return false; // Error al actualizar la contraseña
            }
        } else {
            return false; // usuarios no encontrado
        }
    } catch (\Throwable $th) {
        echo $th->getMessage();
    } finally {
        $Conex->closeDataBase();
    }
}
