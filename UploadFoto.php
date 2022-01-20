<?php
   // HACEMOS UNA LLAMADA A LA FUNCION QUE HACE LA CONEXION AL SERVIDOR Y A LA BBDD
        include 'ConexionBD.php';
            
        // si hay una foto subida existe la posibilidad de borrarla y poner la de por defecto
        $sqlimagen="select Foto from tblusuario where IdUsuario=".$_SESSION['IDUsuario'];
        $imagen=$conexion->query($sqlimagen);
        if (!$imagen)
           {
              echo "Error al ejecutar la sql. Error 10<br/>";
              exit;
           }
        $NombreImagen=$imagen->fetch_array(MYSQLI_BOTH);
        
    if ((isset($_SESSION['Valido']) && $_SESSION['Valido']==1)) //SI HA HECHO ALGUIEN LOGIN
     {
            echo "<div class='TitModPass'>Elije una foto para tu perfil, <strong>".$_SESSION['Nombre']."</strong>: </div>
               <table class='TabModPass' border='0' cellpadding='5' cellspacing='5'>
                  <form id='formFoto' action='GuardaFoto.php' method='post' enctype='multipart/form-data' onsubmit='return VerificaFoto()'>
                    <tr><td><input type='file' name='foto'></td></tr>
                    <tr><td><input type='submit' value='Subir foto'></td></tr>
                  </form>";
                    //Mensaje que se muestra si la imagen se subio correctamente
                    if(isset($_GET['im']) && $_GET['im']=='ok' )
                      {   
                        echo"<tr><td style='background-color:#222;'>LA FOTO SE SUBI&Oacute; CORRECTAMENTE</td></tr> ";
                      }
                    else
                      {
                        //Mensaje que se muestra si la extension de la imagen subida es incorrecta
                        if(isset($_GET['ER']) && $_GET['ER']==1 )
                          {
                            echo"<tr><td style='background-color:#222;'>NO SE ADMITEN FOTOS CON ESA EXTENSI&Oacute;N</td></tr> ";
                          }
                        else
                          {
                            echo"<tr><td style='background-color:#222;'>&nbsp;</td></tr>";
                          }
                      }
                  echo"</table>";

                    //Opcion de borrar la foto, si el usuario ha subido previamente una
                    if($NombreImagen[0]!=null)
                      {
                        echo" <form id='formFoto' action='GuardaFoto.php' method='post'>
                           <table class='TabModPass' border='0' cellpadding='5' cellspacing='5'>
                                <tr>
                                   <td>
                                      Para borrar la foto, pulse <input type='submit' value='Borrar Foto'>
                                      <input type='hidden' name='Borrar' value='si'/>
                                   </td>
                                </tr>
                           </table>
                        </form>";
                      }
     }
    else
     {
            header('location:index.php');
     }

?>
