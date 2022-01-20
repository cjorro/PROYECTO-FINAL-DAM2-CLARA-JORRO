<?php
   // HACEMOS UNA LLAMADA A LA FUNCION QUE HACE LA CONEXION AL SERVIDOR Y A LA BBDD
        include 'ConexionBD.php';

    if ((isset($_SESSION['Valido']) && $_SESSION['Valido']==1)) //SI HA HECHO ALGUIEN LOGIN
      {
         if(isset($_SESSION['TipoUsuario']))
                {
                     echo "<div class='UsuarioNoPagado'>
                                El sistema ha <strong>restringido el acceso a su perfil</strong>, hasta que abone la cantidad <br/>pactada que refleja el
                                contrato de usuario del Gymnasio Kategym.<br/><br/>
                                Para mayor informaci&oacute;n contate con el Gymnasio mediante <br/>el tel&eacute;fono <strong>910 771 239</strong> o
                                el E-mail <strong>gymkate@gym.es</strong>.
                           </div>
                          ";
                }
      }
    else
      {
        header('location:index.php');
      }
?>
