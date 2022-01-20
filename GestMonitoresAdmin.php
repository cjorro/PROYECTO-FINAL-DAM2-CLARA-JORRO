<?php
   // HACEMOS UNA LLAMADA A LA FUNCION QUE HACE LA CONEXION AL SERVIDOR Y A LA BBDD
        include 'ConexionBD.php';

    if ((isset($_SESSION['Valido']) && $_SESSION['Valido']==1)) //SI HA HECHO ALGUIEN LOGIN
      {
         if(isset($_SESSION['TipoUsuario']))
                {
                    echo "<div class='TitGestAdmin'>Elija un monitor para modificar sus datos</div>";
                    //variable que controla el numero de registros visibles en cada pagina
                    $tamanopagina=2;

                    if (isset($_GET['pagina']) && is_numeric($_GET['pagina']))
                      {
                            $pagina=$_GET['pagina'];
                      }
                    else
                      {
                            $pagina=1;   // SERA LA PRIMERA VEZ QUE SE LLAMA
                      }

                    //Calculamos el numero de registros encontrados
                    $sqlNumUsuarios="select count(*) from tblusuario where TipoUsuario=1";
                    $NumUsuarios=$conexion->query($sqlNumUsuarios);
                    $NumUsuariosKategym=$NumUsuarios->fetch_array(MYSQLI_BOTH);


                      if ($NumUsuariosKategym[0]>0)
                          {
                            $totalpaginas=ceil($NumUsuariosKategym[0]/$tamanopagina);  //redondea hacia arriba ceil -techo
                          }
                      else
                          {
                            $totalpaginas=0;

                          }
                      $posicionlectura=($pagina -1)*$tamanopagina;     // el primer registro es el 0 : tiene que empezar en 0,10,20 para $tamanopagina=10


                    //Almacenamos en una variable todos los usuarios del gymnasio
                    $sqlTodosLosUsuarios="select * from tblusuario where TipoUsuario=1 limit $posicionlectura ,$tamanopagina";
                    $TodosLosUsuarios=$conexion->query($sqlTodosLosUsuarios);
                    $NR=($pagina-1)* $tamanopagina;

                    //RECORREMOS TODAS LAS FILAS DEL RESOURCE OBTENIDO
                     if($totalpaginas>=1)
                      {
                         // Muestra todas las coincidencias
                          echo "<table class='TablaMuestraUsuariosGym' border='0' cellpadding='5' cellspacing='5'>
                            <tr>
                                <th>Reg.</th>
                                <th>Nombre</th>
                                <th>Estado</th>
                                <th>Opci&oacute;n</th>
                            </tr>";
                          while($UsuariosKategym=$TodosLosUsuarios->fetch_array(MYSQLI_BOTH))
                            {
                              $NR=$NR+1;
                              echo"<tr>
                                <td>$NR</td>
                                <td>".$UsuariosKategym['Nombre']."</td>";
                                // mostramos activado o desactivado en funcion del estado del usuario
                                    if($UsuariosKategym['Borrado']==0)
                                      {$Borrado='Habilitado';}
                                    else
                                      {$Borrado='Deshabilitado';}
                                echo"<td>$Borrado</td>
                                <td><a href='ModificarMonitoresAdmin.php?Id=".$UsuariosKategym['IdUsuario']."'><button>Modificar</button></a></td>
                              </tr>";
                            }
                          echo"<tr>
                                <td colspan='5'>";
                                //sacamos   link a  siguiente, link a anterior e información de la página en la que está
                                  if ($pagina>1)
                                     {
                                         $nuevapagina=$pagina-1;
                                         echo "<a href='GestionDeMonitoresAdmin.php?pagina=$nuevapagina'><img alt='flechIzq' src='./Imagenes/flecha_izq.gif' border='none'/>  </a> ";
                                     }
                                  if ($pagina< $totalpaginas)
                                     {
                                          $nuevapagina=$pagina+1;
                                          echo "\n<a href='GestionDeMonitoresAdmin.php?pagina=$nuevapagina'><img alt='flechDer' src='./Imagenes/flecha_der.gif' border='none'/></a> ";
                                     }
                                echo"</td>
                              </tr>
                              <tr>
                                <td colspan='5'>
                                   P&aacute;gina <strong>$pagina</strong> de  <strong>$totalpaginas</strong>
                                </td>
                              </tr>
                              <tr>
                                <td colspan='5'>
                                   Hay ".$NumUsuariosKategym[0]." Monitores registrados
                                </td>
                              </tr>";
                                if(isset($_GET['NMOK']) && $_GET['NMOK']==1)
                                {
                                  echo"
                                  <tr>
                                    <td colspan='5' style='background-color:#222;'>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td colspan='5'>
                                           SE ALMACENO CORRECTAMENTE EL NUEVO MONITOR
                                    </td>
                                  </tr>  ";
                                }
                              }
                        echo"</table>";
                      echo "<div class='TitGestAdmin' style='margin:20px auto 0px auto;'>Introducir Nuevo Monitor</div>";
                      echo "<table class='TablaNuevaActividad' border='0' cellpadding='5' cellspacing='5'>
                          <tr>
                            <td>
                                Para a&ntilde;adir un monitor, haga click <a href='NuevoMonitor.php'>aqu&iacute;</a>
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
