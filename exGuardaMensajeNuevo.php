<?php
   // CONTROLAR EL INICIO DE SESION Y LA UTILIZACION DE LA VARIABLE $_SESSION
       session_start();

   // HACEMOS UNA LLAMADA A LA FUNCION QUE HACE LA CONEXION AL SERVIDOR Y A LA BBDD
        include 'ConexionBD.php';

   // ALMACENAMOS LA INFORMACION RECIBIDA DEL FORMULARIO DE REGISTRO EN VARIABLES
        if (isset($_POST['tituloComen']) && isset($_POST['Comentario']))
         {
            $TituloComentario=$_POST['tituloComen'];
            $Comentario=$_POST['Comentario'];
            echo $TituloComentario."<br/>";
            echo $Comentario."<br/>";

         }
       else
         {
            echo "Error al recibir los datos del formulario.Error 200<br/>";
            exit;
         }

   // ALMACENAMOS LA INFORMACION DEL COMENTARIO

        $IdUsuario=$_SESSION['IDUsuario'];

        $sqlNuevoComentario="insert into tblexcomentarios (Titulo,Comentario,IdUsuario,VotPositivos,VotNegativos,Fecha) values
                            ('$TituloComentario',
                             '$Comentario',
                             $IdUsuario,
                             0,
                             0,
                             NOW())";

       $NuevoComentario=$conexion->query($sqlNuevoComentario);
       if (!$NuevoComentario)
         {
            echo "Error al almacenar la informacion del nuevo comentario. Error 600<br/>";
            exit;
         }
      else
      {
          header('location:exComentarios.php?Nuevo=OK');
      }


?>
