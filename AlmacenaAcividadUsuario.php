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
        if (isset($_POST['Actividad']) )
         {
            $ActivUser=$_POST['Actividad'];
         }
       else
         {
            echo "Error al recibir los datos del formulario.Error 50<br/>";
            exit;
         }

        //Almacenamos en un array todas las actividades a las que esta apuntado el usuario
            $sqlActUsuario="select * from tblactividadesusuario where IdUsuario=".$_SESSION['IDUsuario']." and Borrado=0";
            $ActUsuario=$conexion->query($sqlActUsuario);
            if(!$ActUsuario)
               {
                echo "Error al ejecutar la sql. Error 81<br/>";
                exit;
              }

            $i=0;
            $existe=0;

            while($ActividadesUsuario=$ActUsuario->fetch_array(MYSQLI_BOTH))
            {
               if($ActividadesUsuario['IdActividad']==$ActivUser)
               {
                   $existe++;
               }
               $i++;
            }

            if($existe!=0)
            {
                header('location:ActividadesUsuario.php?ER=1');
                exit;
            }

         // Almacenamos el monitor de esa actividad
             $sqlMon="select IdMonitor from tblactividadesmonitor where IdActividad=$ActivUser";
             $MonAct=$conexion->query($sqlMon);
             if(!$MonAct)
               {
                echo "Error al ejecutar la sql. Error 70<br/>";
                exit;
              }
             $IdMonitor= $MonAct->fetch_array(MYSQLI_BOTH);
             $Monitor= $IdMonitor[0];

         //Se inscribe el usuario en esa actividad
             $sqlInscribeAct="insert into tblactividadesusuario (IdUsuario,IdActividad, IdMonitor,FechaInicio,Borrado) values
                              (".$_SESSION['IDUsuario'].",$ActivUser,$Monitor,NOW(),0)";

             $InscribeAct=$conexion->query($sqlInscribeAct);
             if(!$InscribeAct)
               {
                    echo "Error al ejecutar la sql. Error 71<br/>";
                    exit;
               }
             else
               {
                    header('location:ActividadesUsuario.php');
                    exit;
               }
?>
