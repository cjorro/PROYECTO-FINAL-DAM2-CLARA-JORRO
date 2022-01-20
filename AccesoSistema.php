<?php
   // HACEMOS UNA LLAMADA A LA FUNCION QUE HACE LA CONEXION AL SERVIDOR Y A LA BBDD
        include 'ConexionBD.php';

    if ((isset($_SESSION['Valido']) && $_SESSION['Valido']==1)&&
            (isset($_SESSION['Borrado']) && $_SESSION['Borrado']==0)) //SI HA HECHO ALGUIEN LOGIN
        {
            if(isset($_SESSION['TipoUsuario']) && $_SESSION['TipoUsuario']==0){$tipoUsuario="Administrador";}
            if(isset($_SESSION['TipoUsuario']) && $_SESSION['TipoUsuario']==1){$tipoUsuario="Monitor";}
            if(isset($_SESSION['TipoUsuario']) && $_SESSION['TipoUsuario']==2){$tipoUsuario="Usuario";}


            // Comprobamos si el usuario que a hecho login tiene foto, si no se le pondra una por defecto
            $sqlimagen="select Foto from tblusuario where IdUsuario=".$_SESSION['IDUsuario'];
            // $imagen=($sqlimagen);
            $imagen = $conexion->query($sqlimagen);
            if (!$imagen)
            {
              echo "Error al ejecutar la sql. Error 10<br/>";
              exit;
            }
            $NombreImagen=$imagen->fetch_array(MYSQLI_BOTH);
            
            //si no tiene imagen, se le pone una por defecto, si la tiene, se muestra
            if($NombreImagen[0]==null)
              {
                 $imagenUsuario="./Imagenes/ImagenesUsuarios/ImaUserdes.jpg";
              }
            else
              {
                $imagenUsuario=$NombreImagen[0];
              }

            echo "<div class='tituloLogeado'>Bienvenido/a ".$_SESSION['Nombre']."</div>";
            echo "<div class='ContieneLogueado'>";
                    echo "<table class='TablLogueado' border='0' cellpadding='5' cellspacing='5'>
                                <tr>
                                    <td>
                                    <img src='$imagenUsuario'/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <form action='CierraSession.php' method='post'>
                                           <div style='text-align:center;'>
                                              <input type='submit' value='Cerrar sesi&oacute;n'/>
                                           </div>
                                        </form>
                                    </td>
                                </tr>
                           </table>
                   </div>";

        }
    else // SI NO HA HECHO NADIE LOGIN
        {
            echo "<div class='tituloLogeador'>ACCEDER AL SISTEMA</div>";

            include 'IntroUsuario.php';

            if (isset($_GET['error'])&& $_GET['error']==1 ) // si viene de fallo de ValidaUsuario
              print "<div style='font-size:16px; color:#f22; text-align:center; background-color:#222;
                           width:210px; margin:0 auto; padding:3px 0px;'>Usuario/clave incorrecta</div> \n ";
            if (isset($_GET['error'])&& $_GET['error']==2 ) // si viene de fallo de ValidaUsuario
              print "<div style='font-size:16px; color:#f22; text-align:center; background-color:#222;
                           width:210px; margin:0 auto; padding:3px 0px;'>Usuario Deshabilitado</div> \n ";
        }

?>
