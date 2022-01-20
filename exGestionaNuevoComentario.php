<?php
   // HACEMOS UNA LLAMADA A LA FUNCION QUE HACE LA CONEXION AL SERVIDOR Y A LA BBDD
        include 'ConexionBD.php';

    if ((isset($_SESSION['Valido']) && $_SESSION['Valido']==1)) //SI HA HECHO ALGUIEN LOGIN
      {
         if(isset($_SESSION['TipoUsuario']))
                {
                    echo "<div class='TitGestAdmin'>Crear Nuevo Commenario</div>";
                    echo"<form id='formMod' action='exGuardaMensajeNuevo.php' method='post'>
                        <table class='TabDatPer' border='0' cellpadding='5' cellspacing='5' style='text-align:center; width:550px;'>
                             <tr>
                                <td >T&iacute;tulo</td>
                                <td>
                                    <input type='text' name='tituloComen' size='70'/>
                                </td>
                             </tr>
                             <tr>
                                <td colspan='2'>Comentario</td>
                             </tr>
                             <tr>
                                <td colspan='2'>
                                    <textarea name='Comentario' style='width:520px; heigth:50px;'></textarea>
                                </td>
                             </tr>
                             <tr>
                                <td colspan='2'>
                                    <input type='submit' value='Guardar Comentario'/>
                                </td>
                             </tr>
                        </table>
                     </form>
                     <table class='TabDatPer' border='0' cellpadding='5' cellspacing='5' style='text-align:center; width:550px;'>                
                         <tr>
                            <td colspan='2'>
                                <a href='exComentarios.php'><button>Volver</button></a>
                            </td>
                         </tr>
                     </table>";                    
                }
      }
    else
      {
        header('location:index.php');
      }
?>

