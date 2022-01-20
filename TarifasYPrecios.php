<?php
    // inicio la sesion
    session_start();
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
    <title>Gymnasio Kategym :: Tarifas y Precios</title>
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
                 <div class="TituloPrecios">Tarifas y Precios del Gymnasio Kategym</div>
                 <div class="ContienePrecios">
                     <table border="0" cellspacing="5" cellpadding="3">
                         <tr>
                             <th>MATRICULA/TIPO</th>
                             <th>PRECIO</th>
                         </tr>
                         <tr>
                             <td class="SubtitPrecio">MATRICULA FAMILIAR</td>
                             <td class="precio"><span class="euro">42.80</span> Euros</td>
                         </tr>
                         <tr>
                             <td class="SubtitPrecio">MATRICULA INDIVIDUAL</td>
                             <td><span class="euro">36.65</span> Euros</td>
                         </tr>
                         <tr>
                             <td colspan="3" style="background-color:#222; height:2%;">&nbsp;</td>
                         </tr>
                         <tr>
                             <th>ABONO/TIPO</th>
                             <th>PRECIO</th>
                             <th>PARTICULARIDADES</th>
                         </tr>
                         <tr>
                             <td class="SubtitPrecio">FAMILIAR</td>
                             <td><span class="euro">42.80</span> Euros</td>
                             <td>X</td>
                         </tr>
                         <tr>
                             <td class="SubtitPrecio">FAMILIAR HIJO</td>
                             <td colspan="2" class="izq">
                                 Al abono familiar <strong>se le sumar&aacute;n 3,65 Euros</strong> por cada nuevo
                                 miembro <span style="border-bottom:solid 1px #c0c0c0;">menor de 18 a&ntilde;os</span>. Los menores de 16 a&ntilde;os solamente
                                 podr&aacute;n disfrutar de la Zona de Agua y de la Pista Central.
                             </td>
                         </tr>
                         <tr>
                             <td class="SubtitPrecio">INDIVIDUAL</td>
                             <td class="precio"><span class="euro">34,25</span> Euros</td>
                             <td>X</td>
                         </tr>
                         <tr>
                             <td class="SubtitPrecio">JUNIOR</td>
                             <td><span class="euro">19,50</span> Euros</td>
                             <td  class="izq">(de <span style="border-bottom:solid 1px #c0c0c0;">16 A 17</span> a&ntilde;os)</td>
                         </tr>
                         <tr>
                             <td class="SubtitPrecio">MA&Ntilde;ANAS</td>
                             <td><span class="euro">24,40</span> Euros</td>
                             <td  class="izq">(a disfrutar solamente de <span style="border-bottom:solid 1px #c0c0c0;">Lunes a Viernes de 10:00h a 15:00h</span>)</td>
                         </tr>
                         <tr>
                             <td class="SubtitPrecio">EXCEDENCIAS</td>
                             <td><span class="euro">3,65</span> Euros</td>
                             <td>X</td>
                         </tr>
                         <tr>
                             <td class="SubtitPrecio">ALQUILER DE TOALLAS</td>
                             <td><span class="euro">0,95</span> Euros</td>
                             <td>X</td>
                         </tr>
                         <tr>
                             <td class="SubtitPrecio">ENTRADAS NO ABONADOS</td>
                             <td><span class="euro">10,35</span> Euros</td>
                             <td>X</td>
                         </tr>
                         <tr>
                             <td class="SubtitPrecio">TAQUILLAS</td>
                             <td><span class="euro">3,65</span> Euros</td>
                             <td>X</td>
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
