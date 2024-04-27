<?php 
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require '../config/setting.php';
require '../database/Conexion.php';
   if(isset($_POST['send'])):
      
      if(!empty($_POST['Gmail_User']))
      {
         if(filter_var($_POST['Gmail_User'],FILTER_VALIDATE_Gmail_User))
         {
               $Usuario = ConsultarUsuariosPorGmail_User($_POST['Gmail_User']);
               if(count($Usuario) > 0)
               {
               /// enviar el correo

               $token_ = bin2hex(random_bytes(32));

               if(updateUser($token_,TIEMPO_VIDA,$Usuario[0]->ID_user));
               {
            /// mandamos actualziar
               EnviarCorreoResetPassowrd($Usuario[0]->Gmail_User, $Usuario[0]->name,$Usuario[0]->ID_user,$token_password);
               }
               }
               else
               {
                  $_SESSION['response'] = "no existe Usuario";
               } 
         }
         else
         {
            $_SESSION['response'] = 'Gmail_User incorrecto';
         }
      }
      else
      {
         $_SESSION['response'] = 'input vacio';
      }
      
      /// redirigimos 
      //header("location:../view/reset_password.php");
   endif;

   /// método que consulta al Usuarios por correo

   function ConsultarUsuariosPorGmail_User($Gmail_User)
   {
   $conex = new Conexion;

   /// consultamos

   $conex->sql = "SELECT * FROM Usuarios WHERE Gmail_User=:Gmail_User";

   try {
      $conex->pps = $conex->getConection()->prepare($conex->sql);
      $conex->pps->bindParam(":Gmail_User",$Gmail_User);
      $conex->pps->execute();

      return $conex->pps->fetchAll(PDO::FETCH_OBJ);

   } catch (\Throwable $th) {
      echo $th->getMessage();
   }finally{
      $conex->closeDataBase();
   }
   }

   /// actualizamos Usuarios
   function updateUser($token,$tiempo_vida,$User_Id)
   {
   $conex = new Conexion();
   $Valor = "1";

   $conex->sql = "UPDATE Usuarios set token_password=:token_password,expired_session=:expired_session where ID_user=:ID_user";

   try {
      $conex->pps = $conex->getConection()->prepare($conex->sql);
      $conex->pps->bindParam(":token_password",$token);
      $conex->pps->bindParam(":expired_session",$tiempo_vida);
      $conex->pps->bindParam(":ID_user",$User_Id);

      return $conex->pps->execute();

   } catch (\Throwable $th) {
      echo $th->getMessage();
   }
   }

   /**
    * envio de correos electronicos
   */
   function EnviarCorreoResetPassowrd($Correo,$NombreReceptor,$userid,$token_User)
   {
      $mail = new PHPMailer(true);
      try {
      //Server settings
      $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
      $mail->isSMTP();                                            //Send using SMTP
      $mail->Host       = HOST;                     //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
      $mail->Username   = USERNAME;                     //SMTP username
      $mail->Password   = PASSWORD;                               //SMTP password
      $mail->SMTPSecure = SMTP_SECURE;            //Enable implicit TLS encryption
      $mail->Port       = PORT;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

      //Recipients
      $mail->setFrom('digitalface702@gmail.com', 'Soporte');
      $mail->addAddress($Correo, $NombreReceptor);     //Add a recipient
   

      //Content
      $mail->isHTML(true);                                  //Set Gmail_User format to HTML
      $mail->Subject = 'Reseteo de password';
      $mail->Body    = 'Usted ha solicitado un reseteo de contraseña<b> 
      <a href="#'.$userid.'&&token='.$token_User.'">cambiar contraseña aquí</a></b>';

      $mail->send();
      echo 'Mensaje enviado';
   } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
   }
   }

  
