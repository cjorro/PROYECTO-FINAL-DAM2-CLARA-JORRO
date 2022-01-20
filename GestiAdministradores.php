<?php
   // HACEMOS UNA LLAMADA A LA FUNCION QUE HACE LA CONEXION AL SERVIDOR Y A LA BBDD
        include 'ConexionBD.php';

    if ((isset($_SESSION['Valido']) && $_SESSION['Valido']==1)) //SI HA HECHO ALGUIEN LOGIN
      {
         if(isset($_SESSION['TipoUsuario']))
                {
                    if(isset($_GET['DM']) &&  $_GET['DM']==1)
                    {
                       echo"<table class='TabDatPer' border='0' cellpadding='5' cellspacing='5'>
                             <tr>
                                <td style='text-align:center;'>
                                    Los datos del Administrador fueron modificados correctamente.
                                </td>
                             </tr>
                             <tr>
                                <td style='text-align:center;'>
                                    <a href='GestionDeAdmnistradores.php'><button>Volver</button></a>
                                </td>
                             </tr>
                       </table>";
                       exit;
                    }

                    //conseguimos el nombre del usuario
                    $sqlNomUsuario="select Nombre from tblusuario where IdUsuario=".$_SESSION['IDUsuario']."";
                    $NomUsuario=$conexion->query($sqlNomUsuario);
                    $ElNombre=$NomUsuario->fetch_array(MYSQLI_BOTH);

                    echo "<div class='TitGestAdmin'>Modificar datos del Administrador $ElNombre[0]</div>";

                    //almacenamos todos los datos del usuario en un array
                    $sqlUsuario="select * from tblusuario where IdUsuario=".$_SESSION['IDUsuario']."";
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
                    echo"<form id='formMod' action='AlmacenaModAdministrador.php' method='post'>
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
                                        <input type='submit' value='Guardar Datos'/>
                                    </td>
                                 </tr>
                        </table>
                      </form>";
                }
      }
    else
      {
        header('location:index.php');
      }
?>
