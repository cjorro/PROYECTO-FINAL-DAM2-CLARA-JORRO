<?php
   // CONTROLAR EL INICIO DE SESION Y LA UTILIZACION DE LA VARIABLE $_SESSION
       session_start();

    if (!isset($_SESSION['Valido']) || (isset($_SESSION['Valido']) && $_SESSION['Valido']!=1))
      {
         header('location:index.php');
      }

   // HACEMOS UNA LLAMADA A LA FUNCION QUE HACE LA CONEXION AL SERVIDOR Y A LA BBDD
        include 'ConexionBD.php';

    if(isset($_POST['MasaCorporal']) && isset($_POST['MasaMuscular']) && isset($_POST['Altura']) &&
            isset($_POST['Peso']) && isset($_POST['IDUser']))
     {
         $IMC=$_POST['MasaCorporal'];
         $IMM=$_POST['MasaMuscular'];
         $Altura=$_POST['Altura'];
         $Peso=$_POST['Peso'];
         $ID=$_POST['IDUser'];

         //guardamos los datos en la base de datos
         $sqlNuevoPGUsuario="insert into tblprogresosfisicos (IdUsuario,IndiceMasaCorporal,Peso,Altura,IndiceMasaMuscular,Fecha)
                                values ($ID,$IMC,$Peso,$Altura,$IMM,NOW())";
         $NuevoPGUsuario=$conexion->query($sqlNuevoPGUsuario);
         if(!$NuevoPGUsuario)
           {
             echo "Error al modificar los datos. Error 140.";
             exit;
           }
         else
           {
                //calculamos el nombre del usuario
                $sqlNombreUser="select Nombre from tblusuario where IdUsuario=$ID";
                $NombreUser=$conexion->query($sqlNombreUser);
                $Usuario=$NombreUser->fetch_array(MYSQLI_BOTH);

                header("location:ProgresosFisicosMonitor.php?ALM=OK&User=".$Usuario[0]."");
           }
     }
    else
     {
        echo "no se ha recibido nada";
     }
?>
