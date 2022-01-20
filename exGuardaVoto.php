<?php
   // CONTROLAR EL INICIO DE SESION Y LA UTILIZACION DE LA VARIABLE $_SESSION
       session_start();

   // HACEMOS UNA LLAMADA A LA FUNCION QUE HACE LA CONEXION AL SERVIDOR Y A LA BBDD
        include 'ConexionBD.php';

   // ALMACENAMOS LA INFORMACION RECIBIDA DEL FORMULARIO DE REGISTRO EN VARIABLES
        if (isset($_GET['Voto']) && isset($_GET['IdEncuesta']) && isset($_GET['pagina']))
         {
            //echo $_GET['Voto']."<br/>";
            $TipoVoto=$_GET['Voto'];
            $IdComentario=$_GET['IdEncuesta'];
            $pagina=$_GET['pagina'];
         }
       else
         {
            echo "Error al recibir los datos del formulario.Error 200<br/>";
            exit;
         }

         //guardamos un registro en la tabla tblexComentarioRealizado
         $sqlUsuarioYaVoto="insert into tblexComentarioRealizado (IdUsuario,IdComentario,Fecha,Voto) values
                             (".$_SESSION['IDUsuario'].",$IdComentario,NOW(),'$TipoVoto')";
         $UsuarioYaVoto=$conexion->query($sqlUsuarioYaVoto);
         if(!$UsuarioYaVoto)
          {
            echo "Error al ejecutar la sql. Error 100000.";
            exit;
          }
     if($TipoVoto=="POS")
     {
         //actualizamos el valor de la valoracion de dicha
         $sqlActualizaVoto="update tblexcomentarios set VotPositivos=VotPositivos+1 where Id=$IdComentario";
         $ActualizaVoto=$conexion->query($sqlActualizaVoto);
         if(!$UsuarioYaVoto)
          {
            echo "Error al ejecutar la sql. Error 100001.";
            exit;
          }
     }

     if($TipoVoto=="NEG")
     {
         //actualizamos el valor de la valoracion de dicha
         $sqlActualizaVoto="update tblexcomentarios set VotPositivos=VotPositivos-1 where Id=$IdComentario";
         $ActualizaVoto=$conexion->query($sqlActualizaVoto);
         if(!$UsuarioYaVoto)
          {
            echo "Error al ejecutar la sql. Error 100001.";
            exit;
          }
     }

     if($UsuarioYaVoto && $UsuarioYaVoto)
     {
         header("location:exVerComentarios.php?pagina=$pagina");
     }
?>
