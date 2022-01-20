
/*JAVASCRIP DE LA PAGINA REGISTROFORMULARIO*/

     var meses=new Array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
     var diasMes=new Array(31,28,31,30,31,30,31,31,30,31,30,31);
     var fecha;
     //<<<<<<<<<<<<<<<<  FUNCION QUE SE CARGA EN EL ONLOAD  >>>>>>>>>>>>>>>>//

            function carga()
            {
                capturaEventos();
            }


    //<<<<<<<<<<<<<<<<  FUNCIONES PARA CONTROLAR LA FECHA DE NACIMIENTO  >>>>>>>>>>>>>>>>//

           function MuestraFech()
           {
               var formulario=document.getElementById("formMod");

               formulario.FechaNacimiento.value=formulario.dia.value + "-" + formulario.mes.value + "-" + formulario.anio.value;
               fecha = formulario.anio.value + "-" + formulario.mes.value + "-" + formulario.dia.value;
               //alert(formulario.FechaNacimiento.value);
           }

           // funcion que retorna falso cuando el dia del mes elegido no existe
           function ValidaFecha()
           {
               var formulario=document.getElementById("formMod");

               var diasMes=new Array(31,28,31,30,31,30,31,31,30,31,30,31);
               var mes=formulario.mes.value;
               var dia=formulario.dia.value;
               if(dia > diasMes[mes-1])
                 {
                    return false
                 }
               else
                 {
                    return true;
                 }
           }

    //<<<<<<<<<<<<<<<<  FUNCIONES PARA CONTROLAR EL EMAIL  >>>>>>>>>>>>>>>>//

           function VerificaMail()
           {
                var mail = new String(document.getElementById("formMod").Correo.value);
                if( mail.indexOf("@")!=-1 && mail.indexOf("@")!=0 && mail.indexOf("@")+1!=mail.length
                        && mail.indexOf("@")==mail.lastIndexOf("@"))
                  {
                        return true;
                  }
                else
                  {
                        return false;
                  }
           }

     //<<<<<<<<<<<<<<<<  FUNCIONES PARA CONTROLAR QUE SOLO SE INTRODUZCAN NUMEROS EN EL TELEFONO Y EL CODIGO POSTAL >>>>>>>>>>>>>>>>//
           function capturaEventos()
           {
	            //capturamos el evento keypress de la caja de texto para el telefono y el codigo postal
	            document.getElementById("formMod").CodigoPostal.onkeypress=soloNumeros;
	            document.getElementById("formMod").Telefono.onkeypress=soloNumeros;
                    document.getElementById("formMod").Captcha.onkeypress=limite;
           }

           // Funcion que controla el limite de 6 caracteres del Captcha
           function limite(e)
           {
                if (e)
                   if (e.charCode==0) return true;

                if (document.getElementById("formMod").Captcha.value.length==6) return false;
                return true;
           }

            // Funcion que controla la insercion de numeros exclusivantente en el imput del Telefono y del Codigo Postal
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

    //<<<<<<<<<<<<<<<<  FUNCIONES PARA CONTROLAR LA LONGITUD DEL TELEFONO >>>>>>>>>>>>>>>>//
           function limiteTel()
           {
	            if (document.getElementById("formMod").Telefono.value.length==9)
	              {
	                return true;
	              }
	            else
	              {
	                return false;
	              }
           }

    //<<<<<<<<<<<<<<<<  FUNCIONES PARA CONTROLAR LA LONGITUD DEL CODIGO POSTAL >>>>>>>>>>>>>>>>//
           function limiteCP()
           {
	            if (document.getElementById("formMod").CodigoPostal.value.length==5)
	                return true;
	            else
	                return false;
           }

    //<<<<<<<<<<<<<<<<  FUNCIONES PARA CONTROLAR TODAS LAS OPCIONES DEL FORMULARIO >>>>>>>>>>>>>>>>//
           function VerificaForm()
           {
               var formulario=document.getElementById("formMod");

               if(formulario.Nombre.value=="" || formulario.Direccion.value=="" || formulario.Apellidos.value=="" ||
                  formulario.Telefono.value=="" || formulario.CodigoPostal.value=="" || formulario.Correo.value=="" ||
                  formulario.Nick.value=="")
                  
                {
                   alert("Hay campos vacios");
                   return false;
                }

               // Codigo que da el valor al imput de la fecha de nacimiento
               fecha = formulario.anio.value + "-" + formulario.mes.value + "-" + formulario.dia.value;
               formulario.FechaNacimiento.value=fecha;

               if(formulario.Provincia.value=="")
               {
                   alert("Elija una provincia");
                   return false;
               }

               if(!ValidaFecha())
               {
                   alert("La Fecha de Nacimiento es incorrecta");
                   return false;
               }

               if(!limiteTel())
               {
                   alert("El Telefono es incorrecto");
                   return false;
               }

               if(!limiteCP())
               {
                   alert("El Codigo Postal es incorrecto");
                   return false;
               }

               if(!VerificaMail())
               {
                   alert("El Email es incorrecto");
                   return false;
               }

               return true;
           }
