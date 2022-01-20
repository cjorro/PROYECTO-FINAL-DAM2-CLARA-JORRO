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
        if (isset($_POST['idActividad']) )
         {
            $ActivUser=$_POST['idActividad'];
         }
       else
         {
            echo "Error al recibir los datos del formulario.Error 90<br/>";
            exit;
         }

      //borramos de la tabla tblactividadesusuario la actividad elejida por el usuario
         $sqlBorraActUs="update tblactividadesusuario set Borrado=1, FechaFinal=NOW() Where IdUsuario=".$_SESSION['IDUsuario']." and IdActividad=$ActivUser";
         $BorraActividad=$conexion->query($sqlBorraActUs);
         if(!$BorraActividad)
           {
              echo "Error al ejecutar la sql. Error 91<br/>";
              exit;
           }
         else
           {
              header('location:ActividadesUsuario.php');
              exit;
           }



?>
