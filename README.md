# PROYECTO-FINAL-DAM2-CLARA-JORRO
Contiene los archivos que componen mi proyecto final del 2º curso DAM2 2021/2022

El objetivo de este proyecto es realizar una página Web que gestione un Gimnasio.

Para ello me he basado en los conocimientos que he ido adquiriendo durante este periodo en el que he estado cursando el módulo de Desarrollo de Aplicaciones Multiplataforma.

Los lenguajes de programación a utilizar básicamente será PHP con una estructura HTML, su JavaScript y estilos CSS. 

Respecto al almacenaje de la información propongo una base de datos DB2 en MySQL.

La página Web del gimnasio Kategym estará subida a un servidor Apache para su ejecución.

El aspecto tiene que ser llamativo y la información contenida tiene que ser intuitiva para el usuario y que no le ofrezca inconvenientes a la hora de seguir la distinta iteración entre pantallas.

Sobre la funcionalidad, he planteado áreas de uso público que sean accesibles por todos los usuarios que accedan desde el navegador y áreas privadas para los usuarios que accedan al sistema.

El área pública tendrá diferentes pestañas para acceder a:
	-	Información general del gimnasio.
	-	Horario del gimnasio.
	-	Actividades que se imparten.
	-	Tarifas establecidas por el gimnasio
	-	Álbum de fotos de las instalaciones
	-	Formulario de alta de nuevos clientes.
	-	Área de contacto y localización de las instalaciones.
	
El tratamiento de la información para el área privada será complejo y actuará de distinta manera en función del usuario que la esté gestionando.

Para ello establezco tres tipos de usuarios y sus acciones:
-	Usuario Cliente: 
	o	Podrá darse de alta en el sistema mediante un formulario alojado el perfil público.
	o	Podrá acceder y modificar su información privada.
	o	Podrá apuntarse a nuevas actividades y acceder a sus progresos físicos.
	o	Podrá establecer comentarios accesibles por todos los perfiles.

-	Usuario Monitor: 
	o	Serán dados de alta por el Administrador
	o	Podrá acceder y modificar su información privada.
	o	Podrá gestionar actividades, dándolas de alta o de baja para que los usuarios se apunten a ellas.
		Las nuevas actividades se añadirán en la pestaña Actividades del perfil público
	o	Podrá dar de alta progresos físicos a los distintos usuarios que estén apuntados en las clases que impartan.
	o	Podrá establecer comentarios accesibles por todos los perfiles.

-	Usuario Administrador: 
	o	Serán dados de alta por el Administrador directamente en la base de datos.
	o	Podrá tener acceso al control de accesos. Este mostrará un listado de todos los accesos al sistema, tanto los válidos como los erróneos. Se podrá ordenar la información como el administrador indique.
	o	Podrá gestionar los usuarios, pudiendo editar sus datos, bloqueando su operativa en función del estado de su cuota o deshabilitar su acceso si la situación lo requiere.
	o	Podrá gestionar los monitores, permitiendo darlos de alta y editando su información almacenada en el sistema.
	o	Podrá modificar su información privada.
	o	Podrá establecer comentarios accesibles por todos los perfiles.
