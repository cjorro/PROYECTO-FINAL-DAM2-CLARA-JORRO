<?php
    // inicio la sesion
    session_start();
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
    <title>Gymnasio Kategym :: Album de Fotos</title>
    <link rel="shortcut icon" href="./Imagenes/Logo.ico"/>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1"/>
    <meta http-equiv="imagetoolbar" content="false"/>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <script type="text/javascript" src="JavascriptProyecto/jquery.min.js"></script>
    <script type="text/javascript" src="JavascriptProyecto/jquery.galleria.js"></script>
    <script type="text/javascript" src="JavascriptProyecto/javascript_Albun.js"></script>
    <script type="text/javascript" language="javascript" src="JavascriptProyecto/javascript_introUsuarioProyectoKategym.js"></script>
    <script type="text/javascript" language="javascript" src="JavascriptProyecto/javascript_registroFormularioProyectoKategym.js"></script>
    <link href="EstilosProyecto/galleria.css" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="Stylesheet" type="text/css" href="EstilosProyecto/estilos_proyectoKategym.css" />
    <link href="EstilosProyecto/estilos_Album.css" rel="stylesheet" type="text/css" media="screen,projection"/>
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
                <div class="TituloAlbum">Album de Fotos</div>
                <div class="ContieneAlbum">
                       <div class="demo">
                            <div id="main_image"></div>
                            <ul class="gallery_demo_unstyled">
                                <li class="active"><img src="./Imagenes/FotosAlbum/Piscina.jpg" alt="Piscina" title="Piscina climatizada disponible para las clases de nataci&oacute;n y usuarios"/></li>
                                <li><img src="./Imagenes/FotosAlbum/sala0.jpg" alt="Sala0" title="Sala 1: Fitness Condittion"/></li>
                                <li><img src="./Imagenes/FotosAlbum/sala1.jpg" alt="Sala1" title="Sala 2: Cardio-Combat"/></li>
                                <li><img src="./Imagenes/FotosAlbum/sala2.jpg" alt="Sala2" title="Sala 3: Aero Latino"/></li>
                                <li><img src="./Imagenes/FotosAlbum/sala3.jpg" alt="Sala3" title="Sala 4: Abd. Stretch"/></li>
                                <li><img src="./Imagenes/FotosAlbum/sala4.jpg" alt="Sala4" title="Sala 5: Gap"/></li>
                                <li><img src="./Imagenes/FotosAlbum/sala5.jpg" alt="Sala5" title="Sala 6: Danza"/></li>
                                <li><img src="./Imagenes/FotosAlbum/sala6.jpg" alt="Sala6" title="Sala 7: Tonificaci&oacute;n"/></li>
                                <li><img src="./Imagenes/FotosAlbum/sala7.jpg" alt="Sala7" title="Sala 8: Yoga"/></li>
                                <li><img src="./Imagenes/FotosAlbum/sala8.jpg" alt="Sala8" title="Sala 9: Cycling"/></li>
                                <li><img src="./Imagenes/FotosAlbum/sala9.jpg" alt="Sala9" title="Sala 10: SpeedBak"/></li>
                                <li><img src="./Imagenes/FotosAlbum/sala10.jpg" alt="Sala10" title="Sala 11: Musculaci&oacute;n"/></li>
                                <li><img src="./Imagenes/FotosAlbum/sala11.jpg" alt="Sala11" title="Sala 12: Pilates"/></li>
                                <li><img src="./Imagenes/FotosAlbum/sala12.jpg" alt="Sala12" title="Sala 13: Tai Chi"/></li>
                                <div style="clear:both;">&nbsp;</div>
                            </ul>
                        </div>                    
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
