    //<<<<<<<<<<<<<<<<  FUNCIONES PARA QUE LAS DOS CONTRASEÑAS SEAN IGUALES  >>>>>>>>>>>>>>>>//
           function verificaContrasenia()
           {
                if(document.getElementById("formModPass").NewPass.value!=document.getElementById("formModPass").ReNewPass.value)
                  {

                    return false;
                  }
                else
                  {

                    return true;
                  }
           }

    //<<<<<<<<<<<<<<<<  FUNCIONES PARA CONTROLAR TODAS LAS OPCIONES DEL FORMULARIO >>>>>>>>>>>>>>>>//
           function VerificaForm()
           {
               var formulario=document.getElementById("formModPass");

               if( formulario.PassAct.value=="" || formulario.NewPass.value=="" || formulario.ReNewPass.value=="")
                {
                   alert("Hay campos vacios");
                   return false;
                }


               if(!verificaContrasenia())
               {
                  alert("Las password no coinciden");
                  return false;
               }

               return true;
           }


