<?php
$server = $_SERVER['PHP_SELF'];
echo "<table class='IntUsu' cellpadding='2' cellspacing='10' border='0'>
        <form id='form' action='ValidaUsuario.php' method='post' onsubmit='return Validaform()'>
            <tr>
                 <td colspan='2'>
                    <div class='colocaLogea'>
                        <label for='idLog'>Login:</label>
                        <input id='idLog' name='Login' type='text' size='12' />
                    </div>
                    <div class='colocaLogea'>
                        <label for='idPass'>Password:</label>
                        <input id='idPass' name='Pass' type='password' size='12' />
                    </div>
                 </td>            
            </tr>
            <tr >
                  <td colspan='2' style='text-align:center;'> <input type='submit' value='Validar'/></td>
            </tr>
            <input type='hidden' name='pagina' value='index.php'>
        </form>  
    </table>";
?>
