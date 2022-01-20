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
               
    if ((isset($_SESSION['Valido']) && $_SESSION['Valido']==1)) //SI HA HECHO ALGUIEN LOGIN
      {
         if(isset($_SESSION['TipoUsuario']))
           {
              echo "<div class='TitGestAdmin'>Almacenar un nuevo Monitor</strong></div>";
              if (isset($_POST['Nombre']) && isset($_POST['Direccion']) && isset($_POST['Apellidos']) &&
                isset($_POST['Telefono']) && isset($_POST['CodigoPostal']) && isset($_POST['Correo']) &&
                isset($_POST['Provincia']) && isset($_POST['dia']) && isset($_POST['Password']) &&
                isset($_POST['mes']) && isset($_POST['anio']) && isset($_POST['Nick']))
                {
                   echo "<form id='formulario' action='GuardaNuevoMonitor.php' method='post'>
                    <table class='TablaNuevoMonitor' cellspacing='4' cellpadding='3' border='0'>
                        <tr>
                            <td><label for='idNombre'>Nombre</label></td>
                            <td><input type='text' id='idNombre' name='Nombre' value='".$_POST['Nombre']."'/></td>
                        </tr>
                        <tr>
                            <td><label for='idApellidos'>Apellidos</label></td>
                            <td><input type='text' id='idApellidos' name='Apellidos' value='".$_POST['Apellidos']."'/></td>
                        </tr>
                        <tr>
                            <td><label for='idMail'>E-mail</label></td>
                            <td><input  type='text' id='idMail' name='Correo' size='35' value='".$_POST['Correo']."'/></td>
                        </tr>
                        <tr>
                            <td><label for='idDireccion'>Direcci&oacute;n</label></td>
                            <td><input type='text' id='idDireccion' name='Direccion' value='".$_POST['Direccion']."'/></td>
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
                                 echo "</select>
                                <script languaje='javascript' type='text/javascript'>
                                    document.getElementById('formulario').Provincia.value=".$_POST['Provincia'].";
                                </script>
                            </td>
                        </tr>
                        <tr>
                            <td><label for='idCP'>C&oacute;digo Postal</label></td>
                            <td><input type='text' id='idCP' name='CodigoPostal' size='4' value='".$_POST['CodigoPostal']."'/></td>
                        </tr>
                        <tr>
                            <td><label for='idTel'>Tel&eacute;fono</label></td>
                            <td><input type='text' id='idTel' name='Telefono' size='8' value='".$_POST['Telefono']."'/></td>
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
                                        document.getElementById('formulario').dia.value=".$_POST['dia'].";
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
                                        document.getElementById('formulario').mes.value=".$_POST['mes'].";
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
                                         document.getElementById('formulario').anio.value=".$_POST['anio'].";
                                    </script>
                               </div>
                               <input type='hidden' name='FechaNacimiento'/>
                            </td>
                        </tr>
                        <tr>
                            <td><label for='idNick'>Nick</label></td>
                            <td><input type='text' id='idNick' name='Nick' value='".$_POST['Nick']."'/></td>
                        </tr>
                        <tr>
                            <td><label for='idPass'>Contrase&ntilde;a</label></td>
                            <td><input type='text' id='idPass' name='Password' size='25' value='".$_POST['Password']."'/></td>
                        </tr>
                        <tr>
                            <td colspan='2' style='background-color:#222; color:#F33; text-align:center;'>";
                             if(isset($_GET['ER']))
                             {
                                 if($_GET['ER']==1)
                                 {
                                     echo "EL NICK ES ERR&Oacute;NEO";
                                 }

                                 if($_GET['ER']==2)
                                 {
                                     echo "LA CONTRASE&Ntilde;A ES ERR&Oacute;NEA";
                                 }

                                 if($_GET['ER']==3)
                                 {
                                     echo "EL NICK YA EXISTE";
                                 }

                             }
                            echo"</td>
                        </tr>
                        <tr>
                            <td colspan='2' style='text-align:center;'><input type='submit' value='Almacenar Monitor' onclick='return VerificaForm()'/></td>
                        </tr>
                        <tr>
                            <td colspan='2' style='text-align:center;'><a href='GestionDeMonitoresAdmin.php'><button>Volver</button></a></td>
                        </tr>
                   </table>
             </form> ";
                }
              else
                {
                  echo "<form id='formulario' action='GuardaNuevoMonitor.php' method='post'>
                    <table class='TablaNuevoMonitor' cellspacing='4' cellpadding='3' border='0'>
                        <tr>
                            <td><label for='idNombre'>Nombre</label></td>
                            <td><input type='text' id='idNombre' name='Nombre'/></td>
                        </tr>
                        <tr>
                            <td><label for='idApellidos'>Apellidos</label></td>
                            <td><input type='text' id='idApellidos' name='Apellidos'/></td>
                        </tr>
                        <tr>
                            <td><label for='idMail'>E-mail</label></td>
                            <td><input  type='text' id='idMail' name='Correo'  size='35'/></td>
                        </tr>
                        <tr>
                            <td><label for='idDireccion'>Direcci&oacute;n</label></td>
                            <td><input type='text' id='idDireccion' name='Direccion'/></td>
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
                                 echo "</select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for='idCP'>C&oacute;digo Postal</label></td>
                            <td><input type='text' id='idCP' name='CodigoPostal' size='4'/></td>
                        </tr>
                        <tr>
                            <td><label for='idTel'>Tel&eacute;fono</label></td>
                            <td><input type='text' id='idTel' name='Telefono' size='8'/></td>
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
                               </div>
                               <div class='fechNac'>
                                    <select onchange='MuestraFech()' id='idAnio' name='anio'>";
                                       for($i=2021;$i>=1930;$i--)
                                         {
                                           echo "<option value='".$i."'>".$i."</option><br/>\n";
                                         }
                                    echo"</select>
                               </div>
                               <input type='hidden' name='FechaNacimiento'/>
                            </td>
                        </tr>
                        <tr>
                            <td><label for='idNick'>Nick</label></td>
                            <td><input type='text' id='idNick' name='Nick'/></td>
                        </tr>
                        <tr>
                            <td><label for='idPass'>Contrase&ntilde;a</label></td>
                            <td><input type='text' id='idPass' name='Password' size='25'/></td>
                        </tr>
                        <tr>
                            <td colspan='2' style='background-color:#222;'>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan='2' style='text-align:center;'><input type='submit' value='Almacenar Monitor' onclick='return VerificaForm()'/></td>
                        </tr>
                        <tr>
                            <td colspan='2' style='text-align:center;'><a href='GestionDeMonitoresAdmin.php'><button>Volver</button></a></td>
                        </tr>
                   </table>
             </form> ";
                }

           }
      }
    else
      {
        header('location:index.php');
      }
?>

