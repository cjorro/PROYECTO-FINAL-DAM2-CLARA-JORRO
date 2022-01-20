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
            isset($_POST['Peso']) && isset($_POST['IDUser']) && isset($_POST['Fecha']))
     {
         $IMC=$_POST['MasaCorporal'];
         $IMM=$_POST['MasaMuscular'];
         $Altura=$_POST['Altura'];
         $Peso=$_POST['Peso'];
         $ID=$_POST['IDUser'];
         $Fecha=$_POST['Fecha'];
         
         //actualizamos los datos en la base de datos
         $sqlModificaPGUsuario="update tblprogresosfisicos set IndiceMasaCorporal=$IMC,
                                Peso=$Peso, Altura=$Altura, IndiceMasaMuscular=$IMM where IdUsuario=$ID and Fecha='$Fecha'";
         $ModificaPGUsuario=$conexion->query($sqlModificaPGUsuario);
         if(!$ModificaPGUsuario)
           {
             echo "Error al modificar los datos. Error 130.";
             exit;
           }
         else
           {
                //calculamos el nombre del usuario
                $sqlNombreUser="select Nombre from tblusuario where IdUsuario=$ID";
                $NombreUser=$conexion->query($sqlNombreUser);
                $Usuario=$NombreUser->fetch_array(MYSQLI_BOTH);

                //para mostrar la fecha en notacion occidental
                $fechaCompt=explode (' ', $Fecha);
                $fech=explode ('-', $fechaCompt[0]);
                $fechaActiv=$fech[2]."/".$fech[1]."/".$fech[0];

                header("location:ProgresosFisicosMonitor.php?MOD=OK&User=".$Usuario[0]."&Fech=".$fechaActiv."");
           }


     }
    else
     {
        echo "no se ha recibido nada";
     }
?>
