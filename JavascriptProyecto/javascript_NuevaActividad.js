
 /* NUEVA ACTIVIDAD*/
 
  function ConfirmaCancelar()
    {
        var mensaje=confirm("Desea CANCELAR la operacion?");
        if(mensaje)
              return true;
        else
              return false;
    }


  function CompruebaCamposForm()
  {
      var form=document.getElementById("formulario");
      if(form.NombreActividad.value=="" ||  form.NewActividad.value=="" || form.Sala.value=="" ||
         form.Descripcion.value=="" || form.FotoActividad.value=="")
       {
            alert("Hay campos vacios");
            return false
       }
       return true;
  }
