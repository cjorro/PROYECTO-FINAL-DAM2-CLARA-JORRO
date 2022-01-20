<?php
       // HACEMOS UNA LLAMADA A LA FUNCION QUE HACE LA CONEXION AL SERVIDOR Y A LA BBDD
            include 'ConexionBD.php';

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

    // FORMULARIO
    if (isset($_POST['Nombre']) && isset($_POST['Direccion']) && isset($_POST['Apellidos']) &&
        isset($_POST['Telefono']) && isset($_POST['CodigoPostal']) && isset($_POST['Correo']) &&
        isset($_POST['Provincia']) && isset($_POST['FechaNacimiento']) && isset($_POST['Nick']) &&
        isset($_POST['Password'])&& isset($_POST['dia']) && isset($_POST['mes']) && isset($_POST['anio']))
          {

           echo "
             <form id='formulario' action='Almacena_Usuario.php' method='post' onsubmit='return VerificaForm()'>
                <table class='tformulario' cellspacing='5' cellpadding='3' border='0'>
                    <tr>
                        <td colspan='2'>
                            <p class='TituloDentroForm'>DATOS PERSONALES</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for='idNombre'>Nombre</label>
                            <input type='text' id='idNombre' name='Nombre' size='35' value='$nombre'/>
                        </td>
                        <td>
                            <label for='idDireccion'>Direcci&oacute;n</label>
                            <input type='text' id='idDireccion' name='Direccion' size='25' value='$direccion'/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for='idApellidos'>Apellidos</label>
                            <input type='text' id='idApellidos' name='Apellidos' size='35' value='$apellidos'/>
                        </td>
                        <td>
                            <label for='idProvincia'>Provincia</label>
                            <select id='idProvincia' name='Provincia'>
                                <option value=''>&lt;Elija una provincia</option>";


                                  $i=1;
                                  while($NombreProvincias=$TotProvincias->fetch_assoc()) //array que contiene las opciones de la encuesta seleccionada
                                   {
                                       $row = $NombreProvincias['Provincia'];
                                       echo "<option value='".$i."'>". $row ."</option><br/>\n";

                                     $i+=1;
                                   }
                                  $conexion->close(); // se finaliza la conexion a la base de datos
             echo "
                            </select>
                            <script languaje='javascript' type='text/javascript'>
                                document.getElementById('formulario').Provincia.value=$provincia;
                            </script>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for='idTel'>Tel&eacute;fono</label>
                            <input type='text' id='idTel' name='Telefono' size='8' value='$telefono'/>
                        </td>
                        <td>
                            <label for='idCP'>C&oacute;digo Postal</label>
                            <input type='text' id='idCP' name='CodigoPostal' size='4' value='$codigoPostal'/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for='idMail'>E-mail</label>
                            <input  type='text' id='idMail' name='Correo' size='35' value='$correo'/>
                        </td>
                    </tr>

                    <tr>
                        <td colspan='2'>
                           <span style='font-family:verdana; font-size:11pt; color:#c0c0c0;'>Fecha de Nacimiento</span>
                               <div class='fechNac'>
                                    <span class='nombre'>D&iacute;a</span>
                                    <select onchange='MuestraFech()' id='idDia' name='dia'>";
                                       for($i=1;$i<=31;$i++)
                                         {
                                           echo "<option value='".$i."'>".$i."</option><br/>\n";
                                         }
                                    echo"</select>
                                    <script languaje='javascript' type='text/javascript'>
                                        document.getElementById('formulario').dia.value=$dia;
                                    </script>
                               </div>
                               <div class='fechNac'>
                                    <span class='nombre'>Mes</span>
                                    <select onchange='MuestraFech()' id='idMes' name='mes'>";
                                         $meses=array(0=>"Enero",1=>"Febrero",2=>"Marzo",3=>"Abril",4=>"Mayo",
                                           5=>"Junio",6=>"Julio",7=>"Agosto",8=>"Septiembre",9=>"Octubre",10=>"Noviembre",11=>"Diciembre");
                                        for($i=0;$i<=11;$i++)
                                         {
                                           echo "<option value='".($i+1)."'>".$meses[$i]."</option><br/>\n"; 
                                         }
                                    echo"</select>
                                    <script languaje='javascript' type='text/javascript'>
                                        document.getElementById('formulario').mes.value=$mes;
                                    </script>                                       
                                </div>
                               <div class='fechNac'>
                                    <span class='nombre'>A&ntilde;o</span>
                                    <select onchange='MuestraFech()' id='idAnio' name='anio'>";
                                       for($i=2021;$i>=1930;$i--)
                                         {
                                           echo "<option value='".$i."'>".$i."</option><br/>\n";
                                         }
                                    echo"</select>
                                    <script languaje='javascript' type='text/javascript'>
                                         document.getElementById('formulario').anio.value=$anio;
                                    </script>
                               </div>                                  
                           <span style='margin:0 0 0 50px;'><input type='text' name='FechaNacimiento' size='6' readonly='readonly' value='$fechNacimiento'/></<pan>
                        </td>
                    </tr>
               </table>
               <table class='tformulario' cellspacing='5' cellpadding='3' border='0'>
                    <tr>
                        <td colspan='3'>
                            <p class='TituloDentroForm'>DATOS DEL REGISTRO</p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan='2'>
                            <label for='idNick'>Nick</label>
                            <input type='text' id='idNick' name='Nick' size='57' value='$nick'/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for='idPass'>Contrase&ntilde;a</label>
                            <input type='password' id='idPass' name='Password' size='25'  value='$password' />
                        </td>
                        <td>
                            <label for='idPassR'>Repita su contrase&ntilde;a</label>
                            <input type='password' id='idPassR' size='25'  value='$password' />
                        </td>
                    </tr>
                    <tr>
                        <td  colspan='3'>
                            <div class='centraBotones'>
                                <input type='submit' value='Guardar datos'/>
                                <input type='reset' value='Borrar'/>
                            </div>
                        </td>
                    </tr>
                </table>
                <div style='text-align:left; margin:5px 0; padding:0px 0px 0px 50px;'>
                      ** Todos los datos son obligatorios.<br/>
                </div>
             </form>
                <script languaje='javascript' type='text/javascript'>
                    alert('$alert');
                </script>
                     ";
          }
    else
          {
    echo "
            <form id='formulario' action='Almacena_Usuario.php' method='post' onsubmit='return VerificaForm()'>
                <table class='tformulario' cellspacing='5' cellpadding='3' border='0'>
                    <tr>
                        <td colspan='2'>
                            <p class='TituloDentroForm'>DATOS PERSONALES</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for='idNombre'>Nombre</label>
                            <input type='text' id='idNombre' name='Nombre' size='35'/>
                        </td>
                        <td>
                            <label for='idDireccion'>Direcci&oacute;n</label>
                            <input type='text' id='idDireccion' name='Direccion' size='25'/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for='idApellidos'>Apellidos</label>
                            <input type='text' id='idApellidos' name='Apellidos' size='35'/>
                        </td>
                        <td>
                            <label for='idProvincia'>Provincia</label>
                            <select id='idProvincia' name='Provincia'>
                                <option value=''>&lt;Elija una provincia</option>";
                                $i=1;
                                while($NombreProvincias=$TotProvincias->fetch_assoc()) //array que contiene las opciones de la encuesta seleccionada
                                 {
                                     $row = $NombreProvincias['Provincia'];
                                   //echo "<option value='".$i."'>".$NombreProvincias['Provincia']."</option><br/>\n";
                                   echo "<option value='".$i."'>". $row ."</option><br/>\n";

                                   $i+=1;
                                 }
                                $conexion->close(); // se finaliza la conexion a la base de datos // se finaliza la conexion a la base de datos
              echo "
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for='idTel'>Tel&eacute;fono</label>
                            <input type='text' id='idTel' name='Telefono' size='8'/>
                        </td>
                        <td>
                            <label for='idCP'>C&oacute;digo Postal</label>
                            <input type='text' id='idCP' name='CodigoPostal' size='4'/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for='idMail'>E-mail</label>
                            <input  type='text' id='idMail' name='Correo' size='35'/>
                        </td>
                    </tr>
                    <tr>
                        <td colspan='2'>
                           <span style='font-family:verdana; font-size:11pt; color:#c0c0c0;'>Fecha de Nacimiento</span>
                               <div class='fechNac'>
                                    <span class='nombre'>D&iacute;a</span>
                                    <select onchange='MuestraFech()' id='idDia' name='dia'>";
                                       for($i=1;$i<=31;$i++)
                                         {
                                           echo "<option value='".$i."'>".$i."</option><br/>\n";
                                         }
                                    echo"</select>
                               </div>
                               <div class='fechNac'>
                                    <span class='nombre'>Mes</span>
                                    <select id='idMes' name='mes'>";
                                         $meses=array(0=>"Enero",1=>"Febrero",2=>"Marzo",3=>"Abril",4=>"Mayo",
                                           5=>"Junio",6=>"Julio",7=>"Agosto",8=>"Septiembre",9=>"Octubre",10=>"Noviembre",11=>"Diciembre");
                                        for($i=0;$i<=11;$i++)
                                         {
                                           echo "<option value='".($i+1)."'>".$meses[$i]."</option><br/>\n"; 
                                         }
                                    echo"</select>
                               </div>
                               <div class='fechNac'>
                                    <span class='nombre'>A&ntilde;o</span>
                                    <select onchange='MuestraFech()' id='idAnio' name='anio'>";
                                       for($i=2021;$i>=1930;$i--)
                                         {
                                           echo "<option value='".$i."'>".$i."</option><br/>\n";
                                         }
                                    echo"</select>
                              </div>
                            <span style='margin:0 0 0 50px;'><input type='text' name='FechaNacimiento' size='6' readonly='readonly'/></<pan>
                        </td>
                    </tr>
               </table>
               <table class='tformulario' cellspacing='5' cellpadding='3' border='0'>
                    <tr>
                        <td colspan='3'>
                            <p class='TituloDentroForm'>DATOS DEL REGISTRO</p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan='2'>
                            <label for='idNick'>Nick</label>
                            <input type='text' id='idNick' name='Nick' size='57'/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for='idPass'>Contrase&ntilde;a</label>
                            <input type='password' id='idPass' name='Password' size='25'/>
                        </td>
                        <td>
                            <label for='idPassR'>Repita su contrase&ntilde;a</label>
                            <input type='password' id='idPassR' size='25'/>
                        </td>
                    </tr>
                    <tr>
                        <td  colspan='3'>
                            <div class='centraBotones'>
                                <input type='submit' value='Guardar datos'/>
                                <input type='reset' value='Borrar'/>
                            </div>
                        </td>
                    </tr>
                </table>
                <div style='text-align:left; margin:5px 0; padding:0px 0px 0px 50px;'>
                      ** Todos los datos son obligatorios.<br/>
                </div>
         </form> ";
          }
?>
