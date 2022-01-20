<?php
   // CONTROLAR EL INICIO DE SESION Y LA UTILIZACION DE LA VARIABLE $_SESSION
       session_start();

    if (!isset($_SESSION['Valido']) || (isset($_SESSION['Valido']) && $_SESSION['Valido']!=1))
      {
         header('location:index.php');
      }

   // HACEMOS UNA LLAMADA A LA FUNCION QUE HACE LA CONEXION AL SERVIDOR Y A LA BBDD
        include 'ConexionBD.php';
        // Para forzar la codificacion de Caracteres

    if (isset($_POST['Borrar']) && $_POST['Borrar']=='si')
        {
            //almacenamos el nombre de la ruta para borrarla
            $sqlFoto="select Foto from tblusuario where IdUsuario=".$_SESSION['IDUsuario'];
            $FotoUser = $conexion->query($sqlFoto);
            if(!$FotoUser)
                {
                    echo "Error al ejecutar la sql. Error 95<br/>";
                    exit;
                }
            $FotoUsuarioABorrar=$FotoUser->fetch_array(MYSQLI_BOTH);

            // ponemos vacio el campo foto
            $sqlBorraFoto="update tblusuario set Foto='' where IdUsuario=".$_SESSION['IDUsuario'];
            $BorraFoto = $conexion->query($sqlBorraFoto);
            if(!$BorraFoto)
                {
                  echo "Error al ejecutar la sql. Error 37<br/>";
                  exit;
                }
            else
                {
                  // borramos la imagen, el archivo
                  unlink($FotoUsuarioABorrar[0]);
                  header('location:Subirfoto.php');
                }
        }

    if (isset($_FILES['foto']) && $_FILES['foto']['size'] > 0)
        {
		$NombreTemp = $_FILES['foto']['tmp_name'];
		$PartesNombre = explode(".",$_FILES['foto']['name']);
		$Extension = end($PartesNombre); // trozo después del último punto
                //
                //solo va a admitir fotos en extension jpg o jpeg
		if ($Extension=="jpeg" || $Extension=="jpg" || $Extension=="JPEG" || $Extension=="JPG" )
                    { //si es imagen jpg
                      $img = imagecreatefromjpeg($NombreTemp);
                      $ancho = @imagesx($img);
                      $altura = @imagesy($img);
                      $ancho_nuevo = 85;
                      $altura_nueva = 100;
                      $tmp_img = @imagecreatetruecolor($ancho_nuevo,$altura_nueva);
                      imagecopyresized($tmp_img,$img,0,0,0,0,$ancho_nuevo,$altura_nueva,$ancho,$altura);

                      imagejpeg($tmp_img,$NombreTemp);
                      $nuevonombre="ImaUser".$_SESSION['IDUsuario'].".jpg";
                      move_uploaded_file($NombreTemp,"./Imagenes/ImagenesUsuarios/$nuevonombre" );
                      imagedestroy($img);
                      imagedestroy($tmp_img);
                      $rutafoto="./Imagenes/ImagenesUsuarios/$nuevonombre";

                      //GUARDAMOS LA FOTO EN LA BASE DE DATOS
                      $sqlExistFoto="select Foto from tblusuario where IdUsuario=".$_SESSION['IDUsuario'];
                      $ExistFoto = $conexion->query($sqlExistFoto);
                      if(!$ExistFoto)
                        {
                          echo "Error al ejecutar la sql. Error 35<br/>";
                          exit;
                        }
                      $FotoVacia=$ExistFoto->fetch_array(MYSQLI_BOTH);

                      if($FotoVacia[0]=='null')
                       {
                          $sqlFoto="insert into tblusuario(Foto) values('$rutafoto') where IdUsuario=".$_SESSION['IDUsuario'];
                       }
                      else
                       {
                          $sqlFoto="update tblusuario set Foto='$rutafoto' where IdUsuario=".$_SESSION['IDUsuario'];
                       }
                      
                      $RutaFoto = $conexion->query($sqlFoto);
                      if(!$RutaFoto)
                        {
                          echo "Error al ejecutar la sql. Error 36<br/>";
                          exit;
                        }
                      else
                        {
                          header('location:Subirfoto.php?im=ok');
                        }

                    }
                else
                  {
                    header('location:Subirfoto.php?ER=1');
                  }
        }
   
?>
