<?php
   // CONTROLAR EL INICIO DE SESION Y LA UTILIZACION DE LA VARIABLE $_SESSION
       session_start();

   // HACEMOS UNA LLAMADA A LA FUNCION QUE HACE LA CONEXION AL SERVIDOR Y A LA BBDD
        include 'ConexionBD.php';

   // ALMACENAMOS LA INFORMACION RECIBIDA DEL FORMULARIO DE REGISTRO EN VARIABLES
        if (isset($_POST['Nombre']) && isset($_POST['Direccion']) && isset($_POST['Apellidos']) &&
            isset($_POST['Telefono']) && isset($_POST['CodigoPostal']) && isset($_POST['Correo']) &&
            isset($_POST['Provincia']) && isset($_POST['FechaNacimiento']) && isset($_POST['dia']) &&
            isset($_POST['mes']) && isset($_POST['anio']) && isset($_POST['Nick']) &&
            isset($_POST['Password']))
         {
            
            //echo "Se recibio la informacion del formulario<br/>";
            $NickSinSan=$_POST['Nick'];
            $PassSinSan=$_POST['Password'];
         }
       else
         {
            echo "Error al recibir los datos del formulario.Error 2<br/>";
            exit;
         }
 
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
        
     // COMPROBAMOS SI EL NICK NO CONTIENE CARACTERES ESPECIALES
    if($NickSinSan!=$_POST['Nick'])
    {
          echo "<form name='frm' action='RegistroUsuario.php' method='post'>
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
                    <input type='hiden' name='Alert' value='EL NICK INTRODUCIDO ES INCORRECTO'>
                </form>

                <script languaje='javascript' type='text/javascript'>
                     document.frm.submit();
                </script>";
          exit;        
    }

    // COMPROBAMOS SI LA CONTRASEÑA NO CONTIENE CARACTERES ESPECIALES
    if( $PassSinSan!=$_POST['Password'])
    {
          echo "<form name='frm' action='RegistroUsuario.php' method='post'>
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
                    <input type='hiden' name='Alert' value='EL PASSWORD INTRODUCIDO ES INCORRECTO'>
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
          echo "<form name='frm' action='RegistroUsuario.php' method='post'>
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
                    <input type='hiden' name='Alert' value='En Nick introducido ya existe'>
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


   // ALMACENAMOS LA INFORMACION DEL USUARIO EN LA TABLA tblusuarios        
        $sqlUsuario="insert into tblusuario (Nombre,Apellidos,EstadoUsuario,Email,Direccion,CodProvincia,
                        CodPostal,Telefono,FechaNacimiento,Nick,Contrasenia,TipoUsuario,Borrado) values
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
                             2,
                             0)";

       $NuevoUsuario=$conexion->query($sqlUsuario);

        if (!$NuevoUsuario)
         {
            echo "Error al almacenar la informacion del nuevo usuario. Error 3<br/>";
            exit;
         }
        else
        {
          echo "<form name='frm' action='RegistroUsuario.php' method='post'>
                    <input type='hiden' name='Valido' value='SI'>
                    <input type='hiden' name='Nick' value='".$_POST['Nick']."'>
                </form>
                <script languaje='javascript' type='text/javascript'>
                     document.frm.submit();
                </script>
                ";
           exit;
        }


?>
