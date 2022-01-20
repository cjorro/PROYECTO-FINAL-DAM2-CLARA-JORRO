<div id="menu">
    <p><a href="index.php" target="_top">Principal</a></p>
    <p><a href="HorariosActividades.php" target="_top" >Horario Act.</a></p>
    <p><a href="Actividades.php" target="_top" >Actividades</a></p>
    <?php
        if ((!isset($_SESSION['Valido'])))
            {
                echo "<p><a href='RegistroUsuario.php' target='_top' >Hazte Usuario</a></p>";
            }
    ?>
    <p><a href="TarifasYPrecios.php" target="_top" >Tarifas y precios</a></p>
    <p><a href="Fotos.php" target="_top" >Fotos</a></p>
    <p><a href="Contacto.php" target="_top" >Contacto</a></p>
</div> 
