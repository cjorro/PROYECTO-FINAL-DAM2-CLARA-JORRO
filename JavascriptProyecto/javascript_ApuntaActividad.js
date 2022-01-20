

    /*JAVASCRIPT ACTIVIDADES*/

    function eligeActividad()
    {
        if(document.getElementById("formActiv").Actividad.value=="")
            {
                return false;
            }
            return true;
    }

    function ValidaFormAct()
    {
        if(!eligeActividad())
            {
                alert("Elija una actividad");
                return false;
            }
        return true;
    }