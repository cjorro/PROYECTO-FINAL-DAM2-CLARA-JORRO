<?php
   // CONTROLAR EL INICIO DE SESION Y LA UTILIZACION DE LA VARIABLE $_SESSION
       session_start();

    if (!isset($_SESSION['Valido']) || (isset($_SESSION['Valido']) && $_SESSION['Valido']!=1))
      {
         header('location:index.php');
      }

   // HACEMOS UNA LLAMADA A LA FUNCION QUE HACE LA CONEXION AL SERVIDOR Y A LA BBDD
        include 'ConexionBD.php';

        if(isset($_GET['Est']) && isset($_GET['Id']) && is_numeric($_GET['Id']))
         {
             //variable que contiene el Id del Usuario a modificar
             $IdUsuario=$_GET['Id'];
             $Estado=$_GET['Est'];
         }
        else
         {
            echo "No se recibieron datos. Error 170";
            exit;
         }

        // si ha pagado hay que cambiarle el estado a no pagado
        if($Estado==0)
          {
            $reg=1;
          }
        else// si no ha pagado hay que cambiarle el estado a pagado
          {
            $reg=0;
          }
          
        $sqlFuerzaPagado="update tblusuario set EstadoUsuario=$reg where IdUsuario=$IdUsuario";
         
        $FuerzaPagado=$conexion->query($sqlFuerzaPagado);
        if(!$FuerzaPagado)
          {
                echo "Error al ejecutar la sql. Error 150";
                exit;
          }
        else
        {
            header('location:ModificarUsuariosAdmin.php?Id='.$IdUsuario.'&EP=1');
        }
         
?>
