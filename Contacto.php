<?php
    // inicio la sesion
    session_start();
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
    <title>Gymnasio Kategym :: Contacta con Nosotros</title>
    <link rel="shortcut icon" href="./Imagenes/Logo.ico"/>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1"/>
    <link rel="Stylesheet" type="text/css" href="EstilosProyecto/estilos_proyectoKategym.css" />
    <script type="text/javascript" language="javascript" src="JavascriptProyecto/javascript_introUsuarioProyectoKategym.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript" language="javascript" src="JavascriptProyecto/javascritp_MapaGoogle.js"></script>
</head>
<body class="bodyPrincipal" onload="initialize()">
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
                <div class="TituloContacto">Contacta con nosotros</div>
                <div class="ContineContacto">
                    <table class="Contacto" border="0" cellpadding="5" cellspacing="5">
                        <tr>
                            <td>
                                <span class="titContact">Contacto</span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                Puedes contactar con nosotros, Gymnasio Kategym,     a trav&eacute;s de correo
                                electr&oacute;nico, tel&eacute;fono, fax o correo postal.
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="titContact">Localizaci&oacute;n</div>
                            </td>
                            <td  style="text-align:center;" rowspan="3">
                                <div id="map_canvas" style="width:460px; height:350px;"></div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>
                                    C. de Vel&aacute;zquez 50 1º<br/>
                                    28001 Madrid<br/><br/>
                                    C.I.F.:F-37334039<br/>
                                    Tel:910 771 239<br/>
                                    Fax:910 341 221<br/><br/>
                                    Email:gymkate@gym.es<br/>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="vacia">
                                &nbsp;
                            </td>
                        </tr>
                    </table>
                </div>
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
