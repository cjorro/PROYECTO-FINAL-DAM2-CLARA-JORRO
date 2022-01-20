<?php
    // inicio la sesion
    session_start();
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
    <title>Gymnasio Kategym :: Hazte Usuario</title>
    <link rel="shortcut icon" href="./Imagenes/Logo.ico"/>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1"/>
    <link rel="Stylesheet" type="text/css" href="EstilosProyecto/estilos_proyectoKategym.css" />
    <script type="text/javascript" language="javascript" src="JavascriptProyecto/javascript_introUsuarioProyectoKategym.js"></script>
    <script type="text/javascript" language="javascript" src="JavascriptProyecto/javascript_registroFormularioProyectoKategym.js"></script>
</head>
<body class="bodyPrincipal" onload="carga()">
    <div class="pagina">
        <div class="cabecera">
            <img alt="Logo" src="./Imagenes/logo2.gif" style="width:998px; height:100px; "/>
        </div>
        <div class="menuindex">
            <?php include 'Menu.php'; ?>
        </div>
        <div class="contenido">
            <div class="izquierdaConjunto">
                <div class="logueador">
                   <?php include 'AccesoSistema.php'; ?>
                </div>
                <div class="contieneAnunCP">
                   <?php include 'AnunciosPanelControl.php'; ?>
                </div>
            </div>
            <div class="muestraTodo">
                <?php
                    if(isset($_POST['Valido']))
                     {
                        echo "<div class='TitulosP'>Registrese para ser usuario del Gymnasio Kategym</div>
                              <div class='ContieneRegistro'>
                                <table class='YaRegistrado' border='0' cellpadding='5' cellspacing='5'>
                                    <tr>
                                    </tr>
                                    <tr>
                                        <td >
                                            Gracias por registrarte en el Gymnasio Kategym, <strong>".$_POST['Nick']."</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Pincha <a href='index.php'>aqui</a> para ir a la p&aacute;gina principal
                                        </td>
                                    </tr>
                                 </table>
                                 <div class='centraImagen'>
                                        <img alt='Logo' src='./Imagenes/LogoKategym.jpg'/>
                                    </td>
                                </div>
                              </div>
                             ";
                     }
                    else
                     {
                        echo "<div class='TitulosP'>Registrese para ser usuario del Gymnasio Kategym</div>";
                        echo "<div class='ContieneRegistro'>";
                                if (isset($_POST['Nombre']) && isset($_POST['Direccion']) && isset($_POST['Apellidos']) &&
                                      isset($_POST['Telefono']) && isset($_POST['CodigoPostal']) && isset($_POST['Correo']) &&
                                         isset($_POST['Provincia']) && isset($_POST['FechaNacimiento']) && isset($_POST['Nick']) &&
                                           isset($_POST['Password']) && isset($_POST['Alert']) && isset($_POST['Captcha']) &&
                                                isset($_POST['dia']) && isset($_POST['mes']) && isset($_POST['anio']))
                                        {
                                            $nombre=$_POST['Nombre'];
                                            $direccion=$_POST['Direccion'];
                                            $apellidos=$_POST['Apellidos'];
                                            $telefono=$_POST['Telefono'];
                                            $codigoPostal=$_POST['CodigoPostal'];
                                            $correo=$_POST['Correo'];
                                            $provincia=$_POST['Provincia'];
                                            $fechNacimiento=$_POST['FechaNacimiento'];
                                            $dia=$_POST['dia'];
                                            $mes=$_POST['mes'];
                                            $anio=$_POST['anio'];
                                            $nick=$_POST['Nick'];
                                            $password=$_POST['Password'];
                                            $alert=$_POST['Alert'];
                                            $captcha=$_POST['Captcha'];
                                        }
                                    include 'Registro_Formulario.php';
                         echo "</div>";
                     }
                 ?>   
            </div>
            <div class="limpiaContenido"></div>
            <div class="pie">
               <a class="publi" href="https://dportistas.es" target="_blank">
                   <img alt="anuncio" src="Anuncios/Anuncio1.gif"/>
               </a>
               <a class="publi2"href="https://www.maximuscle.com" target="_blank">
                   <img alt="anuncio2" src="Anuncios/Anuncio2.jpg"/>
               </a>
            </div>
            <div class="Validador">
                &copy; 2021 Desarrollo de Aplicaciones Multiplataforma
            </div>
        </div>
    </div>
</body>
</html>
