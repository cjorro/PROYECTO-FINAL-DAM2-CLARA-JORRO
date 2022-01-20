<?php
    // inicio la sesion
    session_start();
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
    <title>Gymnasio Kategym :: Horarios Actividades</title>
    <link rel="shortcut icon" href="./Imagenes/Logo.ico"/>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1"/>
    <link rel="Stylesheet" type="text/css" href="EstilosProyecto/estilos_proyectoKategym.css" />
    <script type="text/javascript" language="javascript" src="JavascriptProyecto/javascript_introUsuarioProyectoKategym.js"></script>
    <script type="text/javascript" language="javascript" src="JavascriptProyecto/javascript_logueaUsuarioProyectoKategym.js"></script>
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
                <div class="TituloHorario">Horario de actividades del Gymnasio Kategym</div>
                <div class="contieneHorario">
                    <table border="0" cellspacing="4" cellpadding="2">
                        <tr>
                            <td class="titSubHorario" colspan="6">
                                HORARIO DE MA&Ntilde;ANA
                            </td>
                        </tr>
                        <tr >
                            <td class="TiposActividades" colspan="6">
                                <span class="bodyMind">BODY-MIND</span>
                                <span class="Coreo">COREOGRAFIADAS</span>
                                <span class="CopCardioVas">ALTO COMP. CARDIOVASCULAR</span>
                                <span class="Toni">TONIFICACI&Oacute;N MUSCULAR</span>
                                <span class="GastCal">ALTO GASTO CAL&Oacute;RICO</span>
                            </td>
                        </tr>
                        <tr>
                            <th>Inicio</th><th>Lunes</th><th>Martes</th><th>Miercoles</th>
                            <th>Jueves</th><th>Viernes</th>
                        </tr>
                        <tr>
                            <td class="hora">10:00</td><td class="CopCardioVas">Cycling</td>
                            <td class="bodyMind">Yoga</td><td class="bodyMind">Pilates-stretch</td>
                            <td class="Toni">Tonificaci&oacute;n</td><td class="GastCal">SpeedBak</td>
                        </tr>
                        <tr>
                            <td class="hora">11:00</td><td class="Toni">Tonificaci&oacute;n</td>
                            <td class="Coreo">Aero Latino</td><td class="CopCardioVas">Running Club</td>
                            <td class="CopCardioVas">Cycling</td><td class="GastCal">Abd. Stretch</td>
                        </tr>
                        <tr>
                            <td class="hora">12:00</td><td class="CopCardioVas">Cycling</td>
                            <td class="Coreo">Danza</td><td class="bodyMind">Tai Chi</td>
                            <td class="CopCardioVas">Cycling</td><td class="Coreo">Cardio-combat</td>
                        </tr>
                        <tr>
                            <td class="hora">13:00</td><td class="GastCal">SpeedBak</td>
                            <td class="Toni">Gap</td><td class="Coreo">Fitness Condition</td>
                            <td class="bodyMind">Pilates-stretch</td><td class="CopCardioVas">Cycling</td>
                        </tr>
                        <tr>
                            <td class="hora">14:00</td><td class="CopCardioVas">Cycling</td>
                            <td class="Coreo">Cardio-combat</td><td class="bodyMind">Yoga</td>
                            <td class="Toni">Gap</td><td class="GastCal">SpeedBak</td>

                        </tr>
                    </table>
                    <table border="0" cellspacing="4" cellpadding="2">
                        <tr>
                            <td class="titSubHorario" colspan="6">
                                HORARIO DE TARDE
                            </td>
                        </tr>
                        <tr >
                            <td class="TiposActividades" colspan="6">
                                <span class="bodyMind">BODY-MIND</span>
                                <span class="Coreo">COREOGRAFIADAS</span>
                                <span class="CopCardioVas">ALTO COMP. CARDIOVASCULAR</span>
                                <span class="Toni">TONIFICACI&Oacute;N MUSCULAR</span>
                                <span class="GastCal">ALTO GASTO CAL&Oacute;RICO</span>
                            </td>
                        </tr>
                        <tr>
                            <th>Inicio</th><th>Lunes</th><th>Martes</th><th>Miercoles</th>
                            <th>Jueves</th><th>Viernes</th>
                        </tr>
                        <tr>
                            <td class="hora">17:00</td><td class="Coreo">Danza</td>
                            <td class="CopCardioVas">Cycling</td><td class="bodyMind">Yoga</td>
                            <td class="GastCal">Abd. Stretch</td><td class="Toni">Tonificaci&oacute;n</td>
                        </tr>
                        <tr>
                            <td class="hora">18:00</td><td class="bodyMind">Pilates-stretch</td>
                            <td class="Toni">Tonificaci&oacute;n</td><td class="CopCardioVas">Cycling</td>
                            <td class="Coreo">Cardio-combat</td><td class="GastCal">SpeedBak</td>
                        </tr>
                        <tr>
                            <td class="hora">19:00</td><td class="CopCardioVas">Running Club</td>
                            <td class="Coreo">Danza</td><td class="Toni">Gap</td>
                            <td class="GastCal">SpeedBak</td><td class="bodyMind">Tai Chi</td>
                        </tr>
                        <tr>
                            <td class="hora">20:00</td><td class="GastCal">SpeedBak</td>
                            <td class="bodyMind">Pilates-stretch</td><td class="Coreo">Aero Latino</td>
                            <td class="CopCardioVas">Cycling</td><td class="Toni">Gap</td>
                        </tr>
                        <tr>
                            <td class="hora">21:00</td><td class="bodyMind">Yoga</td>
                            <td class="Toni">Tonificaci&oacute;n</td><td class="Coreo">Danza</td>
                            <td class="GastCal">Abd. Stretch</td><td class="CopCardioVas">Cycling</td>
                        </tr>
                    </table>
                 </div>
            </div>
            <div class="limpiaContenido"></div>
            <div class="pie">
               <a class="publi" href="http://www.borjafitness.com/" target="_blank">
                   <img alt="anuncio" src="Anuncios/Anuncio1.gif"/>
               </a>
               <a class="publi2"href="http://www.onlyfitnessnutrition.com/" target="_blank">
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