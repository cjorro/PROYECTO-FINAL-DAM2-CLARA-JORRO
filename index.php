<?php
    // inicio la sesion
    session_start();
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
    <title>Gymnasio Kategym :: Principal</title>
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
                <div class="TituloPagPrincipal">Bienvenido al Gymnasio Kategym</div>
                <div class="ContienePrincipal">
                   <div class="Estructurar">
                       <img alt="puntos" src="./Imagenes/flechas.gif"/>&nbsp;&nbsp;Nuestro gimnasio es un Centro de activida f&iacute;sica cuyo objetivo principal es la salud.
                   </div>
                   <br/>
                   <div class="Estructurar">
                       <img alt="puntos" src="./Imagenes/flechas.gif"/>&nbsp;&nbsp;Los servicios que ofrece el Gymnasio Kategym son:<br/>
                         <div style="margin-left:30px;">
                            <img alt="puntos" src="./Imagenes/flecha_sub3.gif"/>&nbsp;  Atenci&oacute;n a todas las personas interesadas en su condici&oacute;n f&iacute;sica.<br/>
                            <img alt="puntos" src="./Imagenes/flecha_sub3.gif"/>&nbsp;  Cuidado personal y profesional de calidad y alta eficacia.<br/>
                            <img alt="puntos" src="./Imagenes/flecha_sub3.gif"/>&nbsp;  Satisfacci&oacute;n a las diferentes necesidades de cada socio en funci&oacute;n de sus condiciones y objetivos.<br/>
                            <img alt="puntos" src="./Imagenes/flecha_sub3.gif"/>&nbsp;  Cuidamos todos los detalles para un &oacute;ptimo entrenamiento.<br/>
                            <img alt="puntos" src="./Imagenes/flecha_sub3.gif"/>&nbsp;  Amplios espacios.<br/>
                            <img alt="puntos" src="./Imagenes/flecha_sub3.gif"/>&nbsp;  Instalaciones acondicionadas para un servicio de calidad.<br/>
                            <img alt="puntos" src="./Imagenes/flecha_sub3.gif"/>&nbsp;  Equipo humano con experiencia en el mundo del fitness.
                         </div>
                   </div>   
                   <br/>
                   <div class="Estructurar">
                       <img alt="puntos" src="./Imagenes/flechas.gif"/>&nbsp;&nbsp;La sala de musculaci&oacute;n dispone de modernas m&aacute;quinas para practicar el peso libre, adem&aacute;s
                       de monitores especializados que estar&aacute;n a tu disposici&oacute;n.
                   </div>
                   <br/>
                   <div class="Estructurar">
                       <img alt="puntos" src="./Imagenes/flechas.gif"/>&nbsp;&nbsp;Piscina climatizada para practicar nataci&oacute;n libre y cursillos dentro de un marco original.
                   </div>
                   <br/>
                   <div class="Estructurar">
                       <img alt="puntos" src="./Imagenes/flechas.gif"/>&nbsp;&nbsp;En la sala cardio usted podr&aacute; ejercitarse bajo la supervisi&oacute;n constante de uno de nuestros monitores,
                       que le dise&ntilde;ar&aacute;n un plan de entrenamiento acorde a sus necesidades.
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
