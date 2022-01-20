<?php
   // HACEMOS UNA LLAMADA A LA FUNCION QUE HACE LA CONEXION AL SERVIDOR Y A LA BBDD
        include 'ConexionBD.php';

    if ((isset($_SESSION['Valido']) && $_SESSION['Valido']==1)) //SI HA HECHO ALGUIEN LOGIN
      {
         if(isset($_SESSION['TipoUsuario']))
                {
                    //variable que contiene el Id del Usuario a modificar
                    $IdUsuario=$_GET['Id'];

                    //conseguimos el nombre del usuario
                    $sqlNomUsuario="select Nombre from tblusuario where IdUsuario=$IdUsuario";
                    $NomUsuario=$conexion->query($sqlNomUsuario);
                    $ElNombre=$NomUsuario->fetch_array(MYSQLI_BOTH);

                    //si se ha elegido alguna de las opciones
                    if(isset($_GET['ModOP']) && is_numeric($_GET['ModOP']))
                       {
                            // si la opcion elegida es la de modificar los datos
                            if($_GET['ModOP']==1)
                             {
                                echo "<div class='TitGestAdmin'>Modificar datos del usuario <strong>$ElNombre[0]</strong></div>";
                                //almacenamos todos los datos del usuario en un array
                                $sqlUsuario="select * from tblusuario where IdUsuario=$IdUsuario";
                                $User=$conexion->query($sqlUsuario);
                                $UsuarioLog=$User->fetch_array(MYSQLI_BOTH);

                                  if($UsuarioLog['FechaNacimiento']=='')
                                   {
                                        $fechNacimiento='';
                                   }
                                  else
                                   {
                                      // Para visualizar la fecha de nacimiento en dd/mm/aaaa
                                      $fech=explode ('-', $UsuarioLog['FechaNacimiento']);
                                      $fechNacimiento=$fech[2]."/".$fech[1]."/".$fech[0];
                                   }
                                   
                                // almacenamos en un array el nombre de todas las provincias
                                $sqlNumTotProvincias="select Provincia from tblprovincias";
                                $TotProvincias=$conexion->query($sqlNumTotProvincias);
                                echo"<form id='formMod' action='AlmacenaModUserAdmin.php' method='post'>
                                    <table class='TabDatPer' border='0' cellpadding='2' cellspacing='5'>
                                         <tr>
                                            <td class='Anchura'><label for='idNombre'>Nombre</label></td>
                                            <td><input type='text' id='idNombre' name='Nombre' value='".$UsuarioLog['Nombre']."'/></td>
                                         </tr>
                                         <tr>
                                            <td><label for='idApellidos'>Apellidos</label></td>
                                            <td><input type='text' id='idApellidos' name='Apellidos' value='".$UsuarioLog['Apellidos']."'/></td>
                                         </tr>
                                         <tr>
                                            <td><label for='idMail'>E-mail</label></td>
                                            <td><input  type='text' id='idMail' name='Correo' size='35' value='".$UsuarioLog['Email']."'/></td>
                                         </tr>
                                         <tr>
                                            <td><label for='idDireccion'>Direcci&oacute;n</label></td>
                                            <td><input type='text' id='idDireccion' name='Direccion' size='25' value='".$UsuarioLog['Direccion']."'/></td>
                                         </tr>
                                         <tr>
                                            <td><label for='idProvincia'>Provincia</label></td>
                                            <td>
                                                <select id='idProvincia' name='Provincia'>
                                                    <option value=''>&lt;Elija una provincia</option>";
                                                      $i=1;
                                                      while($NombreProvincias=$TotProvincias->fetch_array(MYSQLI_BOTH)) //array que contiene las opciones de la encuesta seleccionada
                                                       {
                                                         echo "<option value='".$i."'>".$NombreProvincias['Provincia']."</option><br/>\n";
                                                         $i+=1;
                                                       }
                                                      $conexion->close(); // se finaliza la conexion a la base de datos
                                                 echo "</select>
                                                <script languaje='javascript' type='text/javascript'>
                                                    document.getElementById('formMod').Provincia.value=".$UsuarioLog['CodProvincia'].";
                                                </script>
                                            </td>
                                         </tr>
                                         <tr>
                                            <td><label for='idCP'>C&oacute;digo Postal</label></td>
                                            <td><input type='text' id='idCP' name='CodigoPostal' size='4' value='".$UsuarioLog['CodPostal']."'/></td>
                                         </tr>
                                         <tr>
                                            <td><label for='idTel'>Tel&eacute;fono</label></td>
                                            <td><input type='text' id='idTel' name='Telefono' size='8' value='".$UsuarioLog['Telefono']."'/></td>
                                         </tr>
                                         <tr>
                                            <td>Fecha de Nacimiento</td>
                                            <td>
                                               <div class='fechNac'>
                                                    <select onchange='MuestraFech()' id='idDia' name='dia'>";
                                                       for($i=1;$i<=31;$i++)
                                                         {
                                                           echo "<option value='".$i."'>".$i."</option><br/>\n";
                                                         }
                                                    echo"</select>
                                                    <script languaje='javascript' type='text/javascript'>
                                                        document.getElementById('formMod').dia.value=$fech[2];
                                                    </script>
                                               </div>
                                               <div class='fechNac'>
                                                    <select id='idMes' name='mes'>";
                                                         $meses=array(0=>"Enero",1=>"Febrero",2=>"Marzo",3=>"Abril",4=>"Mayo",
                                                           5=>"Junio",6=>"Julio",7=>"Agosto",8=>"Septiembre",9=>"Octubre",10=>"Noviembre",11=>"Diciembre");
                                                        for($i=0;$i<=11;$i++)
                                                         {
                                                           echo "<option value='".($i+1)."'>".$meses[$i]."</option><br/>\n";
                                                         }
                                                    echo"</select>
                                                    <script languaje='javascript' type='text/javascript'>
                                                        document.getElementById('formMod').mes.value=$fech[1];
                                                    </script>
                                               </div>
                                               <div class='fechNac'>
                                                    <select onchange='MuestraFech()' id='idAnio' name='anio'>";
                                                       for($i=2021;$i>=1930;$i--)
                                                         {
                                                           echo "<option value='".$i."'>".$i."</option><br/>\n";
                                                         }
                                                    echo"</select>
                                                    <script languaje='javascript' type='text/javascript'>
                                                        document.getElementById('formMod').anio.value=$fech[0];
                                                    </script>
                                              </div>
                                              <input type='hidden' name='FechaNacimiento'/>
                                            </td>
                                         </tr>
                                         <tr>
                                            <td><label for='idNick'>Nick</label></td>
                                            <td><input type='text' id='idNick' name='Nick' value='".$UsuarioLog['Nick']."'/></td>
                                         </tr>
                                         <tr>
                                            <td><label for='idNick'>Contrase&ntilde;a</label></td>
                                                <td><input type='text' id='idPass' name='Pass' value='".$UsuarioLog['Contrasenia']."'/></td>
                                         </tr>";

                                        if(isset($_GET['ER']) && $_GET['ER']==1)
                                          {
                                            echo"<tr><td colspan='2' class='ErrNick'>
                                                    El Nick introducido ya existe!!
                                                 </td></tr>";
                                          }
                                        else
                                          {
                                            if(isset($_GET['ER']) && $_GET['ER']==2)
                                             {
                                               echo"<tr><td colspan='2' class='ErrNick'>
                                                      El Nick introducido es incorrecto!!
                                                   </td></tr>";
                                             }
                                            else
                                             {
                                               echo "<tr><td colspan='2' style='background-color:#222; height:1%;'>&nbsp;</td></tr>";
                                             }
                                          }
                                        echo"<tr>
                                                <td colspan='2' style='text-align:center;'>
                                                    <input type='hidden' name='IdUS' value='$IdUsuario'/>
                                                    <input type='submit' value='Guardar Datos'/>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td colspan='2' style='text-align:center;'>
                                                    <a href='ModificarUsuariosAdmin.php?Id=$IdUsuario'><button>Volver</button></a>
                                                </td>
                                             </tr>
                                    </table>
                                  </form>";
                             }
                            // si la opcion elegida es la de el pago de la cuota
                            if($_GET['ModOP']==2)
                             {
                                echo "<div class='TitGestAdmin'>Modificar Estado Pagado del usuario <strong>$ElNombre[0]</strong></div>";
                                echo"<table class='ModUserAdmin' border='0' cellspacing='5' cellpadding='5'>
                                    <tr>
                                        <td>
                                            El estado actual del usuario $ElNombre[0] es:
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>";
                                        //comprobamos el estado del usuario, es decir si tiene pagada la cuota o no
                                        $sqlHaPagado="select EstadoUsuario from tblusuario where IdUsuario=".$IdUsuario."";
                                        $HaPagado=$conexion->query($sqlHaPagado);
                                        $EstadoPagado=$HaPagado->fetch_array(MYSQLI_BOTH);
                                        if($EstadoPagado['EstadoUsuario']==0)
                                          {
                                            echo "La cuota del gymnasio <strong style='color:#FFC033;'>SI</strong> est&aacute; pagada.";
                                          }
                                        else
                                          {
                                            echo "La cuota del gymnasio <strong style='color:#FFC033;'>NO</strong> est&aacute; pagada.";
                                          }

                                        echo"</td>
                                    </tr>
                                    <tr>
                                        <td style='background-color:#222;'>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            &iquest;Desea cambiarle el estado del pago al usuario <strong>$ElNombre[0]</strong>?<br/>";
                                                if($EstadoPagado['EstadoUsuario']==0)
                                                  {
                                                    echo "(La cuenta del usuario ser&aacute; <strong>bloqueada</strong> hasta que vuelva a pagar)";
                                                  }
                                                else
                                                  {
                                                    echo "(La cuenta del usuario ser&aacute; <strong>desbloqueada</strong>)";
                                                  }

                                        echo"</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href='ModificaPagoUserAdmin.php?Id=$IdUsuario&Est=".$EstadoPagado['EstadoUsuario']."'><button>Cambiar estado del Pago</button></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style='background-color:#222;'>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href='ModificarUsuariosAdmin.php?Id=$IdUsuario'><button>Volver</button></a>
                                        </td>
                                    </tr>
                                </table>";
                             }

                            if($_GET['ModOP']==3)
                             {
                                echo "<div class='TitGestAdmin'>Habilitar o Deshabilitar usuario <strong>$ElNombre[0]</strong></div>";
                                echo"<table class='ModUserAdmin' border='0' cellspacing='5' cellpadding='5'>
                                    <tr>
                                        <td>
                                            El estado actual del usuario $ElNombre[0] es:
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>";
                                        //comprobamos el estado del usuario, es decir si tiene pagada la cuota o no
                                        $sqlEstaBorrado="select Borrado from tblusuario where IdUsuario=".$IdUsuario."";
                                        $EstaBorrado=$conexion->query($sqlEstaBorrado);
                                        $EstadoBorrado=$EstaBorrado->fetch_array(MYSQLI_BOTH);
                                        if($EstadoBorrado['Borrado']==0)
                                          {
                                            echo "El usuario est&aacute; <strong style='color:#FFC033;'>Habilitado</strong>.";
                                          }
                                        else
                                          {
                                            echo "El usuario est&aacute; <strong style='color:#FFC033;'>Deshabilitado</strong>";
                                          }

                                        echo"</td>
                                    </tr>
                                    <tr>
                                        <td style='background-color:#222;'>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            &iquest;Desea cambiarle el estado del usuario <strong>$ElNombre[0]</strong>?<br/>";
                                                if($EstadoBorrado['Borrado']==0)
                                                  {
                                                    echo "(El acceso del usuario al sistema ser&aacute; <strong>Bloqueado</strong>)";
                                                  }
                                                else
                                                  {
                                                    echo "(El acceso del usuario al sistema ser&aacute; <strong>Desbloqueado</strong>)";
                                                  }

                                        echo"</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href='ModificaBloqueoUserAdmin.php?Id=$IdUsuario&Est=".$EstadoBorrado['Borrado']."'><button>Cambiar estado del usuario</button></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style='background-color:#222;'>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href='ModificarUsuariosAdmin.php?Id=$IdUsuario'><button>Volver</button></a>
                                        </td>
                                    </tr>
                                </table>";
                             }
                             exit;
                       }
                    else
                       {
                    echo "<div class='TitGestAdmin'>Modificaci&oacute;n de datos del usuario <strong>$ElNombre[0]</strong></div>";
                    echo "<table class='ModUserAdmin' border='0' cellpadding='5' cellspacing='5'>
                            <tr>
                                <td colspan='2'>Qu&eacute; desea hacer con los datos del usuario $ElNombre[0]</td>
                            </tr>
                            <tr>
                                <td>
                                    A.- Modificar Datos
                                </td>
                                <td>
                                    <a href='ModificarUsuariosAdmin.php?Id=$IdUsuario&ModOP=1'><button>Modificar Datos</button></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    B.- Cambiar Estado Pagado
                                </td>
                                <td>
                                    <a href='ModificarUsuariosAdmin.php?Id=$IdUsuario&ModOP=2'><button>Cambiar Pagado</button></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    C.- Habilitar o Desabilitar Usuario
                                </td>
                                <td>
                                    <a href='ModificarUsuariosAdmin.php?Id=$IdUsuario&ModOP=3'><button>Cambiar Estado</button></a>
                                </td>
                            </tr>
                            <tr>
                                <td colspan='2' style='text-align:center;'>
                                    <a href='GestionDeUsuariosAdmin.php'><button>Volver</button></a>
                                </td>
                            </tr>
                          </table>";

                          if(isset($_GET['DM']) && $_GET['DM']==1)
                           {
                              echo "<table class='ModUserAdmin' border='0' cellpadding='5' cellspacing='5'>
                                    <tr>
                                        <td>
                                            Los datos del Usuario <strong style='color:#FFC033;'>$ElNombre[0]</strong> <br/>han sido modificados correctamente.
                                        </td>
                                    </tr>
                              </table>";
                           }

                          if(isset($_GET['EP']) && $_GET['EP']==1)
                           {
                              echo "<table class='ModUserAdmin' border='0' cellpadding='5' cellspacing='5'>
                                    <tr>
                                        <td>
                                            El Estado del pago de la cuota del Usuario <strong style='color:#FFC033;'>$ElNombre[0]</strong> <br/>ha sido modificado correctamente.
                                        </td>
                                    </tr>
                              </table>";
                           }
                          if(isset($_GET['EB']) && $_GET['EB']==1)
                           {
                              echo "<table class='ModUserAdmin' border='0' cellpadding='5' cellspacing='5'>
                                    <tr>
                                        <td>
                                            El Estado de la cuenta del Usuario <strong style='color:#FFC033;'>$ElNombre[0]</strong> <br/>ha sido modificado correctamente.
                                        </td>
                                    </tr>
                              </table>";
                           }

                       }
                }
      }
    else
      {
        header('location:index.php');
      }

?>


                                    

