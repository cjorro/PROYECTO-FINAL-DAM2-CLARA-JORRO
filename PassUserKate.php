<?php
   // HACEMOS UNA LLAMADA A LA FUNCION QUE HACE LA CONEXION AL SERVIDOR Y A LA BBDD
        include 'ConexionBD.php';

    if ((isset($_SESSION['Valido']) && $_SESSION['Valido']==1)) //SI HA HECHO ALGUIEN LOGIN
     {
         if(isset($_SESSION['TipoUsuario']))
          {
            if(isset($_GET['DM']) && $_GET['DM']==1)
              {
                echo "<div class='MensModYes'>
                        <table class='TablaMensModYes' border='0' cellpadding='5' cellspacing='5'>
                            <tr>
                                <td>
                                    La contrase&ntilde;a del usuario <strong>".$_SESSION['Nombre']."</strong> ha sido modificada correctamente.<br/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong><span style='color:#FFC000;'>Cierre sesi&oacute;n</span> para que los datos puedan ser actualizados.<strong>
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
            else
                  {
                 // OBTENEMOS LA CONTRASEÑA DEL USUARIO QUE HA HECHO LOGIN
                      $sqlUsuarioPass="select Contrasenia from tblusuario where IdUsuario=".$_SESSION['IDUsuario'];
                      $UserPass=$conexion->query($sqlUsuarioPass);
                      if (!$UserPass)
                        {
                            echo "Error al ejecutar la sql. Error 23<br/>";
                            exit;
                        }

                      // Array que contiene todos los datos del usuario
                      $UsuarioPass=$UserPass->fetch_array(MYSQLI_BOTH);

                        echo "
                                <div class='TitModPass'>Pasos para cambiar la contrase&ntilde;a de <strong>".$_SESSION['Nombre']."</strong>: </div>
                                <table class='TabPassPer' border='0' cellpadding='5' cellspacing='5'>
                                    <form id='formModPass' action='ConfirmaCambioPass.php' method='post' onsubmit='return VerificaForm();'>
                                        <table class='TabModPass' border='0' cellpadding='5' cellspacing='5'>
                                            <tr>
                                              <td>
                                                <label for='idPass'>Introduzca la contrase&ntilde;a actual</label>
                                                <input id='idPass' type='text' name='PassAct' size='20'/>
                                              </td>
                                            </tr>";
                                                if(isset($_GET['ER']) && $_GET['ER']==1)
                                                  {
                                                    echo"<tr><td colspan='2' class='ErrPass'>
                                                            Contrase&ntilde;a actual incorrecta!!
                                                         </td></tr>";
                                                  }
                                                else
                                                  {
                                                    echo "<tr><td style='background-color:#222;'>&nbsp;</td></tr>";
                                                  }
                                            echo"<tr>
                                               <td>
                                                 <label for='idNewPass'>Introduzca la nueva contrase&ntilde;a</label>
                                                 <input id='idNewPass' type='text' name='NewPass' size='20'/>
                                               </td>
                                            </tr>
                                            <tr><td style='background-color:#222;'>&nbsp;</td></tr>
                                            <tr>
                                               <td>
                                                <label for='idReNewPass'> Repita la nueva contrase&ntilde;a</label>
                                                <input id='idReNewPass'type='text' name='ReNewPass' size='20'/>
                                               </td>
                                            </tr>
                                            <tr><td style='background-color:#222;'>&nbsp;</td></tr>
                                            <tr>
                                               <td class='ModifPaswd'colspan='2' style='text-align:center;'>
                                                    <div>Pulse <input class='BotModificar' type='submit' value='aqui'/> para guardar la nueva contrase&ntilde;a</div>
                                               </td>
                                            </tr>
                                        </table>
                                    </form>
                                </table>
                             ";
               }
          }
     }
    else
     {
        header('location:index.php');
     }
?>
