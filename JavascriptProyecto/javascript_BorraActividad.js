
// javascript para borrar las actividades del usuario
    function VerificaBorrar()
    {
        var mensaje=confirm("Desea DARSE DE BAJA en esta actividad");
        if(mensaje)
              return true;
        else
              return false;
    }

    function VerificaBorrarActividad()
    {
        var mensaje=confirm("Desea DAR DE BAJA esta actividad");
        if(mensaje)
              return true;
        else
              return false;
    }

    function VerificaBorrarActividadConUsuario()
    {
        var mensaje=confirm("!!Esta actividad tiene usuarios Apuntados!!\nDesea DAR DE BAJA esta actividad");
        if(mensaje)
              return true;
        else
              return false;
    }