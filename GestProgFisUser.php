<?php
   // HACEMOS UNA LLAMADA A LA FUNCION QUE HACE LA CONEXION AL SERVIDOR Y A LA BBDD
        include 'ConexionBD.php';

        // Comprobamos si en la tabla tblactividades hay actividades del usuario o no
        $sqlTablavacia="SELECT COUNT(*) FROM tblactividadesusuario where Borrado=0 and IdUsuario=".$_SESSION['IDUsuario']."";

        $Tablavacia=$conexion->query($sqlTablavacia);
        if(!$Tablavacia)
          {
            echo "No se pudo ejecutar la consulta. Error 80";
            exit;
          }
        $EstaVacia=$Tablavacia->data_seek(0);

    if ((isset($_SESSION['Valido']) && $_SESSION['Valido']==1)) //SI HA HECHO ALGUIEN LOGIN
      {
         if(isset($_SESSION['TipoUsuario']))
                {
                    //si el usuario no esta apuntado a ninguna actividad
                    if($EstaVacia==0)
                     {
                        echo "<div class='MensajeProgActUs'>
                                Para poder ver sus progresos f&iacute;sicos,
                               tiene que estar apuntado a alguna actividad.
                              </div>";
                     }
                    else
                    {
                        //Comprobamos si el usuario tiene tiene progesos físicos o no
                        $sqlTieneProgesosUsuario="select count(*) from tblprogresosfisicos where IdUsuario=".$_SESSION['IDUsuario']."";
                        $TieneProgesosUsuario=$conexion->query($sqlTieneProgesosUsuario);
                        if(!$TieneProgesosUsuario)
                            {
                               echo "Error al ejecutar la sql. Error 99";
                               exit;
                            }
                        $TieneProgresos=$TieneProgesosUsuario->data_seek(0);

                        if($TieneProgresos==0)//si el usuario no tiene progresos fisicos
                          {
                              echo "<div class='MensajeProgActUs'>
                                En estos momentos, sus datos no han sido actualizados.<br>
                                En breve, podr&aacute; acceder al seguimiento de sus progresos f&iacute;sicos.
                              </div>";
                          }
                        else // si el usuario tiene progresos fisicos
                          {

                              echo"
                                <div class='TitActUser'>
                                    Elija una fecha para visualizar los progresos f&iacute;sicos
                                </div>
                                <div>
                                <table class='TableMuestraPG' border='0' cellpadding='5' cellspacing='5'>
                                <tr>
                                    <td>
                                        Fechas para ver su evoluci&oacute;n:
                                    </td>
                                    <form id='formProgFisUs' action='ProgresosFisicosUsuario.php' method='post'  onsubmit='return VerificaFormProgFis()'>
                                        <td>
                                             <select name='FechaProgFisUs' id='FechaPFUs'>
                                                 <option value=''>&lt;Elija Fecha&gt;</option>";
                                                     //almacenamos en un array todos los datos del usuariuo
                                                     $sqlFechProgUsuario="select ID,Fecha from tblprogresosfisicos where IdUsuario=".$_SESSION['IDUsuario']."";
                                                     $FechProgUsuario=$conexion->query($sqlFechProgUsuario);
                                                     if(!$FechProgUsuario)
                                                      {
                                                         echo "Error al ejecutar la sql. Error 100";
                                                         exit;
                                                      }
                                                    while ($FechasUsuario=$FechProgUsuario->fetch_array(MYSQLI_BOTH))
                                                     {
                                                        //para mostrar la fecha en notacion occidental
                                                        $fechaCompt=explode (' ', $FechasUsuario['Fecha']);
                                                        $fech=explode ('-', $fechaCompt[0]);
                                                        $fechaActiv=$fech[2]."/".$fech[1]."/".$fech[0];
                                                        echo"<option value='".$FechasUsuario['ID']."'>$fechaActiv</option>";
                                                     }
                                        echo "</td>
                                        <td>
                                            <input type='submit' value='Mostrar Progresos'/>
                                        </td>
                                     </form>
                                </tr>
                                </table>
                              </div>";

                             // si se ha elegido alguna fecha muestra los progresos fisicos del usuario
                             if(isset($_POST['FechaProgFisUs']))
                              {
                                //Almacenamos en una variable los progresos del usuario en esa fecha y los mostramos
                                $sqlDatosFechaUser="select * from tblprogresosfisicos where IdUsuario=".$_SESSION['IDUsuario']."
                                                    and ID=".$_POST['FechaProgFisUs'];
                                $DatosFechaUser=$conexion->query($sqlDatosFechaUser);
                                if(!$DatosFechaUser)
                                  {
                                     echo "Error al ejecutar la sql. Error 101";
                                     exit;
                                  }
                                //array que contiene todos los datos referentes al progreso del usuario
                                $DatosProgresosUsuarioEnFecha= $DatosFechaUser->fetch_array(MYSQLI_BOTH);

                                //para mostrar la fecha en notacion occidental
                                $fechaCompt=explode (' ', $DatosProgresosUsuarioEnFecha['Fecha']);
                                $fech=explode ('-', $fechaCompt[0]);
                                $fechaActiv=$fech[2]."/".$fech[1]."/".$fech[0];

                                echo "<div class='TitActUser'>
                                        Progresos f&iacute;sicos de <strong>".$_SESSION['Nombre']."</strong> en la fecha <strong>$fechaActiv</strong>
                                </div>

                                <table class='TableMuestraPGUs' border='0' cellpadding='5' cellspacing='5'>
                                     <tr>
                                        <th>&Iacute;NDICE MASA CORPORAL</th>
                                        <td>".$DatosProgresosUsuarioEnFecha['IndiceMasaCorporal']." %</td>
                                     </tr>
                                     <tr>
                                        <th>&Iacute;NDICE    MASA MUSCULAR</th>
                                        <td>".$DatosProgresosUsuarioEnFecha['IndiceMasaMuscular']." %</td>
                                     </tr>
                                     <tr>
                                        <th>ALTURA</th>
                                        <td>".$DatosProgresosUsuarioEnFecha['Altura']." cm</td>
                                     </tr>
                                     <tr>
                                        <th>PESO</th>
                                        <td>".$DatosProgresosUsuarioEnFecha['Peso']." Kg</td>
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
