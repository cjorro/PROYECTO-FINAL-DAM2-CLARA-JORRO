
    /*GESTIONAR PROGRESOS FISICOS MONITOR*/


    function ModificaProgresos()
    {
        if(document.FormModPGM.UsuariosMonit.value=='')
          {
             alert("Introduzca un usuario");
          }
        else
          {
            document.FormModPGM.Accion.value='M';
            document.FormModPGM.submit();
          }
    }

    function IngresaNuevoProgreso()
    {
        if(document.FormModPGM.UsuariosMonit.value=='')
          {
             alert("Introduzca un usuario");
          }
        else
          {
            document.FormModPGM.Accion.value='I';
            document.FormModPGM.submit();
          }
    }

    function ModProgresos()
    {
        if(document.FormFechUsu.FechaProgFisUser.value=='')
          {
             alert('Introduzca una fecha');
          }
        else
          {
              document.FormFechUsu.ToDO.value='Mod';
              document.FormFechUsu.submit();
          }
    }

    function DeleteProgreso()
    {
        if(document.FormFechUsu.FechaProgFisUser.value=='')
          {
             alert('Introduzca una fecha');
          }
        else
          {
            var mensaje=confirm("Desea ELIMINAR este registro?");
            if(mensaje)
               {
                  document.FormFechUsu.ToDO.value='Del';
                  document.FormFechUsu.submit();
               }
          }
    }


    function CompruebaFecha()
    {
        if(document.FormFechUsu.FechaProgFisUser.value=='')
            {
              alert('Introduzca una fecha');
              return false;
            }
        return true;
    }

    function VerificaModPGMonit()
    {
        if(document.formModifProgFisMonit.MasaMuscular.value=='' || document.formModifProgFisMonit.MasaCorporal.value=='' ||
        document.formModifProgFisMonit.Altura.value=='' || document.formModifProgFisMonit.Peso.value=='')
         {
            alert('Hay campos vacios');
            return false;
         }
        return true;
    }

    function VerificaNewPGMonit()
    {
        if(document.formNuevoProgFisMonit.MasaMuscular.value=='' || document.formNuevoProgFisMonit.MasaCorporal.value=='' ||
        document.formNuevoProgFisMonit.Altura.value=='' || document.formNuevoProgFisMonit.Peso.value=='')
         {
            alert('Hay campos vacios');
            return false;
         }
        return true;
    }
    
     //<<<<<<<<<<<<<<<<  FUNCION QUE SE CARGA EN EL ONLOAD  >>>>>>>>>>>>>>>>//

            function cargaEventos()
            {
                capturaEventos();
            }

     //<<<<<<<<<<<<<<<<  FUNCIONES PARA CONTROLAR QUE SOLO SE INTRODUZCAN NUMEROS EN LAS CAJAS DE TEXTO >>>>>>>>>>>>>>>>//

           function capturaEventos()
           {
                //capturamos el evento keypress de la caja de texto de los siguientes
                document.getElementById("FNuevoPG").MasaCorporal.onkeypress=soloNumeros;
                document.getElementById("FNuevoPG").MasaMuscular.onkeypress=soloNumeros;
                document.getElementById("FNuevoPG").Altura.onkeypress=soloNumeros;
                document.getElementById("FNuevoPG").Peso.onkeypress=soloNumeros;
           }
            // Funcion que controla la insercion de numeros exclusivantente
           function soloNumeros(e)
           {
                if (window.event) // Si estamos en Internet Explorer,etc
		            {
			            if (event.keyCode>47 && event.keyCode<58) // Esta condicion controla que puedan introducir numeros unicamente(los limites estan controlados con la tabla ascii)
			                return true;
		            }
	            else  // Si estamos en Firefox
		            {
			            if (e.charCode>47 && e.charCode<58 // controla que solo se puedan introducir numeros
			                || e.charCode==0)
			                    return true;
		            }
	            return false;  // Si no se ha introducido un numero, no se escribe nada
           }

    function ConfirmaCancelar()
    {
        var mensaje=confirm("Desea CANCELAR la operacion?");
        if(mensaje)
              return true;
        else
              return false;
    }