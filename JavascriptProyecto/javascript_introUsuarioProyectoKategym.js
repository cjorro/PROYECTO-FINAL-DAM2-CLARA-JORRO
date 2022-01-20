
/*JAVASCRIP DE LA PAGINA INTROUSUARIO*/
 
 function Validaform()
    {
        if(document.getElementById("form").Login.value=="" && document.getElementById("form").Pass.value=="")
            {
                alert("Debe introducir el Usuario y el Password\npara poder acceder a su perfil.");
                return false;
            }

        if(document.getElementById("form").Login.value!="" && document.getElementById("form").Pass.value=="")
            {
                alert("Debe introducir el Password\npara poder acceder a su perfil.");
                return false;
            }

        if(document.getElementById("form").Login.value=="" && document.getElementById("form").Pass.value!="")
            {
                alert("Debe introducir el Usuario\npara poder acceder a su perfil.");
                return false;
            }
        return true;
    }

  function VerificaFoto()
  {
      if(document.getElementById("formFoto").foto.value=="")
          {
              alert('Debe introducir una foto');
              return false;
          }
         return true;
  }