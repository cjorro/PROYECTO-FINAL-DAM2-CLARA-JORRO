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
        if (isset($_POST['Nombre']) && isset($_POST['Direccion']) && isset($_POST['Apellidos']) &&
            isset($_POST['Telefono']) && isset($_POST['CodigoPostal']) && isset($_POST['Correo']) &&
            isset($_POST['Provincia']) && isset($_POST['dia']) && isset($_POST['mes']) &&
            isset($_POST['anio']) && isset($_POST['Nick']) && isset($_POST['FechaNacimiento']) &&
            isset($_POST['Pass']) && isset($_POST['IdUS']))
         {
            $NicKNoSan=$_POST['Nick'];
             // "SANEAMOS" LA INFORMACION RECIBIDA DEL FORMULARIO
             function limpiaUnElementoDePOST2(&$valor, $key)
                {
                    $_POST[$key] = htmlspecialchars(stripslashes($_POST[$key]));  
                    $_POST[$key] = str_ireplace("script", "blocked", $_POST[$key]);  
                }

             function LimpiaTodoPOST2()
                {
                    array_walk($_POST  ,'limpiaUnElementoDePOST2');  
                }

            limpiaTodoPOST2();

            $Nombre=$_POST['Nombre'];
            $Apellidos=$_POST['Apellidos'];
            $Email=$_POST['Correo'];
            $Direccion=$_POST['Direccion'];
            $Provincia=$_POST['Provincia'];
            $Cp=$_POST['CodigoPostal'];
            $Tel=$_POST['Telefono'];
            $FechNac=$_POST['anio']."-".$_POST['mes']."-".$_POST['dia'];
            $Nick=$_POST['Nick'];
            $Id=$_POST['IdUS'];
            $Pass=$_POST['Pass'];
         }
       else
         {
            echo "Error al recibir los datos del formulario.Error 12<br/>";
            exit;
         }

   // COMPROBAMOS SI EL NICK NO CONTIENE CARACTERES ESPECIALES
      if($NicKNoSan!=$Nick)
        {
             header('location:ModificarMonitoresAdmin.php?Id='.$Id.'&ModOP=1&ER=2');
             exit;
        }

   // COMPROBAMOS SI EL NUEVO NICK QUE INTRODUCE EL USUARIO EXITE
      $sqlNick="select Nick from tblusuario where IdUsuario!=$Id";
      $NickM=$conexion->query($sqlNick);
      if (!$NickM)
         {
            echo "Error al ejecutar la consulta. Error 14<br/>";
            exit;
         }

      $n=0;
      $existe=0;
      while($NickMod=$NickM->fetch_array(MYSQLI_BOTH))
      {
         if($NickMod['Nick']==$Nick)
         {
             $existe+=1;
             break;
         }
         $n+=1;
      }

      if($existe!=0)
      {
         header('location:ModificarMonitoresAdmin.php?Id='.$Id.'&ModOP=1&ER=1');
         exit;
      }

   // MODIFICAMOS LA INFORMACION DEL USUARIO EN LA TABLA tblusuarios

        $sqlUserMod="Update tblusuario set
                        Nombre='$Nombre',
                            Apellidos='$Apellidos',
                                Email='$Email',
                                    Direccion='$Direccion',
                                        CodProvincia='$Provincia',
                                            CodPostal='$Cp',
                                                Telefono='$Tel',
                                                    FechaNacimiento='$FechNac',
                                                        Nick='$Nick',
                                                            Contrasenia='$Pass' where IdUsuario=$Id";

       $DatUserMod=$conexion->query($sqlUserMod);

        if (!$DatUserMod)
         {
            echo "Error al modificar los datos del usuario. Error 13<br/>";
            exit;
         }
        else
        {
          header('location:ModificarMonitoresAdmin.php?Id='.$Id.'&DM=1');
        }
?>
