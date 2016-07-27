<script type="text/javascript" src="../js/jquery-1.8.2.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>

<?php 
if(!empty($_REQUEST['inicio']) and !empty($_REQUEST['final'])){
$start= $_REQUEST['inicio'];
$end = $_REQUEST['final'];
}
else {
	$start="14.6407339, -90.5116066";
	$end="14.5970354, -90.50452059999998";
}

?>

<script type="text/javascript">
 $(document).ready(function(){
var dist="";
  //funcion que traduce la direccion en coordenadas
				   
				    var directionsService = new google.maps.DirectionsService(); 
				    var directionsDisplay = new google.maps.DirectionsRenderer();
    
				   
				    var start = '<?php echo $start; ?>';
				    var end = '<?php echo $end; ?>';
				    var request = { 
				      origin:start, 
				      destination:end,
				      travelMode: google.maps.DirectionsTravelMode.DRIVING
			    };
				    
				    directionsService.route(request, function(response, status) {
				      if (status == google.maps.DirectionsStatus.OK) {
				        directionsDisplay.setDirections(response);
				        var myRoute = response.routes[0];
				        var distancia=parseFloat(myRoute.legs[0].distance.text.replace(",",".")).toFixed(2) - 1; 
				        $('body').html(distancia);        
				        }
				   });
});				    
</script>
