
    /*JAVASCRIPT DEL MAPA DE GOOGLE*/

      function initialize() {
        var latlng = new google.maps.LatLng(40.42716, -3.68359);    
        var myOptions = {
          zoom: 18,
          center: latlng,
          mapTypeId: google.maps.MapTypeId.HYBRID
        };
        var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
        var contentString = '<div id="content">\n\
                        <h4 id="firstHeading" class="firstHeading" style="text-align:center; color:#000000; margin:0px 0px 5px 0px; padding:0px;">\n\
                        <strong>Gymnasio Kategym</strong></h4><img alt="logo" src="./Imagenes/LogoKategym.jpg" style="width:90px; heigth:10px; diplay:inline;"/>'+
                        '<div id="bodyContent" style=" margin:3px 0px 0px 0px; padding:0px; text-align:center;" ><p style="color:#000000; margin:0px; padding:0px; text-align:center;">\n\
                        <span style="border-bottom:solid 1px #c0c0c0; font-size:10pt; display:block; width:100px; margin:2px auto 0px auto; font-style:italic; font-weight:bold; color="#ffffff;"">Direcci&oacute;n</span>\n\
                        C. de Vel&aacute;zquez 50 1º, 28001 <br/>Madrid</p>';
                        


        var infowindow = new google.maps.InfoWindow({
            content: contentString
        });

        var marker = new google.maps.Marker({
            position: latlng,
            map: map,
            title:"Gymnasio Kategym"
        });

        google.maps.event.addListener(marker, 'click', function() {
          infowindow.open(map,marker);
        });
/*
        google.maps.event.addListener(map, 'click', function() {
          alert(map.getCenter());
        });*/
      }


