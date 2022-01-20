<?php
   // HACEMOS UNA LLAMADA A LA FUNCION QUE HACE LA CONEXION AL SERVIDOR Y A LA BBDD
        include 'ConexionBD.php';

    if ((isset($_SESSION['Valido']) && $_SESSION['Valido']==1)) //SI HA HECHO ALGUIEN LOGIN
      {
         if(isset($_SESSION['TipoUsuario']))
                {
                    echo "<div class='TitGestAdmin'>Ver y Votar Comentarios</div>";
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
                    $sqlNumComentarios="select count(*) from tblexcomentarios";
                    $NumComentarios=$conexion->query($sqlNumComentarios,);
                    $NumComentariosKategym=$NumComentarios->fetch_array(MYSQLI_BOTH);


                      if ($NumComentariosKategym[0]>0)
                          {
                            $totalpaginas=ceil($NumComentariosKategym[0]/$tamanopagina);  //redondea hacia arriba ceil -techo
                          }
                      else
                          {
                            $totalpaginas=0;

                          }
                      $posicionlectura=($pagina -1)*$tamanopagina;     // el primer registro es el 0 : tiene que empezar en 0,10,20 para $tamanopagina=10


                    //Almacenamos en una variable todos los usuarios del gymnasio
                    $sqlTodosLosComentarios="select * from tblexcomentarios limit $posicionlectura ,$tamanopagina";
                    $TodosLosComentarios=$conexion->query($sqlTodosLosComentarios);
                    $NR=($pagina-1)* $tamanopagina;

                    //RECORREMOS TODAS LAS FILAS DEL RESOURCE OBTENIDO
                     if($totalpaginas>=1)
                      {
                         // Muestra todas las coincidencias
                          while($ComentariosKategym=$TodosLosComentarios->fetch_array(MYSQLI_BOTH))
                            {
                                    //calculamos el nombre del usuario que ha escrito el comentario
                                    $sqlCogeNombre="select Nombre from tblusuario where IdUsuario=".$ComentariosKategym['IdUsuario']."";
                                    $CogeNombre=$conexion->query($sqlCogeNombre);
                                    if(!$CogeNombre)
                                    {
                                        echo "Error al ejecutar la sql. Error 2000";
                                        exit;
                                    }
                                    $NombreUsuario=$CogeNombre->fetch_array(MYSQLI_BOTH);
                                    $NomUsuario=$NombreUsuario[0];

                                    // Para visualizar la fecha de creacion en dd/mm/aaaa
                                    $TimeCreacion=explode (' ', $ComentariosKategym['Fecha']);
                                    $fech=explode ('-', $TimeCreacion[0]);
                                    $fechCreacion=$fech[2]."/".$fech[1]."/".$fech[0];
                               echo "<table class='TablaMuestraUsuariosGym' border='0' cellpadding='3' cellspacing='3'>
                                    <tr>
                                        <td>Autor: $NomUsuario</td>
                                        <td>Fecha: $fechCreacion</td>

                                        <td>
                                            Valoraci&oacute;n:";

                                                if($ComentariosKategym['IdUsuario']!=$_SESSION['IDUsuario'])// el usuario no puede votar su propio comentario
                                                  {
                                                    //comprobamos que no hay ningun registro de este usuario en la tabla tblexComentarioRealizado
                                                    $sqlHaVotadoUsuario="select count(*) from tblexComentarioRealizado where IdUsuario=".$_SESSION['IDUsuario']." and IdComentario=".$ComentariosKategym['Id']."";
                                                    $HaVotadoUsuario=$conexion->query($sqlHaVotadoUsuario);
                                                    if(!$HaVotadoUsuario)
                                                       {
                                                            echo "Error al ejecutar la sql. Error 123000";
                                                            exit;
                                                       }
                                                    $VotoUser=$HaVotadoUsuario->fetch_array(MYSQLI_BOTH);
                                                    if($VotoUser[0]==0)
                                                    {
                                                      echo"<a href='exGuardaVoto.php?Voto=POS&IdEncuesta=".$ComentariosKategym['Id']."&pagina=$pagina'><img alt='POS' src='./Imagenes/si.gif' border='none'/></a>
                                                      <a href='exGuardaVoto.php?Voto=NEG&IdEncuesta=".$ComentariosKategym['Id']."&pagina=$pagina'><img alt='NEG' src='./Imagenes/no.gif' border='none' style='width:20px;'/></a>";
                                                    }
                                                  }
                                            //Calculamos la diferencia de votos
                                            $diferencia=$ComentariosKategym['VotPositivos']-$ComentariosKategym['VotNegativos'];
                                            echo"<input type='text' name='puntuacion' value='$diferencia' style='width:15px; text-align:center; margin:0px 5px;'/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan='3'>T&iacute;tulo: ".$ComentariosKategym['Titulo']."</td>
                                    </tr>   
                                    <tr>
                                        <td colspan='3'>".$ComentariosKategym['Comentario']."</td>
                                    </tr>  
                              </table>";
                            }
                          echo "<table class='TablaMuestraUsuariosGym' border='0' cellpadding='5' cellspacing='5'>
                              <tr>
                                <td colspan='4'>";
                                //sacamos link a siguiente, link a anterior e información de la página en la que está
                                  if ($pagina>1)
                                     {
                                         $nuevapagina=$pagina-1;
                                         echo "<a href='exVerComentarios.php?pagina=$nuevapagina'><img alt='flechIzq' src='./Imagenes/flecha_izq.gif' border='none'/>  </a> ";
                                     }
                                  if ($pagina< $totalpaginas)
                                     {
                                          $nuevapagina=$pagina+1;
                                          echo "\n<a href='exVerComentarios.php?pagina=$nuevapagina'><img alt='flechDer' src='./Imagenes/flecha_der.gif' border='none'/></a> ";
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
                                   Hay ".$NumComentariosKategym[0]." Comentarios
                                </td>
                              </tr>
                           </table>";
                      }                     
                }
      }
    else
      {
        header('location:index.php');
      }
?>
