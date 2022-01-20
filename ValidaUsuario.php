<?php
    // vamos a guardar valores en $_SESSION, la inicializamos
    session_start();

    // HACEMOS UNA LLAMADA A LA FUNCION QUE HACE LA CONEXION AL SERVIDOR Y A LA BBDD
        include 'ConexionBD.php';

    // VEAMOS QUE LE LLEGA DEL FORMULARIO
        $usuario=$_POST['Login'];
        $clave  =$_POST['Pass'];
        $pagina ="location:".$_POST['pagina'];

    //LA FORMA RECOMENDADA DE EJECUTAR UNA SQL: ver ejemplos de $conexion->query , y la función sprintf

        $sql = sprintf("select * from tblusuario where Nick='%s' and Contrasenia='%s'",
                        $conexion->real_escape_string($usuario),
                        $conexion->real_escape_string($clave));

        $resultado = $conexion->query($sql);// $conexion->query($sql);
        if (!$resultado)
           {
                echo "No se pudo ejecutar la consulta.Error 5<br/>";
                exit;
           }

      if ($resultado->num_rows==1)  // hay un usuario  con ese nombre y clave
            {
               $valido=1;
            }
         else
            {
               $valido=0;
            }
        //grabamos un registro con los datos introducidos,la hora y la IP, independiente de que sea válido o no
        $ip = "127.0.0.1";
        $strSQLinserta = sprintf( "insert into tblcontrol (Nick,Contrasenia,Fecha,IP,Valido) VALUES ('%s','%s',NOW(),'%s',%d)",
                                 $conexion->real_escape_string(htmlentities($usuario)),
                                 $conexion->real_escape_string(htmlentities($clave)),
                                        $ip,
                                        $valido);

        $InsertatblControl=$conexion->query($strSQLinserta);// mysql_querry ejecuta la sql
        //comprobamos que se a podido ejecutar la consulta
        if (!$InsertatblControl)
           {
                echo "No se pudo almacenar la informacion.Error 4<br/>";
                exit;
           }
           
        if (($resultado->num_rows==1))  // hay un usuario  con ese nombre y clave
            {
              $valido=1;
              $fila=$resultado->fetch_array(MYSQLI_BOTH);
              $_SESSION['IDUsuario']=$fila['IdUsuario'];
              $_SESSION['Nombre']=$fila['Nombre'];
              $_SESSION['TipoUsuario']=$fila['TipoUsuario'];
              $_SESSION['Valido']=$valido;
              $_SESSION['EstadoUsuario']=$fila['EstadoUsuario'];
              $_SESSION['Borrado']=$fila['Borrado'];

              if($fila['Borrado']==1 && $fila['TipoUsuario']==2)
               {
                    $valido=1;
                    $pagina=$pagina."?error=2";
                    header ($pagina);
               }
              else
               {
                  echo "entra por akiii";
                  if($fila['TipoUsuario']==0)// si es administrador, abre la sesion del administrador
                    {
                       header('location:index.php');
                    }
                  if($fila['TipoUsuario']==1) // si es Monitor, abre la sesion del monitor
                    {
                       header('location:index.php');
                    }
                  if($fila['TipoUsuario']==2) // si es usuario, abre la sesion del usuario
                    {
                       header('location:index.php');
                    }
               }
            }
         else
          {
             $valido=1;
             $pagina=$pagina."?error=1";
             header ($pagina);
          }
     ?>


