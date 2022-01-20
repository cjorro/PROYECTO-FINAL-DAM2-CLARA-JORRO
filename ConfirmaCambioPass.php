<?php
   // CONTROLAR EL INICIO DE SESION Y LA UTILIZACION DE LA VARIABLE $_SESSION
       session_start();

    if (!isset($_SESSION['Valido']) || (isset($_SESSION['Valido']) && $_SESSION['Valido']!=1))
      {
         header('location:index.php');
      }

   // HACEMOS UNA LLAMADA A LA FUNCION QUE HACE LA CONEXION AL SERVIDOR Y A LA BBDD
        include 'ConexionBD.php';

   // ALMACENAMOS LA INFORMACION RECIBIDA DEL FORMULARIO DE REGISTRO EN VARIABLES
        if (isset($_POST['PassAct']) && isset($_POST['NewPass']) && isset($_POST['ReNewPass']))
         {
            $PassAct=$_POST['PassAct'];
            //echo $PassAct."<br/>";
            $PassNew=$_POST['NewPass'];
            //echo $PassNew."<br/>";
            $RePassNew=$_POST['ReNewPass'];
            //echo $RePassNew."<br/>";
         }
        else
         {
            echo "Error al recibir los datos del formulario.Error 22<br/>";
            exit;
         }

      // COMPROBAMOS QUE LA CONTRASEÑA ACTUAL ES CORRECTA
      $sqlPassAct="select Contrasenia from tblusuario where IdUsuario=".$_SESSION['IDUsuario'];
      $ContAct=$conexion->query($sqlPassAct);
      if (!$ContAct)
         {
            echo "Error al ejecutar la consulta. Error 25<br/>";
            exit;
         }

      $PassUser=$ContAct->fetch_array(MYSQLI_BOTH);

      // Si la contraseña no es la actual, retorna error 1
      if($PassUser[0]!=$PassAct)
        {
          header('location:ModificarPassword.php?ER=1');
        }
      else
        {
           // MODIFICAMOS LA CONTRASEÑA DEL USUARIO EN LA TABLA tblusuarios

           $sqlContraMod="update tblusuario set Contrasenia='$PassNew' where IdUsuario=".$_SESSION['IDUsuario'];

           $ContraMod=$conexion->query($sqlContraMod);

            if (!$ContraMod)
             {
                echo "Error al modificar la contrase&ntilde;a del usuario. Error 26<br/>";
                exit;
             }
            else
            {
              header('location:ModificarPassword.php?DM=1');
            }
        }

?>
