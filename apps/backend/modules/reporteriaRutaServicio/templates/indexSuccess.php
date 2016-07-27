<?php

   
?>
<script src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>
<h1>Reporteria de Ruta Servicio Unidad</h1>
<p><?php $total = count($ruta); ?></p>
<?php foreach($ruta as $data): ?>
	<p><?php echo $data->getRuta(); ?></p>
<?php endforeach ?>	
	
<script type="text/javascript">
  
        
  $(document).ready(function(){
  	
  	 var ruta = [
        new google.maps.LatLng(14.6242342, -90.5315266),
        new google.maps.LatLng(14.6242342, -90.5315890),
        new google.maps.LatLng(14.6242342, -90.5316898)
    ];
    
     
     map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);
  	var mapOptions = {
                     zoom: 12,
                   center: new google.maps.LatLng(14.66692252,-90.4884572),
                mapTypeId: google.maps.MapTypeId.ROADMAP
   };
 
   
     ////// Infowindow  ////
 /*   google.maps.event.addListener(marker, 'click', function () {
     var infowindow = new google.maps.InfoWindow();
      infowindow.setContent('Coordenadas:<br/>' + event.latLng + '');
      infowindow.open(map, marker);
    });   
  	
  	*/
  	var lineas = new google.maps.Polyline({
        path: ruta,
         map: map,
         strokeColor: '#75f50d',
         strokeWeight: 4,
         strokeOpacity: 0.6,
         clickable: false
    });			
  });
  </script>
  <div id="cuerpo">
        <input type="submit" class="navi" value="limpiar marcadores" onclick="reset();" />
      <br /><br />
      <span id="mensaje"></span>
    </div> <!-- fin texto - -->
 <div id="map_canvas" style="width: 100%; height: 539px;"></div>