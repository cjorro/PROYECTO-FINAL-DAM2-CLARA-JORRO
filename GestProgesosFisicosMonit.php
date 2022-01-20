    <?php

   // HACEMOS UNA LLAMADA A LA FUNCION QUE HACE LA CONEXION AL SERVIDOR Y A LA BBDD
        include 'ConexionBD.php';

    if ((isset($_SESSION['Valido']) && $_SESSION['Valido']==1)) //SI HA HECHO ALGUIEN LOGIN
      {
         if(isset($_SESSION['TipoUsuario']))
                {
                        // si se ha modificado correctamente los datos de los progresos fisicos del usuario
                        if(isset($_GET['User']) && isset($_GET['Fech']) && isset($_GET['MOD']) && $_GET['MOD']=='OK')
                          {
                              echo "<div class='MensajeModOK'>
                                        Los datos de los progresos f&iacute;sicos referentes al usuario <strong>".$_GET['User']."</strong><br/>
                                        en la fecha <strong>".$_GET['Fech']."</strong> han sido correctamente modificados.<br/><br/>
                                        Pulse <a href='ProgresosFisicosMonitor.php'>aqu&iacute;</a>  para volver a la
                                        p&aacute;gina de Gesti&oacute;n de los Progresos F&iacute;sicos de los Usuarios
                                    </div>";
                              exit;
                          }

                        // si se ha almacenado correctamente los datos de los progresos fisicos del usuario
                        if(isset($_GET['User']) && isset($_GET['ALM']) && $_GET['ALM']=='OK')
                          {
                              echo "<div class='MensajeModOK'>
                                        Los datos de los progresos f&iacute;sicos referentes al usuario <strong>".$_GET['User']."</strong><br/>
                                        han sido correctamente almacenados.<br/><br/>
                                        Pulse <a href='ProgresosFisicosMonitor.php'>aqu&iacute;</a>  para volver a la
                                        p&aacute;gina de Gesti&oacute;n de los Progresos F&iacute;sicos de los Usuarios
                                    </div>";
                              exit;
                          }
                        echo "<div class='TitActUser'>Gesti&oacute;n de los Progresos F&iacute;sicos de los Usuarios</div>";
                        echo"<form name='FormModPGM' action='ProgresosFisicosMonitor.php' method='post'>
                            <table class='TablaIntroUser' border='0' cellpadding='3' cellspacing='5'>
                            <tr>
                                <td>Elija un Usuario</td>";
                                    //El monitor es un usuario mas, y hay que conseguir el IdMonitor de la tabla tblMonitor
                                    $sqlConsigueIDMonitor="select IdMonitor from tblmonitor where IdUsuario=".$_SESSION['IDUsuario'];
                                    $ConsigueIDMonitor=$conexion->query($sqlConsigueIDMonitor);
                                    $ClaveMonitor=$ConsigueIDMonitor->fetch_array(MYSQLI_BOTH);

                                    //Mostramos todos los nombres de los usuarios que estan apuntados a esa actividad
                                    $sqlUsuariosMonitor="select distinct tblactividadesusuario.IdUsuario,Nombre from tblactividadesusuario
                                                         inner join tblusuario on tblactividadesusuario.IdUsuario=tblusuario.IdUsuario
                                                         where IdMonitor=$ClaveMonitor[0] and tblusuario.Borrado=0
                                                         and tblusuario.EstadoUsuario=0 and tblactividadesusuario.Borrado=0";
                                    $UsuariosMonitor=$conexion->query($sqlUsuariosMonitor);
                                    if(!$UsuariosMonitor)
                                     {
                                        echo "Error al ejecutar la consulta. Error 111";
                                     }

                                echo "<td>
                                    <select name='UsuariosMonit' id='UsuariosMonit'>
                                        <option value=''>&lt;Elija un Usuario&gt;</option>";
                                        while($TodosUsuariosMonitor=$UsuariosMonitor->fetch_array(MYSQLI_BOTH))
                                          {
                                            echo"<option value='".$TodosUsuariosMonitor['IdUsuario']."'>".$TodosUsuariosMonitor['Nombre']."</option>\n";
                                          }
                                    echo "</select>
                                    <input type='hidden' name='Accion' value=''>
                                </td>
                            </tr>
                            <tr>
                                <td colspan='2'>Opci&oacute;n a realizar</td>
                            </tr>
                            <tr>
                                <td><input type='button' id='idMD' value='Modificar Progreso' onclick='ModificaProgresos()'/></td>
                                <td><input type='button' id='idIN' value='Nuevo Progreso' onclick='IngresaNuevoProgreso()'/></td>
                            </tr>
                        </table>";
                            //Mensaje que se muestra si el usuario no tiene apuntados ningun usuario en sus actividades
                            //calculamos el numero de apuntados en esa actividad
                            $sqlTotalUsuariosApuntados="select count(*) from tblactividadesusuario where
                                                        IdMonitor=$ClaveMonitor[0] and Borrado=0";
                            $TotalUsuariosApuntados=$conexion->query($sqlTotalUsuariosApuntados);
                            $NumUsuariosApuntados=$TotalUsuariosApuntados->fetch_array(MYSQLI_BOTH);

                            if($NumUsuariosApuntados[0]==0)
                              {
                                  // desabilitamos las opciones del los botones y la select
                                  echo "<script type='text/javascript'>
                                          document.FormModPGM.UsuariosMonit.disabled=true;
                                          document.getElementById('idMD').disabled=true;
                                          document.getElementById('idIN').disabled=true;
                                        </script>";

                                  echo "<table class='TableErrorMDPG' border='0' cellpadding='5' cellspacing='5'>
                                      <tr>
                                        <td style='color:#F33;'>
                                            NO HAY USUARIOS APUNTADOS EN SUS ACTIVIDADES.
                                            NO PUEDE GESTIONAR PROGRESOS F&Iacute;SICOS
                                        </td>
                                      </tr>
                                    </table>";
                              }
                      echo"</form>";

                      // para que aparezca el formulario en el que hay que introducir la fecha de los datos de los progresos fisicos del usuario
                      if(isset($_POST['Accion']) && isset($_POST['UsuariosMonit']) && !isset($_POST['FechaProgFisUser']))
                        {
                              //Conseguimos el nombre del usuario
                              $sqlNombreUser="select Nombre from tblusuario where IdUsuario=".$_POST['UsuariosMonit'];
                              $NombreUser=$conexion->query($sqlNombreUser);
                              $Usuario=$NombreUser->fetch_array(MYSQLI_BOTH);

                              //se ejecuta cuando la opcion elegida es la de modificar progresos
                                if(isset($_POST['Accion']) && $_POST['Accion']=='M')
                                  {
                                      // hay que comprobar si el usario elegido por el monitor tiene ya almacenados progresos fisicos
                                      $sqlTieneProgresosUser="select count(*) from tblprogresosfisicos where IdUsuario=".$_POST['UsuariosMonit'];
                                      $TieneProgesosUser=$conexion->query($sqlTieneProgresosUser);
                                      if(!$TieneProgesosUser)
                                        {
                                           echo "Error al ejecutar la sql. Error 119";
                                           exit;
                                        }
                                      $NumProgresosUsuario=$TieneProgesosUser->fetch_array(MYSQLI_BOTH);

                                      // si no tiene almacenados progresos Fisicos
                                      if($NumProgresosUsuario[0]==0)
                                       {
                                          echo "<table class='TableErrorMDPG' border='0' cellpadding='5' cellspacing='5'>
                                                  <tr>
                                                    <td>
                                                        El usuario <strong>$Usuario[0]</strong> no tiene Progresos Fisicos Almacenados.<br/>
                                                        Tiene que elegir la opcion de &lt;Nuevo Progreso&gt;
                                                    </td>
                                                  </tr>
                                              </table>";
                                       }
                                      else
                                       {
                                          // desabilitamos las opciones del los botones y la select
                                          echo "<script type='text/javascript'>
                                                  document.FormModPGM.UsuariosMonit.disabled=true;
                                                  document.getElementById('idMD').disabled=true;
                                                  document.getElementById('idIN').disabled=true;
                                                </script>";

                                          echo "<div class='TitActUser' style='margin-top:20px;'>Modificar los datos del usuario <strong>$Usuario[0]<strong></div>";
                                          echo "<table class='TablaIntroUser' border='0' cellpadding='5' cellspacing='5'>
                                              <tr>
                                                <td>Elija una fecha</td>
                                                <form name='FormFechUsu' action='ProgresosFisicosMonitor.php' method='post'>
                                                    <td>
                                                     <select name='FechaProgFisUser' id='FechaPFUser'>
                                                         <option value=''>&lt;Elija Fecha&gt;</option>";
                                                             //almacenamos en un array todos los datos del usuariuo
                                                             $sqlFechProgUsuario="select ID,Fecha from tblprogresosfisicos where IdUsuario=".$_POST['UsuariosMonit'];
                                                             $FechProgUsuario=$conexion->query($sqlFechProgUsuario);
                                                             if(!$FechProgUsuario)
                                                              {
                                                                 echo "Error al ejecutar la sql. Error 120";
                                                                 exit;
                                                              }
                                                            while ($FechasUsuario=$FechProgUsuario->fetch_array(MYSQLI_BOTH))
                                                             {
                                                                //para mostrar la fecha en notacion occidental
                                                                $fechaCompt=explode (' ', $FechasUsuario['Fecha']);
                                                                $fech=explode ('-', $fechaCompt[0]);
                                                                $fechaActiv=$fech[2]."/".$fech[1]."/".$fech[0];
                                                                echo"<option value='".$FechasUsuario['Fecha']."'>$fechaActiv</option>";
                                                             }
                                                    echo "</td>
                                              </tr>
                                              <tr>
                                                <td colspan='2'>
                                                    Opci&oacute;n a realizar
                                                </td>
                                              </tr>
                                              <tr>
                                                    <td>
                                                        <input type='hidden' name='Accion' value='M' />
                                                        <input type='hidden' name='UsuariosMonit' value='".$_POST['UsuariosMonit']."'/>
                                                        <input type='hidden' name='ToDO' value=''/>
                                                        <input type='button' id='idMod' value='Modificar Progresos' onclick='ModProgresos()'/>
                                                    </td>
                                                    <td>
                                                        <input type='button' id='idDel' value='Borrar Progreso' onclick='DeleteProgreso()'/>
                                                    </td>
                                              </tr>
                                              <tr>
                                                <td colspan='3'>
                                                    <a href='ProgresosFisicosMonitor.php' onclick='return ConfirmaCancelar()'><button>Cancelar Operaci&oacute;n</button></a>
                                                </td>
                                              </tr>
                                            </form>
                                          </table>";
                                       }
                                  }
                                else
                                  {
                                      //se ejecuta cuando la opcion elegida es la crear nuevos progresos
                                      if(isset($_POST['Accion']) && $_POST['Accion']=='I')
                                      {
                                           //comprobamos si el usuario tiene registros en la tabla tblprogresosfisicos
                                          $sqlTieneProgresosUser="select count(*) from tblprogresosfisicos where IdUsuario=".$_POST['UsuariosMonit'];
                                          $TieneProgesosUser=$conexion->query($sqlTieneProgresosUser);
                                          if(!$TieneProgesosUser)
                                            {
                                               echo "Error al ejecutar la sql. Error 139";
                                               exit;
                                            }
                                          $NumProgresosUsuario=$TieneProgesosUser->fetch_array(MYSQLI_BOTH);

                                          //si tiene registros
                                          if($NumProgresosUsuario[0]!=0)
                                           {
                                                  //comprobamos que no hay ningun registro con la fecha de hoy, para evitar duplicacion del registro fecha
                                                  //calculamos la fecha de hoy
                                                  $sqlFechaActual="select NOW()";
                                                  $FechaActual=$conexion->query($sqlFechaActual);
                                                  $FechaAhora=$FechaActual->fetch_array(MYSQLI_BOTH);
                                                    //para mostrar la fecha en notacion occidental
                                                    $fechaComptAhora=explode (' ', $FechaAhora[0]);
                                                    $fechAhora=explode ('-', $fechaComptAhora[0]);
                                                    $DateNOw=$fechAhora[2]."/".$fechAhora[1]."/".$fechAhora[0];

                                                  //calculamos la fecha del progreso del usuario seleccionado
                                                  $sqlFechaUserPG="select Fecha from tblprogresosfisicos where IdUsuario=".$_POST['UsuariosMonit']." order by Fecha desc limit 1";
                                                  $FechaUserPG=$conexion->query($sqlFechaUserPG);
                                                  $FechaUsPG=$FechaUserPG->fetch_array(MYSQLI_BOTH);
                                                    //para mostrar la fecha en notacion occidental
                                                    $fechaCompt=explode (' ', $FechaUsPG[0]);
                                                    $fech=explode ('-', $fechaCompt[0]);
                                                    $fechaActiv=$fech[2]."/".$fech[1]."/".$fech[0];
                   
                                                  //si las fechas son iguales, no se puede guardar un nuevo registro
                                                  if($DateNOw==$fechaActiv)
                                                    {
                                                      echo "<table class='TableErrorMDPG' border='0' cellpadding='5' cellspacing='5'>
                                                          <tr>
                                                            <td>
                                                                El usuario <strong>$Usuario[0]</strong> ya tiene almacenado el registro de progresos
                                                                f&iacute;sicos para la fecha de hoy, <span style='font-weight:bold;'>$DateNOw</span>.<br/>
                                                                Solo puede existir un registro por d&iacute;a.
                                                            </td>
                                                          </tr>
                                                      </table>";
                                                      exit;
                                                    }
                                           }

                                          // desabilitamos las opciones del los botones y la select
                                          echo "<script type='text/javascript'>
                                            document.FormModPGM.UsuariosMonit.disabled=true;
                                            document.getElementById('idMD').disabled=true;
                                            document.getElementById('idIN').disabled=true;
                                          </script>";

                                          //Conseguimos el nombre del usuario
                                          $sqlNombreUser="select Nombre from tblusuario where IdUsuario=".$_POST['UsuariosMonit'];
                                          $NombreUser=$conexion->query($sqlNombreUser);
                                          $Usuario=$NombreUser->fetch_array(MYSQLI_BOTH);

                                          echo "<div class='TitActUser' style='margin-top:20px;'>Almacenar nuevo Progreso F&iacute;sico
                                          para el usuario <strong>$Usuario[0]<strong></div>
                                          <form id='FNuevoPG' name='formNuevoProgFisMonit' action='GuardaNuevofProgFisMonit.php' method='post'>
                                              <table class='TablaIntroUser' border='0' cellpadding='5' cellspacing='5'>
                                                     <tr>
                                                        <th>&Iacute;NDICE MASA CORPORAL</th>
                                                        <td><input type='text' name='MasaCorporal' size='5'/></td>
                                                        <td>%</td>
                                                     </tr>
                                                     <tr>
                                                        <th>&Iacute;NDICE MASA MUSCULAR</th>
                                                        <td><input type='text' name='MasaMuscular' size='5'/></td>
                                                        <td>%</td>
                                                     </tr>
                                                     <tr>
                                                        <th>ALTURA</th>
                                                        <td><input type='text' name='Altura' size='5'/></td>
                                                        <td>cm</td>
                                                     </tr>
                                                     <tr>
                                                        <th>PESO</th>
                                                        <td><input type='text' name='Peso' size='5'/></td>
                                                        <td>Kg</td>
                                                     </tr>
                                                  <tr>
                                                    <td colspan='3'>
                                                        <input type='submit' value='Almacenar Datos' onclick='return VerificaNewPGMonit()'/>
                                                    </td>
                                                  </tr>
                                                  <tr>
                                                    <td colspan='3'>
                                                        <a href='ProgresosFisicosMonitor.php' onclick='return ConfirmaCancelar()'><button>Cancelar Operaci&oacute;n</button></a>
                                                    </td>
                                                  </tr>
                                              </table>
                                              <input type='hidden' name='IDUser' value='".$_POST['UsuariosMonit']."'/>
                                          </form>";
                                      }
                                  }
                        }

                      // formulario que aparece una vez introducida la fecha de los datos del progreso físico a modificar
                      if(isset($_POST['Accion']) && isset($_POST['UsuariosMonit']) && isset($_POST['FechaProgFisUser']) && isset($_POST['ToDO']))
                        {
                          //si la opcion es modificar
                          if(isset($_POST['ToDO']) && $_POST['ToDO']=='Mod')
                            {
                                // desabilitamos las opciones del los botones y la select
                                echo "<script type='text/javascript'>
                                  document.FormModPGM.UsuariosMonit.disabled=true;
                                  document.getElementById('idMD').disabled=true;
                                  document.getElementById('idIN').disabled=true;
                                </script>";

                                //Conseguimos el nombre del usuario
                                $sqlNombreUser="select Nombre from tblusuario where IdUsuario=".$_POST['UsuariosMonit'];
                                $NombreUser=$conexion->query($sqlNombreUser);
                                $Usuario=$NombreUser->fetch_array(MYSQLI_BOTH);

                                //Almacenamos en una variable los progresos del usuario en esa fecha y los mostramos
                                $sqlDatosFechaUser="select * from tblprogresosfisicos where IdUsuario=".$_POST['UsuariosMonit']."
                                                and Fecha='".$_POST['FechaProgFisUser']."'";
                                $DatosFechaUser=$conexion->query($sqlDatosFechaUser);
                                if(!$DatosFechaUser)
                                  {
                                    echo "Error al ejecutar la sql. Error 121";
                                    exit;
                                  }
                                //array que contiene todos los datos referentes al progreso del usuario
                                $DatosProgresosUsuarioEnFecha=  $DatosFechaUser->fetch_array(MYSQLI_BOTH);

                                //para mostrar la fecha en notacion occidental
                                $fechaCompt=explode (' ', $DatosProgresosUsuarioEnFecha['Fecha']);
                                $fech=explode ('-', $fechaCompt[0]);
                                $fechaActiv=$fech[2]."/".$fech[1]."/".$fech[0];

                                  echo "<div class='TitActUser' style='margin-top:20px;'>Modificar los datos del
                                  usuario <strong>$Usuario[0]<strong> en la fecha <strong>$fechaActiv</strong></div>
                                  <form id='formModPG' name='formModifProgFisMonit' action='GuardaModifProgFisMonit.php' method='post'>
                                      <table class='TablaIntroUser' border='0' cellpadding='5' cellspacing='5'>
                                             <tr>
                                                <th>&Iacute;NDICE MASA CORPORAL</th>
                                                <td><input type='text' name='MasaCorporal' value='".$DatosProgresosUsuarioEnFecha['IndiceMasaCorporal']."' size='5'/></td>
                                                <td>%</td>
                                             </tr>
                                             <tr>
                                                <th>&Iacute;NDICE MASA MUSCULAR</th>
                                                <td><input type='text' name='MasaMuscular' value='".$DatosProgresosUsuarioEnFecha['IndiceMasaMuscular']."' size='5'/></td>
                                                <td>%</td>
                                             </tr>
                                             <tr>
                                                <th>ALTURA</th>
                                                <td><input type='text' name='Altura' value='".$DatosProgresosUsuarioEnFecha['Altura']."' size='5'/></td>
                                                <td>cm</td>
                                             </tr>
                                             <tr>
                                                <th>PESO</th>
                                                <td><input type='text' name='Peso' value='".$DatosProgresosUsuarioEnFecha['Peso']."' size='5'/></td>
                                                <td>Kg</td>
                                             </tr>
                                          <tr>
                                            <td colspan='3'>
                                                <input type='submit' value='Guardar Datos'  onclick='return VerificaModPGMonit()'/>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td colspan='3'>
                                                <a href='ProgresosFisicosMonitor.php' onclick='return ConfirmaCancelar()'><button>Cancelar Operaci&oacute;n</button></a>
                                            </td>
                                          </tr>
                                      </table>
                                      <input type='hidden' name='IDUser' value='".$_POST['UsuariosMonit']."'/>
                                      <input type='hidden' name='Fecha' value='".$DatosProgresosUsuarioEnFecha['Fecha']."'/>
                                  </form>";
                            }

                          //si la opcion elegida es borrar
                          if(isset($_POST['ToDO']) && $_POST['ToDO']=='Del')
                            {
                                //se borra el registro que ha seleccionado el monitor
                                $sqlBorraPG="delete from tblprogresosfisicos where IdUsuario=".$_POST['UsuariosMonit']." and Fecha='".$_POST['FechaProgFisUser']."'";
                                $BorraPG=$conexion->query($sqlBorraPG);
                                if(!$BorraPG)
                                  {
                                    echo "No se puedo borrar el registro seleccionado. Error 140";
                                    exit;
                                  }
                                else
                                  {
                                    //Conseguimos el nombre del usuario
                                    $sqlNombreUser="select Nombre from tblusuario where IdUsuario=".$_POST['UsuariosMonit'];
                                    $NombreUser=$conexion->query($sqlNombreUser);
                                    $Usuario=$NombreUser->fetch_array(MYSQLI_BOTH);

                                    //para mostrar la fecha en notacion occidental
                                    $fechaCompt=explode (' ', $_POST['FechaProgFisUser']);
                                    $fech=explode ('-', $fechaCompt[0]);
                                    $fechaActiv=$fech[2]."/".$fech[1]."/".$fech[0];

                                    echo "<table class='TableErrorMDPG' border='0' cellpadding='5' cellspacing='5'>
                                      <tr>
                                        <td>
                                            Ha sido correctamente eliminado el registro del<br/> progreso f&iacute;sico del usuario 
                                            <strong>$Usuario[0]</strong><br/> correspondiente a la fecha
                                            <span style='font-weight:bold'>$fechaActiv</span>.
                                        </td>
                                      </tr>
                                    </table>";
                                  }
                            }
                        }
                }
      }
    else
      {
        header('location:index.php');
      }
?>
