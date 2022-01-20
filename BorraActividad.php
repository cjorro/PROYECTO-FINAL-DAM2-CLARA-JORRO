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

       //echo "Se recibio la informacion del formulario<br/>";
       $IdActividad=$_POST['idActividad'];
       echo "El id de la actividad es: ".$IdActividad;
    }
  else
    {
       echo "Error al recibir los datos del formulario.Error 90<br/>";
       exit;
    }       

         $sqlBorraActividad1="delete from tblactividadesmonitor where IdActividad=$IdActividad";
         $BorraActividad1=$conexion->query($sqlBorraActividad1);
         if(!$BorraActividad1)
           {
              echo "Error al ejecutar la sql. Error 91<br/>";
              exit;
           }
         else   
           {
            $sqlBorraActividad2="delete from tblactividadesusuario where IdActividad=$IdActividad";
            $BorraActividad2=$conexion->query($sqlBorraActividad2);
            if(!$BorraActividad2)
                {
                    echo "Error al ejecutar la sql. Error 92<br/>";
                    exit;
                }
            else
                {
                    $sqlBorraActividad2="delete from tblactividades where IdActividad=$IdActividad";
                    $BorraActividad2=$conexion->query($sqlBorraActividad2);
                    if(!$BorraActividad2)
                        {
                            echo "Error al ejecutar la sql. Error 93<br/>";
                            exit;
                        }
                    else
                        {
                            header('location:ActividadesMonitor.php');
                            exit;
                        }
                }
           }



?>