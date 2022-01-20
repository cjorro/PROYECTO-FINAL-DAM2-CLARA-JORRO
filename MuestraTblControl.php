<?php

    // VARIABLE QUE CONTROLA EL NUMERO DE ELEMENTOS DE CADA PAGINA
    $tamanopagina=6;

    //PARA CONTROLAR EL NUMERO DE PAGINAS
    if(isset($_GET['pagina']) && is_numeric($_GET['pagina']))
      {
            $pagina=$_GET['pagina'];
      }
    else
      {
            $pagina=1;   // SERA LA PRIMERA VEZ QUE SE LLAMA
      }

    //PARA CONTROLAR LAS DIRECCIONES DE LAS PAGINAS
    if(isset($_GET['acc']) && isset($_GET['ord']) && isset($_GET['tord']))
      {
            $_POST['Acceso']=$_GET['acc'];
            $_POST['Ordenacion']=$_GET['ord'];
            $_POST['TipoOrdenacion']=$_GET['tord'];
      }

?>
<?php
    // HACEMOS UNA LLAMADA A LA FUNCION QUE HACE LA CONEXION AL SERVIDOR Y A LA BBDD
        include 'ConexionBD.php';
        

    // DAMOS VALOR INICIAL A LAS SIGUIENTES VARIABLES, QUE SERAN QUIEN INDIQUEN EL VALOR DE LA SELECT SELECCIONADO
       $A1="";$A2="";$A3="";$O1="";$O2="";$O3="";$TO1="";$TO2="";

    //LA PRIMERA VEZ QUE SE LLAME A ESTA PAGINA, SE SELECCIONARAN EL PRIMER ELEMENTO DE CADA SELECT POR DEFECTO.
    // CUANDO SE ELIJA OTRA OPCION DE VISUALIZACION, CADA UNO DE LOS IF DEL ELSE CONTROLARAN EL VALOR DEL SELECT SELECCIONADO
    if(empty($_POST) && empty($_GET))
     {
       if(!isset($_POST['Acceso']) && !isset($_POST['Ordenacion']) && !isset($_POST['TipoOrdenacion']))
         {
            // Valores seleccionados de la select;
            $Acceso=1;
            $A1="selected='selected'";
            $Ordenacion=1;
            $O1="selected='selected'";
            $TipoOrdenacion=1;
            $TO1="selected='selected'";
         }
     }
    if(!empty($_POST))
     {
        $Acceso=$_POST['Acceso'];
        $Ordenacion=$_POST['Ordenacion'];
        $TipoOrdenacion=$_POST['TipoOrdenacion'];

        // CONTROLAMOS LA ACCION PARA CADA ELECCION DE LA SELECT 'Tipo de acceso'
        if($Acceso==1){$A1="selected='selected'";}
        if($Acceso==2){$A2="selected='selected'";}
        if($Acceso==3){$A3="selected='selected'";}

        // CONTROLAMOS LA ACCION PARA CADA ELECCION DE LA SELECT 'Ordenar por'
        if($Ordenacion==1){$O1="selected='selected'";}
        if($Ordenacion==2){$O2="selected='selected'";}
        if($Ordenacion==3){$O3="selected='selected'";}

        // CONTROLAMOS LA ACCION PARA CADA ELECCION DE LA SELECT 'Tipo ordenacion'
        if($TipoOrdenacion==1){$TO1="selected='selected'";}
        if($TipoOrdenacion==2){$TO2="selected='selected'";}
     }
?>
<?php
    echo "<form action='ControlDeAccesos.php' method='post'>
        <table class='elijeMuestraControl' cellspacing='5' cellpadding='2'>
            <tr>
                <td>
                    <select id='idAcceso' name='Acceso'>
                        <option value='1'"; print $A1; echo ">Todos Accesos</option>
                        <option value='2'"; print $A2; echo ">Accesos Validos</option>
                        <option value='3'"; print $A3; echo ">Accesos No Validos</option>
                    </select>
                </td>
                <td>
                    <label for='idOrden'>Ordenar por: </label>
                    <select id='idOrden' name='Ordenacion'>
                        <option value='1'"; print $O1; echo ">ID</option>
                        <option value='2'"; print $O2; echo ">Nick</option>
                        <option value='3'"; print $O3; echo ">Fecha</option>
                    </select>
                </td>
                <td>
                    <label for='idTipoOrden'>Tipo ordenacion: </label>
                    <select id='idTipoOrden' name='TipoOrdenacion'>
                        <option value='1'"; print $TO1; echo ">Asc</option>
                        <option value='2'"; print $TO2; echo ">Desc</option>
                    </select>
                </td>
                <td><input type='submit' value='Mostrar'/></td>
            </tr>
        </table>
    </form>";
?>

<?php            
    // CONTROLAMOS LO QUE QUEREMOS MOSTRAR
    if(empty($_POST) && empty($_GET))
     {
       if(!isset($_POST['Acceso']) && !isset($_POST['Ordenacion']) && !isset($_POST['TipoOrdenacion']))
         {
            // EJECUTAMOS LA SQL QUE ALMACENA TODA LA INFORMACION DE TBLCONTROL EN UN ARRAY
            $sqltblcontrol="select * from tblcontrol";
            $sqlCuantosRegistros="select count(*) from tblcontrol";
         }
     }
    if(!empty($_POST))
     {
        $Acceso=$_POST['Acceso'];
        $Ordenacion=$_POST['Ordenacion'];
        $TipoOrdenacion=$_POST['TipoOrdenacion'];
            // PARA SABER EL NUMERO DE ELEMENTOS SELECCIONADOS
            if($Acceso==1){$sqlCuantosRegistros="select count(*) from tblcontrol";}
            if($Acceso==2){$sqlCuantosRegistros="select count(*) from tblcontrol where Valido=1";}
            if($Acceso==3){$sqlCuantosRegistros="select count(*) from tblcontrol where Valido=0";}

        // CONTROLAMOS LA ACCION PARA CADA ELECCION DE LA SELECT 'Tipo de acceso'
        if($Acceso==1){$sqlAcceso="select * from tblcontrol";}
        if($Acceso==2){$sqlAcceso="select * from tblcontrol where Valido=1";}
        if($Acceso==3){$sqlAcceso="select * from tblcontrol where Valido=0";}

        // CONTROLAMOS LA ACCION PARA CADA ELECCION DE LA SELECT 'Ordenar por'
        if($Ordenacion==1){$sqlOrdenacion=" order by ID";}
        if($Ordenacion==2){$sqlOrdenacion=" order by Nick";}
        if($Ordenacion==3){$sqlOrdenacion=" order by Fecha";}

        // CONTROLAMOS LA ACCION PARA CADA ELECCION DE LA SELECT 'Tipo ordenacion'

        if($TipoOrdenacion==1){$sqlTipoOrdenacion=" asc";}
        if($TipoOrdenacion==2){$sqlTipoOrdenacion=" desc";}

        $sqltblcontrol=$sqlAcceso . $sqlOrdenacion . $sqlTipoOrdenacion;
        //print $sqltblcontrol;
     }
    // SE EJECUTA LA SQL QUE OBTIENE EL NUMERO DE REGISTROS SELECCIONADOS
       $sqlNumeroRegistros=$conexion->query($sqlCuantosRegistros); // mysql_querry ejecuta la sql
       //comprobamos que se a podido ejecutar la consulta
       if (!$sqlNumeroRegistros)
         {
            echo "No se pudo ejecutar la consulta. Error 7";
            exit;
         }

   // CALCULAMOS EL NUMERO DE REGISTROS SELECCIONADOS Y EL NUMERO DE PAGINAS A MOSTRAR
      $NumRegistros = $sqlNumeroRegistros->fetch_array(MYSQLI_BOTH); //array que contiene el numero de registros seleccionados
      if ($NumRegistros[0]>0)
              {
                $totalpaginas=ceil($NumRegistros[0]/$tamanopagina);  //redondea hacia arriba ceil -techo
              }
            else
              {
                $totalpaginas=0;

              }
      $posicionlectura=($pagina -1)*$tamanopagina;     // el primer registro es el 0


    // SE EJECUTA LA SQL QUE MOSTRARA LOS RESULTADOS QUE EL USUARIO HAYA ELEJIDO MEDIANTE LA SELECT
       $posicionlectura=($pagina -1)*$tamanopagina;     // el primer registro es el 0 : tiene que empezar en 0,10,20 para $tamanopagina=10
       $sqltblcontrol=$sqltblcontrol." limit $posicionlectura ,$tamanopagina";
       $Resultadotblcontrol = $conexion->query($sqltblcontrol); //ejecuta la sql
       if(!$Resultadotblcontrol)
        {
           echo "No se pudo ejecutar la consulta. Error 6";
           exit;
        }

       $NR=($pagina-1)* $tamanopagina;


       echo "<table class='muestraControl' cellpadding='2' cellspacing='3'>
             <tr class='centrado'>
                <th>ID</th><th>NICK</th><th>PASSWORD</th>
                <th>FECHA ACCESO</th><th>IP</th><th>ACCESO</th>
             </tr>";
       $i=0;
       while($Datostblcontrol=$Resultadotblcontrol->fetch_array(MYSQLI_BOTH))
         {
           if($i%2==0)
            {
               $c="P";
            }
           else
           {
               $c="I";
           }

           echo "<tr>";
               echo "<td class='color".$c."' style='text-align:center; width:20px;'>".$Datostblcontrol['ID']."</td>\n";

               if($Datostblcontrol['Nick']==null)
                 {
                   echo "<td class='color".$c."'>&nbsp;</td>\n";
                 }
               else
                 {
                   echo "<td class='color".$c."'>".$Datostblcontrol['Nick']."</td>\n";
                 }

               if($Datostblcontrol['Contrasenia']==null)
                 {
                   echo "<td class='color".$c."' style='width:120px;'>&nbsp; </td>\n";
                 }
               else
                 {
                   echo "<td class='color".$c."' style='width:170px;'>".$Datostblcontrol['Contrasenia']."</td>\n";
                 }

               echo "<td class='color".$c."' style='text-align:center; width:125px;'>".$Datostblcontrol['Fecha']."</td>\n
                     <td class='color".$c."' style='text-align:right; width:50px;'>".$Datostblcontrol['IP']."</td>\n";

               if($Datostblcontrol['Valido']==1)
                 {
                   echo "<td class='color".$c."' style='text-align:center; width:70px;'><img alt='valido' src='Imagenes/valido.png'/></td>";
                 }
               else
                 {
                   echo "<td class='color".$c."' style='text-align:center; width:70px;'><img alt='novalido' src='Imagenes/novalido.png'/></td>";
                 }
           echo "</tr>";
           $i+=1;
           $NR=$NR+1;
         }
       //$conexion->close();

       //sacamos link a siguiente, link a anterior e información de la página en la que está
     echo "</table>";
     echo "<table class='muestraControlPaginas' cellpadding='5' cellspacing='5'>
           <tr> <td colspan='6' style='text-align:center; background-color:#666;'>";
          if ($pagina>1)
               {
                 $nuevapagina=$pagina-1;
                 echo "\n<a href='ControlDeAccesos.php?pagina=$nuevapagina&limite=$tamanopagina&acc=$Acceso&ord=$Ordenacion&tord=$TipoOrdenacion'>
                      <img alt='flechIzq' src='./Imagenes/flecha_izq.gif' border='none'/></a> ";
               }
         // echo "<span style='font-size:20pt;'>&nbsp;$pagina de $totalpaginas&nbsp;</span>";
          if ($pagina< $totalpaginas)
               {
                 $nuevapagina=$pagina+1;
                 echo "\n<a href='ControlDeAccesos.php?pagina=$nuevapagina&limite=$tamanopagina&acc=$Acceso&ord=$Ordenacion&tord=$TipoOrdenacion'>
                       <img alt='flechDer' src='./Imagenes/flecha_der.gif' border='none'/></a> ";
               }
     echo "</td></tr>";
     echo "<tr><td colspan='6' style='text-align:center; background-color:#666;'>P&aacute;gina <strong>$pagina</strong> de $totalpaginas</td></tr>";
     echo "<tr><td colspan='6' style='text-align:center; background-color:#666;'>Se encontraron ".$NumRegistros[0]." registros</td></tr>";
     echo "</table>";
?>
