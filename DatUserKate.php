<?php
   // HACEMOS UNA LLAMADA A LA FUNCION QUE HACE LA CONEXION AL SERVIDOR Y A LA BBDD
        include 'ConexionBD.php';

    if ((isset($_SESSION['Valido']) && $_SESSION['Valido']==1)) //SI HA HECHO ALGUIEN LOGIN
      {
         // OBTENEMOS TODOS LOS DATOS DEL USUARIO QUE HA HECHO LOGIN
              $sqlUsuario="select * from tblusuario where IdUsuario=".$_SESSION['IDUsuario'];
              $User=$conexion->query($sqlUsuario);
              if (!$User)
                {
                    echo "Error al ejecutar la sql. Error 13<br/>";
                    exit;
                }

              // Array que contiene todos los datos del usuario
              $UsuarioLog=$User->fetch_array(MYSQLI_BOTH);

              // obtenemos la provincia del usuario
              $sqlProv="select Provincia from tblprovincias where CodProvincia=".$UsuarioLog['CodProvincia'];
              $Prov=$conexion->query($sqlProv);
              if (!$Prov)
                {
                    echo "Error al ejecutar la sql. Error 14<br/>";
                    exit;
                }
              // Array que contiene todos los datos del usuario
              $ProvUsuario=$Prov->fetch_array(MYSQLI_BOTH);
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


        // MODIFICAMOS LOS DATOS DEL USUARIO QUE HA INICIADO SESION
        if(isset($_GET['MD']) && $_GET['MD']==1)
         {
              // INSERTAMOS TODAS LAS PROVINCIAS DE LA TABLA tblprovincias
                  // almacenamos en un array el nombre de todas las provincias
                  $sqlNumTotProvincias="select Provincia from tblprovincias";
                  $TotProvincias=$conexion->query($sqlNumTotProvincias); // mysql_querry ejecuta la sql
                  //comprobamos que se a podido ejecutar la consulta
                  if (!$TotProvincias)
                       {
                            echo "Error al ejecutar la sql.Error 1<br/>";
                            exit;
                       }
              echo "
                  <div class='TitModUs'>Los datos actuales de <strong>".$_SESSION['Nombre']."</strong> son: </div>
                  <form id='formMod' action='ConfirmaModificaDatos.php' method='post' onsubmit='return VerificaForm();'>
                    <table class='TabDatPer' border='0' cellpadding='4' cellspacing='5'>
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
                        echo"<tr><td class='ModifDatos'colspan='2' style='text-align:center;'>
                                <div>Pulse <input class='BotModificar' type='submit' value='aqui'/> para guardar los nuevos datos</div>
                        </td></tr>
                    </table>
                  </form>
                   ";

         }
        else 
         {
            if(isset($_GET['DM']) && $_GET['DM']==1)
            {
                echo "<div class='MensModYes'>
                        <table class='TablaMensModYes' border='0' cellpadding='5' cellspacing='5'>
                            <tr>
                                <td>
                                    Los datos del usuario <strong>".$_SESSION['Nombre']."</strong> han sido modificados correctamente.<br/>
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
            else// SE MUESTRA TODOS LOS DATOS PERSONALES REFERENTE AL USUARIO QUE HA INICIADO LA SESION
            {
              if(isset($_SESSION['TipoUsuario']))
                {

                    echo "
                            <div class='TitModUs'>Los datos actuales de <strong>".$_SESSION['Nombre']."</strong> son: </div>
                            <table class='TabDatPer' border='0' cellpadding='5' cellspacing='5'>
                                <tr><td class='Anchura'>Nombre</td><td>".$UsuarioLog['Nombre']."</td></tr>
                                <tr><td>Apellidos</td><td>".$UsuarioLog['Apellidos']."</td></tr>
                                <tr><td>E-mail</td><td>".$UsuarioLog['Email']."</td></tr>
                                <tr><td>Direcci&oacute;n</td><td>".$UsuarioLog['Direccion']."</td></tr>
                                <tr><td>Provincia</td><td>".$ProvUsuario[0]."</td></tr>
                                <tr><td>C&oacute;digo Postal</td><td>".$UsuarioLog['CodPostal']."</td></tr>
                                <tr><td>Tel&eacute;fono</td><td>".$UsuarioLog['Telefono']."</td></tr>";
                                echo" <tr><td>Fecha de Nacimiento</td><td>".$fechNacimiento."</td></tr>
                                <tr><td>Nick</td><td>".$UsuarioLog['Nick']."</td></tr>
                                <tr><td colspan='2' style='background-color:#222;'>&nbsp;</td></tr>
                                <tr><td class='ModifDatos'colspan='2' style='text-align:center;'>
                                        Pulse <a href='ModificarDatos.php?MD=1'>aqui</a> para modificar los datos
                                </td></tr>
                            </table>
                         ";
                }
            }
          }
      }
    else
      {
        header('location:index.php');
      }
?>