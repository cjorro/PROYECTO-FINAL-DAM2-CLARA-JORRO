<?php
    // inicio la sesion
    session_start();
    if (!isset($_SESSION['Valido']) || (isset($_SESSION['Valido']) && $_SESSION['Valido']!=1))
      {
         header('location:index.php');
      }
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
    <title>Gymnasio Kategym :: Gesti&oacute;n de Administradores</title>
    <link rel="shortcut icon" href="./Imagenes/Logo.ico"/>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1"/>
    <link rel="Stylesheet" type="text/css" href="EstilosProyecto/estilos_proyectoKategym.css" />
    <script type="text/javascript" language="javascript" src="JavascriptProyecto/javascript_introUsuarioProyectoKategym.js"></script>
    <script type="text/javascript" language="javascript" src="JavascriptProyecto/javascript_GestionarProgresosFisicosMonitor.js"></script>

</head>
    <body class="bodyPrincipal">
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
                <div class="TituloPagPrincipal">Gesti&oacute;n de Administradores</div>
                <div class="ContGestAdmin">
                    <?php include 'GestiAdministradores.php'; ?>
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


