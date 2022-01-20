<?php
   // HACEMOS UNA LLAMADA A LA FUNCION QUE HACE LA CONEXION AL SERVIDOR Y A LA BBDD
        include 'ConexionBD.php';

         // almacenamos en un array el nombre de todas las actividades
            $sqlNumTotActividades="select * from tblactividades";
            $TotActividades=$conexion->query($sqlNumTotActividades); 
            //comprobamos que se a podido ejecutar la consulta
            if (!$TotActividades)
               {
                    echo "Error al ejecutar la sql.Error 40<br/>";
                    exit;
               }

    if ((isset($_SESSION['Valido']) && $_SESSION['Valido']==1)) //SI HA HECHO ALGUIEN LOGIN
      {
         if(isset($_SESSION['TipoUsuario']))
                {
                     echo "
                     <div class='TitActUser'>Actividades que gestiona el monitor, <strong>".$_SESSION['Nombre']."</strong></div>
                         <table class='TablaActividadesMonitor' border='0' cellpadding='5' cellspacing='5'>
                            <tr>
                                <th>ACTIVIDAD</th><th>N&ordm; USUARIOS</th>
                            </tr>";

                            //El monitor es un usuario mas, y hay que conseguir el IdMonitor de la tabla tblMonitor
                            $sqlConsigueIDMonitor="select IdMonitor from tblmonitor where IdUsuario=".$_SESSION['IDUsuario'];
                            $ConsigueIDMonitor=$conexion->query($sqlConsigueIDMonitor);
                            $ClaveMonitor=$ConsigueIDMonitor->fetch_array(MYSQLI_BOTH);

                            //Mostramos las actividades que dirige el monitor
                             $sqlActivMonitor="select tblactividades.IdActividad,NombreActividad from tblactividades inner join tblactividadesmonitor
                                               on tblactividades.IdActividad=tblactividadesmonitor.IdActividad where IdMonitor=$ClaveMonitor[0]";

                            $ActividadesMonitor=$conexion->query($sqlActivMonitor);
                            if(!$ActividadesMonitor)
                             {
                                echo "Error al ejecutar la consulta. Error 110";
                                exit;
                             }
                            while($TodasActividadesMonitor=$ActividadesMonitor->fetch_array(MYSQLI_BOTH))
                              {
                                //calculamos el numero de apuntados en esa actividad
                                $sqlTotalUsuariosApuntados="select count(*) from tblactividadesusuario inner join tblusuario on
                                                            tblactividadesusuario.IdUsuario=tblusuario.IdUsuario where
                                                            IdActividad=".$TodasActividadesMonitor['IdActividad']." and
                                                            IdMonitor=$ClaveMonitor[0] and tblusuario.Borrado=0 and
                                                            tblusuario.EstadoUsuario=0 and tblactividadesusuario.Borrado=0";
                                $TotalUsuariosApuntados=$conexion->query($sqlTotalUsuariosApuntados);
                                $NumUsuariosApuntados=$TotalUsuariosApuntados->fetch_array(MYSQLI_BOTH);

                                    echo"<tr><td style='padding-left:30px;'>".$TodasActividadesMonitor['NombreActividad']."</td>";
                                    echo"<td style='text-align:center;'>$NumUsuariosApuntados[0]</td>";
                                    echo"<td style='text-align:center;'>";
                                        if ($NumUsuariosApuntados[0] == 0)
                                          { 
                                              echo"<form id='formBorrAct' action='BorraActividad.php' method='post' onsubmit='return VerificaBorrarActividad()'>
                                                  <input style='border:none; font-size:9pt;' type='submit' value='Borrar' name='borrar'>
                                                  <input type='hidden' name='idActividad' value='".$TodasActividadesMonitor['IdActividad']."'/>
                                              </form>";
                                          }
                                        else
                                          {
                                            echo"<form id='formBorrAct' action='BorraActividad.php' method='post' onsubmit='return VerificaBorrarActividadConUsuario()'>
                                                  <input style='border:none; font-size:9pt;' type='submit' value='Borrar' name='borrar'>
                                              <input type='hidden' name='idActividad' value='".$TodasActividadesMonitor['IdActividad']."'/>
                                            </form>";
                                          }
                                          echo"</td></tr>";
                              }
                        echo"</table>";

                        echo "<div class='TitActUser'>A&Ntilde;ADIR UNA ACTIVIDAD</div>
                              <table class='TablaNuevaActividad' border='0' cellpadding='3' cellspacing='5'>
                                <tr>
                                    <td>
                                        Para a&ntilde;adir una actividad, haga click <a href='NuevaActividadMonitor.php'>aqu&iacute;</a>
                                    </td>
                                </tr>
                              </table>";
                }
      }
      else
      {
        header('location:index.php');
      }

?>
