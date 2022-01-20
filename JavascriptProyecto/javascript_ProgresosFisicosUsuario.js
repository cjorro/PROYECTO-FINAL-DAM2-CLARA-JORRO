
   /*JAVASCRIPT PROGRESOS FISICOS USUARIO*/

    function eligeFecha()
    {
        if(document.getElementById("formProgFisUs").FechaProgFisUs.value=="")
            {
                return false;
            }
            return true;
    }

    function VerificaFormProgFis()
    {
        if(!eligeFecha())
            {
                alert("Elija una fecha");
                return false;
            }
        return true;
    }

