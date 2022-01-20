<?php
   // CONTROLAR EL INICIO DE SESION Y LA UTILIZACION DE LA VARIABLE $_SESSION
       session_start();

   // HACEMOS UNA LLAMADA A LA FUNCION QUE HACE LA CONEXION AL SERVIDOR Y A LA BBDD
        include 'ConexionBD.php';
        // Para forzar la codificacion de Caracteres

   // ALMACENAMOS LA INFORMACION RECIBIDA DEL FORMULARIO DE REGISTRO EN VARIABLES
        if (isset($_POST['Nombre']) && isset($_POST['Direccion']) && isset($_POST['Apellidos']) &&
            isset($_POST['Telefono']) && isset($_POST['CodigoPostal']) && isset($_POST['Correo']) &&
            isset($_POST['Provincia']) && isset($_POST['FechaNacimiento']) && isset($_POST['dia']) &&
            isset($_POST['mes']) && isset($_POST['anio']) && isset($_POST['Nick']) &&
            isset($_POST['Password']))
         {
            $NickSinSan=$_POST['Nick'];
            $PassSinSan=$_POST['Password'];
         }
       else
         {
            echo "Error al recibir los datos del formulario.Error 200<br/>";
            exit;
         }

   // "SANEAMOS" LA INFORMACION RECIBIDA DEL FORMULARIO

         function limpiaUnElementoDePOST2(&$valor, $key)
            {
                $_POST[$key] = htmlspecialchars(stripslashes($_POST[$key]));  //ver ayuda htmlentities
                $_POST[$key] = str_ireplace("script", "blocked", $_POST[$key]);  //
                
               // return $_POST[$key];
            }

         function LimpiaTodoPOST2()
            {
             array_walk($_POST  ,'limpiaUnElementoDePOST2');  //presupone valor,clave
            }

        limpiaTodoPOST2();
        //print_r ($_POST);

     // COMPROBAMOS SI EL NICK NO CONTIENE CARACTERES ESPECIALES
    if($NickSinSan!=$_POST['Nick'])
    {
          echo "<form name='frm' action='NuevoMonitor.php?ER=1' method='post'>
                    <input type='hiden' name='Nombre' value='".$_POST['Nombre']."'>
                    <input type='hiden' name='Direccion' value='".$_POST['Direccion']."'>
                    <input type='hiden' name='Apellidos' value='".$_POST['Apellidos']."'>
                    <input type='hiden' name='Telefono' value='".$_POST['Telefono']."'>
                    <input type='hiden' name='CodigoPostal' value='".$_POST['CodigoPostal']."'>
                    <input type='hiden' name='Correo' value='".$_POST['Correo']."'>
                    <input type='hiden' name='Provincia' value='".$_POST['Provincia']."'>
                    <input type='hiden' name='FechaNacimiento' value='".$_POST['FechaNacimiento']."'>
                    <input type='hiden' name='dia' value='".$_POST['dia']."'>
                    <input type='hiden' name='mes' value='".$_POST['mes']."'>
                    <input type='hiden' name='anio' value='".$_POST['anio']."'>
                    <input type='hiden' name='Password' value='".$_POST['Password']."'>
                    <input type='hiden' name='Nick' value='".$_POST['Nick']."'>
                </form>

                <script languaje='javascript' type='text/javascript'>
                     document.frm.submit();
                </script>";
          exit;
    }

    // COMPROBAMOS SI LA CONTRASEÑA NO CONTIENE CARACTERES ESPECIALES
    if( $PassSinSan!=$_POST['Password'])
    {
          echo "<form name='frm' action='NuevoMonitor.php?ER=2' method='post'>
                    <input type='hiden' name='Nombre' value='".$_POST['Nombre']."'>
                    <input type='hiden' name='Direccion' value='".$_POST['Direccion']."'>
                    <input type='hiden' name='Apellidos' value='".$_POST['Apellidos']."'>
                    <input type='hiden' name='Telefono' value='".$_POST['Telefono']."'>
                    <input type='hiden' name='CodigoPostal' value='".$_POST['CodigoPostal']."'>
                    <input type='hiden' name='Correo' value='".$_POST['Correo']."'>
                    <input type='hiden' name='Provincia' value='".$_POST['Provincia']."'>
                    <input type='hiden' name='FechaNacimiento' value='".$_POST['FechaNacimiento']."'>
                    <input type='hiden' name='dia' value='".$_POST['dia']."'>
                    <input type='hiden' name='mes' value='".$_POST['mes']."'>
                    <input type='hiden' name='anio' value='".$_POST['anio']."'>
                    <input type='hiden' name='Password' value='".$_POST['Password']."'>
                    <input type='hiden' name='Nick' value='".$_POST['Nick']."'>
                </form>

                <script languaje='javascript' type='text/javascript'>
                     document.frm.submit();
                </script>";
          exit;
    }

   // COMPROBAMOS SI EL NICK INTRODUCIDO EXISTE
      $sqlNick="select Nick from tblusuario";
      $Nick=$conexion->query($sqlNick);
      if (!$Nick)
        {
            echo "Error al ejecutar la sql. Error 7<br/>";
            exit;
        }

      $i=0;
      $existe;
      while($TodosNick= $Nick->fetch_array(MYSQLI_BOTH))
      {
          if($TodosNick['Nick']==$_POST['Nick'])
          {
             $existe='si';
             break;
          }
          else
          {
             $existe='no';
          }
         $i+=1;
      }

      if($existe=='si')
      {
          //echo "El nick existe";
          echo "<form name='frm' action='NuevoMonitor.php?ER=3' method='post'>
                    <input type='hiden' name='Nombre' value='".$_POST['Nombre']."'>
                    <input type='hiden' name='Direccion' value='".$_POST['Direccion']."'>
                    <input type='hiden' name='Apellidos' value='".$_POST['Apellidos']."'>
                    <input type='hiden' name='Telefono' value='".$_POST['Telefono']."'>
                    <input type='hiden' name='CodigoPostal' value='".$_POST['CodigoPostal']."'>
                    <input type='hiden' name='Correo' value='".$_POST['Correo']."'>
                    <input type='hiden' name='Provincia' value='".$_POST['Provincia']."'>
                    <input type='hiden' name='FechaNacimiento' value='".$_POST['FechaNacimiento']."'>
                    <input type='hiden' name='dia' value='".$_POST['dia']."'>
                    <input type='hiden' name='mes' value='".$_POST['mes']."'>
                    <input type='hiden' name='anio' value='".$_POST['anio']."'>
                    <input type='hiden' name='Password' value='".$_POST['Password']."'>
                    <input type='hiden' name='Nick' value='".$_POST['Nick']."'>
                </form>

                <script languaje='javascript' type='text/javascript'>
                     document.frm.submit();
                </script>
                ";
          exit;
      }
      else
      {
          //echo "El nick no existe";
      }

   // ALMACENAMOS LA INFORMACION DEL MONITOR EN LA TABLA tblusuarios

        $sqlUsuario="insert into tblusuario (Nombre,Apellidos,EstadoUsuario,Email,Direccion,CodProvincia,
                        CodPostal,Telefono,FechaNacimiento,Nick,Contrasenia,TipoUsuario,Foto,Borrado) values
                            ('".$_POST['Nombre']."',
                             '".$_POST['Apellidos']."',
                             1,
                             '".$_POST['Correo']."',
                             '".$_POST['Direccion']."',
                              ".$_POST['Provincia'].",
                              ".$_POST['CodigoPostal'].",
                              ".$_POST['Telefono'].",
                             '".$_POST['FechaNacimiento']."',
                             '".$_POST['Nick']."',
                             '".$_POST['Password']."',
                             1,
                             './Imagenes/ImagenesUsuarios/ImaMon.jpg',
                             0)";

       $NuevoUsuario=$conexion->query($sqlUsuario);
       if (!$NuevoUsuario)
         {
            echo "Error al almacenar la informacion del nuevo usuario. Error 300<br/>";
            exit;
         }
       //Almacenamos el idMonitor del nuevo monitor en la tabla tblMonitor
         //obtenemos el id del nuevo monitor
         $sqlIdNuevoMonitor="select IdUsuario from tblusuario where Nick='".$_POST['Nick']."'";
         $IdNuevoMonitor=$conexion->query($sqlIdNuevoMonitor);
         $IDMon=$IdNuevoMonitor->fetch_array(MYSQLI_BOTH);

         //introducimos el registro en la tabla tblmonitor
         $sqlRellenatblMonitor="insert into tblmonitor(IdUsuario) values($IDMon[0])";
         $RellenatblMonitor=$conexion->query($sqlRellenatblMonitor);
         if (!$NuevoUsuario)
          {
            echo "Error al almacenar la informacion del nuevo usuario. Error 301<br/>";
            exit;
          }

         if($NuevoUsuario && $NuevoUsuario)
          {
            header('location:GestionDeMonitoresAdmin.php?NMOK=1');
          }
        
?>
