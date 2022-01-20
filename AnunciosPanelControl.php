<?php
   // HACEMOS UNA LLAMADA A LA FUNCION QUE HACE LA CONEXION AL SERVIDOR Y A LA BBDD
        include 'ConexionBD.php';

    if ((isset($_SESSION['Valido']) && $_SESSION['Valido']==1) &&
            (isset($_SESSION['Borrado']) && $_SESSION['Borrado']==0)) //SI HA HECHO ALGUIEN LOGIN
      {
        echo "<div class='ContienePanelContr'>
            <div class='nombrePanel'>Panel de control</div>
            <div class='ContieneOpcionesPanel'>";
                    include 'PanelDeControl.php';
            echo "</div>
        </div>";
      }
    else
      {
        echo "<a class='publi' href='https://usafitness.es' target='_blank'>
           <img alt='anuncio3' src='Anuncios/Anuncio3.gif' style='width:267px; height:98.9%;'/>
        </a>";
      }

?>