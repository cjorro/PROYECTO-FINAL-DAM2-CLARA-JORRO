<?php

   // HACEMOS UNA LLAMADA A LA FUNCION QUE HACE LA CONEXION AL SERVIDOR Y A LA BBDD
        include 'ConexionBD.php';

         // almacenamos en un array el nombre de todas las actividades
            $sqlNumTotActividades="select * from tblactividades";
            $TotActividades=$conexion->query($sqlNumTotActividades); // mysql_querry ejecuta la sql
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
                     <div class='TitActUser'>Apuntarse a una Actividad </div>
                     <form id='formActiv' method='post' action='AlmacenaAcividadUsuario.php' onsubmit='return ValidaFormAct();'>
                         <table class='TabActUser' border='0' cellpadding='2' cellspacing='5' style='text-align:center;'>
                            <tr>
                              <td class='elijeActiv'>Elija la acitividad a la que quiere apuntarse </td>
                              <td rowspan='2'>
                                <input type='submit' value='Apuntarse'/>
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <select id='idActividad' name='Actividad'>
                                    <option value=''>&lt;Elija una actividad&gt;</option>";
                                      $i=0;
                                      while($NombreAct=$TotActividades->fetch_array(MYSQLI_BOTH)) //array que contiene las opciones de la encuesta seleccionada
                                       {
                                         echo "<option value='".$NombreAct['IdActividad']."'>".$NombreAct['NombreActividad']."</option>\n";
                                         $i+=1;
                                       }
                              echo "</select>
                              </td>
                              </tr>";
                              if(isset($_GET['ER']) && $_GET['ER']==1 )
                               {
                                  echo "<td colspan='2' style='background-color:#222; color:#FF3333; font-size:12pt;'>
                                    YA EST&Aacute;S APUNTADO EN ESA ACTIVIDAD
                                  </td>";
                               }
                              else
                               {
                                  echo "<td colspan='2' style='background-color:#222;'>&nbsp; </td>";
                               }
                         echo"</table>
                    </form>";

                    // Comprobamos si en la tabla tblactividades hay actividades del usuario o no
                    $sqlTablavacia="SELECT COUNT(*) FROM tblactividadesusuario where Borrado=0 and IdUsuario=".$_SESSION['IDUsuario']."";

                    $Tablavacia=$conexion->query($sqlTablavacia);
                    if(!$Tablavacia)
                      {
                        echo "No se pudo ejecutar la consulta. Error 80";
                        exit;
                      }
                    $EstaVacia=$Tablavacia->data_seek(0);

                    echo "<div class='TitActUser'>Actividades a las que est&aacute;s apuntado, <strong>".$_SESSION['Nombre']."</strong> </div>
                    <table class='TabActApUser' border='0' cellpadding='1' cellspacing='5' style='text-align:center;'>";
                       if($EstaVacia==0)
                         {
                           echo"<tr><td>NO EST&Aacute; APUNTADO A NINGUNA ACTIVIDAD</td></tr>";
                         }
                       else
                         {
                            echo"<tr style='background-color:#333;color:#FFC033;font-style:italic;font-size:11pt;'><th>ACTIVIDAD</th><th>MONITOR/A</th><th>SALA</th><th>FECHA ALTA</th></tr>";
                            //Almacenamos en un array todas las actividades a las que esta apuntado el usuario
                            $sqlActUsuario="select tblactividadesusuario.IdActividad,NombreActividad,tblactividadesusuario.IdMonitor,Sala,FechaInicio from tblactividadesusuario
                                            inner join tblactividades on tblactividadesusuario.IdActividad=tblactividades.IdActividad
                                            inner join tblactividadesmonitor on tblactividadesusuario.IdActividad=tblactividadesmonitor.IdActividad
                                            where IdUsuario=".$_SESSION['IDUsuario']." and Borrado=0 order by FechaInicio";
                            $ActUsuario=$conexion->query($sqlActUsuario);
                            if(!$ActUsuario)
                               {
                                echo "Error al ejecutar la sql. Error 81<br/>";
                                exit;
                              }

                            while($ActividadesUsuario=$ActUsuario->fetch_array(MYSQLI_BOTH))
                            {
                                echo"<tr>
                                        <td style='text-align:left; padding:0px 0px 0px 20px;'>".$ActividadesUsuario['NombreActividad']."</td>";
                                      
                                            //calculamos el nombre del monitor
                                              $sqlNomMonitor="select Nombre from tblmonitor inner join tblusuario
                                                              on tblmonitor.IdUsuario=tblusuario.IdUsuario where
                                                              IdMonitor=".$ActividadesUsuario['IdMonitor']."";
                                              $NombreMonitor=$conexion->query($sqlNomMonitor);
                                              $MonitorAct=$NombreMonitor->fetch_array(MYSQLI_BOTH);
                                        echo"<td>$MonitorAct[0]</td>
                                        <td>".$ActividadesUsuario['Sala']."</td>";
                                            //para mostrar la fecha en notacion occidental
                                            $fechaCompleta=explode (' ', $ActividadesUsuario['FechaInicio']);
                                            $fech=explode ('-', $fechaCompleta[0]);
                                            $fechNacimiento=$fech[2]."/".$fech[1]."/".$fech[0];
                                        echo"<td>$fechNacimiento</td>
                                        <td>
                                            <form id='formBorrAct' action='BorraActividadUsuario.php' method='post' onsubmit='return VerificaBorrar()'>
                                                <input style='border:none; font-size:9pt;' type='submit' value='Darse de Baja' name='borrar'>
                                                <input type='hidden' name='idActividad' value='".$ActividadesUsuario['IdActividad']."'/>
                                            </form>
                                            
                                        </td>
                                    </tr>";
                            }
                         }
                    echo "</table>";

                }
      }
    else
      {
        header('location:index.php');
      }
?>