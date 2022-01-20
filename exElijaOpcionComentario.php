<?php
   // HACEMOS UNA LLAMADA A LA FUNCION QUE HACE LA CONEXION AL SERVIDOR Y A LA BBDD
        include 'ConexionBD.php';

    if ((isset($_SESSION['Valido']) && $_SESSION['Valido']==1)) //SI HA HECHO ALGUIEN LOGIN
      {
         if(isset($_SESSION['TipoUsuario']))
                {
                    echo "<div class='TitGestAdmin'>Elija la opci&oacute;n a Realizar</div>";
                    echo"<table class='TabDatPer' border='0' cellpadding='2' cellspacing='5' style='text-align:center;'>
                             <tr>
                                <td colspan='2'>
                                    ELIJA UNA OPCION A REALIZAR
                                </td>
                             </tr>
                             <tr>
                                <td>
                                    <a href='exComentarios.php?Opc=Ver'><button>Ver Comentarios</button></a>
                                </td>
                                <td>
                                    <a href='exComentarios.php?Opc=Nuevo'><button>Nuevo Comentario</button></a>
                                </td>
                             </tr>
                       </table>";
                    if(isset($_GET['Nuevo']) && $_GET['Nuevo']=='OK')
                    {
                       echo"<table class='TabDatPer' border='0' cellpadding='2' cellspacing='5' style='text-align:center;'>
                             <tr>
                                <td>
                                    TU COMENTARIO FUE ALMACENADO CORRECTAMENTE
                                </td>
                             </tr>
                       </table>";
                    }
                }
      }
    else
      {
        header('location:index.php');
      }
?>
