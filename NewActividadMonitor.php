<?php
   // HACEMOS UNA LLAMADA A LA FUNCION QUE HACE LA CONEXION AL SERVIDOR Y A LA BBDD
        include 'ConexionBD.php';
        // Para forzar la codificacion de Caracteres

    if ((isset($_SESSION['Valido']) && $_SESSION['Valido']==1)) //SI HA HECHO ALGUIEN LOGIN
      {
         if(isset($_SESSION['TipoUsuario']))
                {
                  if(isset($_GET['Act']) && isset($_GET['ALM']) && $_GET['ALM']=='OK')
                  {
                      echo "<div class='MensajeModOK'>
                                Los datos referentes a la nueva actividad <strong>".$_GET['Act']."</strong><br/>
                                han sido correctamente almacenados.<br/><br/>
                                Pulse <a href='ActividadesMonitor.php'>aqu&iacute;</a>  para volver a la
                                p&aacute;gina de Gesti&oacute;n de  Actividades,
                            </div>";
                      exit;
                  }

                  if(isset($_POST['Error']) && $_POST['Error']==1)
                     {
                        if(isset($_POST['NomAct']) && isset($_POST['TipoAct']) &&
                            isset($_POST['NumSala']) && isset($_POST['DescAct']))
                        {
                          echo "<div class='TitActUser'>A&Ntilde;ADIR UNA ACTIVIDAD</div>
                            <form id='formulario' action='GuardaNuevaActividad.php' method='post' enctype='multipart/form-data'>
                              <table class='TablaNuevaActiv' border='0' cellpadding='3' cellspacing='5'>
                                <tr>
                                    <td>Nombre de la Actividad</td>
                                    <td><input type='text' name='NombreActividad' value='".$_POST['NomAct']."'/></td>
                                </tr>
                                <tr>
                                    <td>Tipo de Actividad</td>
                                    <td>
                                        <select name='NewActividad' id='NuevaActividad'>
                                            <option value=''>&lt;Elija un Tipo&gt;</option>";
                                                //almacenamos en un array los tipos de actividad
                                                $sqlTipoActividad="select * from tbltipoactividad";
                                                $TipoActividad=$conexion->query($sqlTipoActividad);
                                                while($TodosTiposActividad=$TipoActividad->fetch_array(MYSQLI_BOTH))
                                                {
                                                    echo "<option value='".$TodosTiposActividad['IdTipoActividad']."'>".$TodosTiposActividad['TipoActividad']."</option>\n";
                                                }
                                        echo"</select>
                                        <script languaje='javascript' type='text/javascript'>
                                            document.getElementById('formulario').NewActividad.value=".$_POST['TipoAct'].";
                                        </script>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Sala</td>
                                    <td>
                                        <select name='Sala' id='Sal'>
                                            <option value=''>&lt;Num. Sala&gt;</option>";
                                                //almacenamos en un array los numeros de las salas
                                                $sqlSalas="select Sala from tblactividades order by Sala asc";
                                                $Salas=$conexion->query($sqlSalas);
                                                while($TodasSalas=$Salas->fetch_array(MYSQLI_BOTH))
                                                {
                                                    echo "<option value='".$TodasSalas['Sala']."'>".$TodasSalas['Sala']."</option>\n";
                                                }
                                        echo"</select>
                                        <script languaje='javascript' type='text/javascript'>
                                            document.getElementById('formulario').Sala.value=".$_POST['NumSala'].";
                                        </script>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan='2'>Descripci&oacute;n de la  Actividad</td>
                                </tr>
                                <tr>
                                    <td colspan='2'><textarea name='Descripcion' style='width:520px;'>".$_POST['DescAct']."</textarea> </td>
                                </tr>
                                <tr>
                                    <td>
                                        Subir imagen Actividad
                                    </td>
                                    <td>
                                        <input type='file' name='FotoActividad'/>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan='2'>
                                        <input type='submit' value='Almacenar Actividad' onclick='return CompruebaCamposForm()'/>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan='2'>
                                        <a href='ActividadesMonitor.php' onclick='return ConfirmaCancelar()'><button>Cancelar Operaci&oacute;n</button></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan='2' style='background-color:#222;'>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan='2' style='color:#F44;'>
                                        NO SE ADMITEN FOTOS CON ESA EXTENSI&Oacute;N
                                    </td>
                                </tr>
                              </table>
                             </form>";
                          }
                     }
                    else
                     {
                        echo "<div class='TitActUser'>A&Ntilde;ADIR UNA ACTIVIDAD</div>
                            <form id='formulario' action='GuardaNuevaActividad.php' method='post' enctype='multipart/form-data'>
                              <table class='TablaNuevaActiv' border='0' cellpadding='3' cellspacing='5'>
                                <tr>
                                    <td>Nombre de la Actividad</td>
                                    <td><input type='text' name='NombreActividad'/></td>
                                </tr>
                                <tr>
                                    <td>Tipo de Actividad</td>
                                    <td>
                                        <select name='NewActividad' id='NuevaActividad'>
                                            <option value=''>&lt;Elija un Tipo&gt;</option>";
                                                //almacenamos en un array los tipos de actividad
                                                $sqlTipoActividad="select * from tbltipoactividad";
                                                $TipoActividad=$conexion->query($sqlTipoActividad);
                                                while($TodosTiposActividad=$TipoActividad->fetch_array(MYSQLI_BOTH))
                                                {
                                                    echo "<option value='".$TodosTiposActividad['IdTipoActividad']."'>".$TodosTiposActividad['TipoActividad']."</option>\n";
                                                }
                                        echo"</select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Sala</td>
                                    <td>
                                        <select name='Sala' id='Sal'>
                                            <option value=''>&lt;Num. Sala&gt;</option>";
                                                //almacenamos en un array los numeros de las salas
                                                $sqlSalas="select Sala from tblactividades order by Sala asc";
                                                $Salas=$conexion->query($sqlSalas);
                                                while($TodasSalas=$Salas->fetch_array(MYSQLI_BOTH))
                                                {
                                                    echo "<option value='".$TodasSalas['Sala']."'>".$TodasSalas['Sala']."</option>\n";
                                                }
                                        echo"</select>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan='2'>Descripci&oacute;n de la  Actividad</td>
                                </tr>
                                <tr>
                                    <td colspan='2'><textarea name='Descripcion' style='width:520px;'></textarea> </td>
                                </tr>
                                <tr>
                                    <td>
                                        Subir imagen Actividad
                                    </td>
                                    <td>
                                        <input type='file' name='FotoActividad'/>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan='2'>
                                        <input type='submit' value='Almacenar Actividad' onclick='return CompruebaCamposForm()'/>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan='2'>
                                        <a href='ActividadesMonitor.php' onclick='return ConfirmaCancelar()'><button>Cancelar Operaci&oacute;n</button></a>
                                    </td>
                                </tr>
                              </table>
                         </form>";
                     }
                }
      }
      else
      {
        header('location:index.php');
      }

?>