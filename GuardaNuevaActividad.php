<?php
   // CONTROLAR EL INICIO DE SESION Y LA UTILIZACION DE LA VARIABLE $_SESSION
       session_start();

    if (!isset($_SESSION['Valido']) || (isset($_SESSION['Valido']) && $_SESSION['Valido']!=1))
      {
         header('location:index.php');
      }

   // HACEMOS UNA LLAMADA A LA FUNCION QUE HACE LA CONEXION AL SERVIDOR Y A LA BBDD
        include 'ConexionBD.php';

        if(isset($_POST['NombreActividad']) && isset($_POST['NewActividad']) &&
           isset($_POST['Sala']) && isset($_POST['Descripcion']) && isset($_FILES['FotoActividad']) && $_FILES['FotoActividad']['size'] > 0)
        {
            $NombreActividad=ucfirst($_POST['NombreActividad']);
            $TipoDeActividad=$_POST['NewActividad'];
            $NumeroDeSala=$_POST['Sala'];
            $DescripcionDeActividad=$_POST['Descripcion'];


            //GESTION DE LA FOTO
            $NombreTemp = $_FILES['FotoActividad']['tmp_name'];
            $PartesNombre = explode(".",$_FILES['FotoActividad']['name']);
            $Extension = end($PartesNombre); // trozo después del último punto

            //solo va a admitir fotos en extension jpg o jpeg
            if($Extension=="jpeg" || $Extension=="jpg" || $Extension=="JPEG" || $Extension=="JPG" )
                { //si es imagen jpg
                  $img = imagecreatefromjpeg($NombreTemp);
                  $ancho = @imagesx($img);
                  $altura = @imagesy($img);
                  $ancho_nuevo = 166;
                  $altura_nueva = 95;
                  $tmp_img = @imagecreatetruecolor($ancho_nuevo,$altura_nueva);
                  imagecopyresized($tmp_img,$img,0,0,0,0,$ancho_nuevo,$altura_nueva,$ancho,$altura);


                  imagejpeg($tmp_img,$NombreTemp);

                  $NombreCortado=substr($NombreActividad , 0, 5);
                  $nuevonombre="$NombreCortado".$_SESSION['IDUsuario'].".jpg";
                  
                  move_uploaded_file($NombreTemp,"./Imagenes/ImagenesActividades/$nuevonombre" );
                  imagedestroy($img);
                  imagedestroy($tmp_img);
                  $rutafoto="./Imagenes/ImagenesActividades/$nuevonombre";
                }
             else
                {
                    //si al foto tiene una extension que no es la indicada, retorna un error
                    echo "<form name='formErrPhotoAct' action='NuevaActividadMonitor.php' method='post'>
                        <input type='hiden' name='NomAct' value='$NombreActividad'/>
                        <input type='hiden' name='TipoAct' value='$TipoDeActividad'/>
                        <input type='hiden' name='NumSala' value='$NumeroDeSala'/>
                        <input type='hiden' name='DescAct' value='$DescripcionDeActividad'/>
                        <input type='hiden' name='Error' value='1'/>
                    </form>

                    <script languaje='javascript' type='text/javascript'>
                        document.formErrPhotoAct.submit();
                    </script>";
                    exit;
                }

                    //GUARDAMOS LOS DATOS REFERENTES A LA NUEVA ACTIVIDAD EN LA BASE DE DATOS
                    //Almancenamos el registro de la nueva actividad en la tabla tblactividades
                    $sqlGuardaNuevaActividad="insert into tblactividades set
                                                 NombreActividad='$NombreActividad',
                                                 IdTipoActividad='$TipoDeActividad',
                                                 Sala='$NumeroDeSala',
                                                 Foto='$rutafoto',
                                                 Descripcion='$DescripcionDeActividad'";
                    $GuardaNuevaActividad=$conexion->query($sqlGuardaNuevaActividad);
                    if(!$GuardaNuevaActividad)
                        {
                          echo "Error al almacenar la actividad. Error 150<br/>";
                          exit;
                        }

                    //Almacenamos el registro de la nueva actividad en la tabla tblactividadesmonitor
                        //Almacenamos en una variable el Id de la nueva actividad
                            $sqlObtieneIdNuevaActividad="select IdActividad from tblactividades where NombreActividad='$NombreActividad'";
                            $ObtieneIdNuevaActividad=$conexion->query($sqlObtieneIdNuevaActividad);
                            $IdActividadNew=$ObtieneIdNuevaActividad->fetch_array(MYSQLI_BOTH);

                        //Almacenamos en una variable el Id del monitor que ha creado la Actividad
                            $sqlIdMonitorNuevaAct="select IdMonitor from tblmonitor where IdUsuario=".$_SESSION['IDUsuario']."";
                            $IdMonitorNuevaAct=$conexion->query($sqlIdMonitorNuevaAct);
                            $ClaveMonitor=$IdMonitorNuevaAct->fetch_array(MYSQLI_BOTH);

                        // Guardamos el registro en la tabla
                            $sqlIntroActMonitor="insert into tblactividadesmonitor set
                                                IdMonitor='$ClaveMonitor[0]',
                                                IdActividad='$IdActividadNew[0]'";
                            $IntroActMonitor=$conexion->query($sqlIntroActMonitor);
                            if(!$IntroActMonitor)
                                {
                                  echo "Error al almacenar la actividad. Error 151<br/>";
                                  exit;
                                }

                    if($GuardaNuevaActividad && $IntroActMonitor)
                     {
                       header("location:NuevaActividadMonitor.php?ALM=OK&Act=".$NombreActividad."");
                     }
          }
?>
