<?php
   // HACEMOS UNA LLAMADA A LA FUNCION QUE HACE LA CONEXION AL SERVIDOR Y A LA BBDD
        include 'ConexionBD.php';
       

    if ((isset($_SESSION['Valido']) && $_SESSION['Valido']==1)) //SI HA HECHO ALGUIEN LOGIN
      {
            if($_SESSION['TipoUsuario']==0)
                {
                    echo "
                        <div class='TablaPanelControl'>
                            <a class='OPCont' href='ControlDeAccesos.php' >Control de Accesos</a>
                            <a class='OPCont' href='GestionDeUsuariosAdmin.php' >Gesti&oacute;n de Usuarios</a>
                            <a class='OPCont' href='GestionDeMonitoresAdmin.php' >Gesti&oacute;n de Monitores</a>
                            <a class='OPCont' href='GestionDeAdmnistradores.php' >Gesti&oacute;n de Adminstradores</a>
                            <a class='OPCont' href='exComentarios.php' >Comentarios</a>
                        </div>
                         ";
                }
            if($_SESSION['TipoUsuario']==1)
                {
                    echo "
                        <div class='TablaPanelControl'>
                            <a class='OPCont' href='ModificarDatos.php' >Modificar Datos</a>
                            <a class='OPCont' href='ModificarPassword.php' >Cambiar Contrase&ntilde;a</a>
                            <a class='OPCont' href='ActividadesMonitor.php' >Gestionar Actividades</a>
                            <a class='OPCont' href='ProgresosFisicosMonitor.php' >Gestionar Progresos F&iacute;sicos</a>
                            <a class='OPCont' href='exComentarios.php' >Comentarios</a>
                        </div>
                         ";
                }
            if($_SESSION['TipoUsuario']==2)
                {
                    echo "
                        <div class='TablaPanelControl'>
                            <a class='OPCont' href='ModificarDatos.php' >Modificar Datos</a>
                            <a class='OPCont' href='ModificarPassword.php' >Cambiar Contrase&ntilde;a</a>
                            <a class='OPCont' href='SubirFoto.php' >Subir Foto</a>
                            <a class='OPCont' href='ActividadesUsuario.php' >Gestionar Actividades</a>
                            <a class='OPCont' href='ProgresosFisicosUsuario.php' >Progresos F&iacute;sicos</a>
                            <a class='OPCont' href='exComentarios.php' >Comentarios</a>
                        </div>
                         ";
                }
      }
    else
      {
        header('location:index.php');
      }
?>
