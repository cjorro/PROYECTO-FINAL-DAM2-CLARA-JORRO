<?php
       //  VALORES INICIALES
       $servidor='localhost';
       $usuario='root';
       $contrasegna='';
       $basedatos='kategym_proyecto03';

       //ESTABLECEMOS LA CONEXION AL SERVIDOR MYSQL
       $conexion = new mysqli($servidor, $usuario, $contrasegna, $basedatos, 3306);

       if($conexion->connect_errno)
       {
              echo "Hubo un error al conectar con el servidor<br/>";
              exit;
       }
       else
       {
              // echo "No hubo problemas para conectar con el servidor<br/>";
       }
?>
