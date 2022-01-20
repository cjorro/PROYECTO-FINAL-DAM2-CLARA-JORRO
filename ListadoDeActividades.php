<?php

   // HACEMOS UNA LLAMADA A LA FUNCION QUE HACE LA CONEXION AL SERVIDOR Y A LA BBDD
        include 'ConexionBD.php';

    echo "
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
    <title></title>

    <link rel='Stylesheet' type='text/css' href='EstilosProyecto/estilos_proyectoKategym.css' />
</head>
<body style='background-color:#222;'>";
        //Almacenamos en una variable los nombres de los tipos de actividades
        $sqlNombresTiposActividades="select * from tbltipoactividad";
        $NombresTiposActividades=$conexion->query($sqlNombresTiposActividades);
        while($TipoActividad = $NombresTiposActividades->fetch_array(MYSQLI_BOTH))
          {
            echo"
            <table class='tablaActividades' border='0' cellpadding='5' cellspacing='7'>
            <tr>
                <th class='TituloTipo' colspan='2'>".$TipoActividad['TipoActividad']."</th>
            </tr>";
            //almacenamos en un array los datos referentes a las actividades del tipo de actividad
            $sqlTodasActividadesSegunTipo="select * from tblactividades where IdTipoActividad=".$TipoActividad['IdTipoActividad']."";            
            $TodasActividadesSegunTipo=$conexion->query($sqlTodasActividadesSegunTipo);
            while($ActividadSegunTipo=$TodasActividadesSegunTipo->fetch_array(MYSQLI_BOTH))
              {
                echo"<tr>
                    <td class='imgAct' rowspan='2'><img alt='Actividad' src='".$ActividadSegunTipo['Foto']."' /></td>
                    <td class='TituloActividad' colspan='2'>".$ActividadSegunTipo['NombreActividad']."</td>
                </tr>
                <tr>
                    <td class='InfAct'>".$ActividadSegunTipo['Descripcion']."</td>
                </tr>";
              }
          echo" </table>";
          }
echo"</body>
</html>";

?>
