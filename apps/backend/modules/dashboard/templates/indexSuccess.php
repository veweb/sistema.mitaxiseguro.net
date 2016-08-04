<link rel="stylesheet" href="css/alertify.core.css" />
    <link rel="stylesheet" href="css/alertify.default.css" />
<script src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>
    


<script>
    
</script>
<script type="text/javascript">
var matched, browser;

jQuery.uaMatch = function( ua ) {
    ua = ua.toLowerCase();

    var match = /(chrome)[ \/]([\w.]+)/.exec( ua ) ||
        /(webkit)[ \/]([\w.]+)/.exec( ua ) ||
        /(opera)(?:.*version|)[ \/]([\w.]+)/.exec( ua ) ||
        /(msie) ([\w.]+)/.exec( ua ) ||
        ua.indexOf("compatible") < 0 && /(mozilla)(?:.*? rv:([\w.]+)|)/.exec( ua ) ||
        [];

    return {
        browser: match[ 1 ] || "",
        version: match[ 2 ] || "0"
    };
};

matched = jQuery.uaMatch( navigator.userAgent );
browser = {};

if ( matched.browser ) {
    browser[ matched.browser ] = true;
    browser.version = matched.version;
}

// Chrome is Webkit, but Webkit is also Safari.
if ( browser.chrome ) {
    browser.webkit = true;
} else if ( browser.webkit ) {
    browser.safari = true;
}

jQuery.browser = browser;

function do_something() {
    console.info( arguments );
}

function fancyConfirm(msg,callbackYes,callbackNo) {
    var ret;
    $.fancybox({
        'modal' : true,
        'content' : "<div style=\"margin:1px;width:240px;\">"+msg+"<div style=\"text-align:right;margin-top:10px;\"><input id=\"fancyconfirm_cancel\" style=\"margin:3px;padding:0px;\" type=\"button\" value=\"Cancel\"><input id=\"fancyConfirm_ok\" style=\"margin:3px;padding:0px;\" type=\"button\" value=\"Enviar\"></div></div>",
        'beforeShow' : function() {
            jQuery("#fancyconfirm_cancel").click(function() {
                callbackNo();
                $.fancybox.close();
                
                
            });
            
            jQuery("#fancyConfirm_ok").click(function() {
                $.fancybox.close();
                $("#btns_submit").submit();
                callbackYes();
            });
        }
    });
}
 $(document).ready(function(){
  
  $("#btns_submit").click(function() {
    
      fancyConfirm('Esta seguro enviar el servicio?', function() {
                var dataEm = $('#form_account').serialize();
                $.ajax({
          type:'post',
          url:'<?php echo url_for('dashboarddev/mensaje'); ?>',
          data:dataEm,
          beforeSend:function(){
              
          },
          complete:function(){
              $.fancybox.close();
        
          },
          success:function(result){
             $.fancybox.close();
         //location.reload(); 
          }
        });
        
      do_something('yes');
      
      
      }, function() {
           
           do_something('no');
      });
      
       return false;
    });
   $("#btns_submit2").click(function(){
    $("#contenido").html("");
     var dataEm = $('#form_account').serializeArray();
    var html = "<p>¿Esta seguro de enviar servicio a estas unidades: </p>";
     $.each(dataEm, function(i, field){
       if(field.name =="unidad[]")  
              html = html + "<p>Unidad:" + field.value + "</p> ";
           if(field.name =="tarifa[]")
              html = html + "<p>Tarifa:" + field.value + "</p> ";
           if(field.name == "cliente[]")
               html = html + "<p>" + field.value + "</p> ";
              
        });
        html = html + "<a href='javascript:;' onclick='parent.$.fn.fancybox.close();'>Cancelar</a> <a href=# onclick=enviar();>Enviar</a>";
        $("#contenido").html(html);
    //$("#contenido").html(data[0]+"<p>Actualmente estamos haciendo un cambio</b> <p>Pruebe en unos 10 minutos por favor!!! </b><b>Atte. </b><b>Walter Rosales</b> ");
    $.fancybox("#contenido");
    return false;
    
    
    
    
    
    
   });
 	 $(".row-service").click(function(){
    
    var id = '#'+$(this).attr('id')+'-sub';
    
    $("'"+id+"'").addClass('dina2');
    
    
     });
 	 
 	//$('#puntoA').hide();
 	$('#puntoA').click(function() {
 		
 		$('#puntoA').val('');
 	});
 	 $("#stateId").change(function () {
 	 	
       $("#stateId option:selected").each(function () {
     	  // capturamos el valor elegido
          elegido=$(this).val();
          
        //  alert(elegido);
          var id = 0;
          var opton ="";
		  <?php foreach($towns as $town): ?>
			    id = '<?php echo $town->getStateId() ?>';
			    if(id == elegido){
				       opton +=  "<option value=<?php echo $town->getId(); ?> <?php if($town->getId() == $townsid) echo "selected"; ?>><?php echo $town->getName(); ?></option>" ;
			       }
		  <?php endforeach; ?>		
					
			$("#municipio").html("<div id=zona><select name=townsId id=townsId>" +
			               " <option value=0 selected=selected>-Seleccione Municipio-</option>" +
				           opton +
                           "</select></div>"		
                        );
          
        });
   });
   
   
   
   
  
	 $('#townsId').change( function() {
        alert('selecciono...');
     //$("form").attr("action", "<?php echo url_for('dashboard/index') ?>");
    // $("form").submit();
    // return false;
     
    });
  $('#btnBuscar').click( function() {
  	
   var trafico = $("#trafico").val();
 
  	geocoder = new google.maps.Geocoder();
				          var latlong ;
				        //obtengo la direccion del formulario
				        var address = $("#direccion").val();
				        
				       // if(address != ''){
				        	
				    
				        //hago la llamada al geodecoder
				        geocoder.geocode( { 'address': address}, function(results, status) {
				         
				                          //si el estado de la llamado es OK
				                          if (status == google.maps.GeocoderStatus.OK) {
				                          //centro el mapa en las coordenadas obtenidas
				                            
				                          latlong= results[0].geometry.location;
				                         // str = str.startsWith("string"));
				                          
				                         
				                          $('#puntoA').val(results[0].geometry.location.lat()+","+results[0].geometry.location.lng()) ;
				                         // alert(trafico);
				                          $("#trafico").val(trafico);
				                
				                           } 
                 
                            });
  	   
  	$("#datos").submit();
  	
  });
  $('#clientecorporativo').hide();
  $('#clientenom').hide();
  $('#clientedir').hide();
  $('#clientedira').hide();
  $('#clientetel').hide(); 
  $('#clientecom').hide();

  $('#clientetipo').change(function(){

  	   var op =  $('#clientetipo option:selected').val();
  	   if(op == 1){  
  	   		  $('.cambiarnombre').text('Nombre Colaborador:');
  	   		  $('#clientenom').hide();
			  $('#clientedir').hide();
			  $('#clientedira').hide();
			  $('#clientetel').hide(); 
			  $('#clientecom').hide();
			  $('#clientecorporativo').show();
			  $('#clienteempresa').show(); 
  	   		  $('#clienteservicio').show();

  	   	}
  	   	if(op==2){
  	   		$('.cambiarnombre').text('Nombre Cliente:');
  	   		 $('#clientecorporativo').hide();
  	   		$('#clienteempresa').hide(); 
  	   		$('#clienteservicio').hide();
  	   		$('#clientenom').show();
  			$('#clientedir').show();
  			$('#clientedira').show();
  			$('#clientetel').show(); 
  			$('#clientecom').show();
  	   	}
  });

  $('#clienteempresa').change(function(){
  	var empre  =  $('#clienteempresa option:selected').val();
     $('#clientescorporativo').fancybox({
        
        maxWidth    : 600,
        maxHeight   : 500,
        fitToView   : false,
        width       : '70%',
        height      : '70%',
        autoSize    : false,
        closeClick  : true,
        openEffect  : 'none',
        closeEffect : 'none'
    });  

  	$.ajax({
            method:'get',
            url:'<?php echo url_for('dashboarddev/colaborador'); ?>',
            data:"empresa="+empre,
            success:function(result){
                 $('#clientescorporativo').html(result);
                 $.fancybox.open('#clientescorporativo');
             }
          });
        
       
  });

   $('#clientescorporativo  tr').on('c', function(e) {
           $(e.currentTarget).children('td, th').css('background-color','#000');
         });
 /* 
  $('.serviciocodigo').change(function(){
 var id  =  $('.serviciocodigo option:selected').val();
  	$.ajax({
            method:'get',
            url:'<?php echo url_for('dashboard/llenaservicio'); ?>',
            data:"id="+id,
            success:function(result){
                 $('#datosc').html(result);
             }
          });

  });*/
  
  $('#direccion').change( function() {
  	//alert('diste click');
  	
  	
  	
  	
  	/*
  	geocoder = new google.maps.Geocoder();
				          var latlong ;
				        //obtengo la direccion del formulario
				        var address = $("#direccion").val();
				        
				       // if(address != ''){
				        	
				    
				        //hago la llamada al geodecoder
				        geocoder.geocode( { 'address': address}, function(results, status) {
				         
				                          //si el estado de la llamado es OK
				                          if (status == google.maps.GeocoderStatus.OK) {
				                          //centro el mapa en las coordenadas obtenidas
				                            
				                          latlong= results[0].geometry.location;
				                         // str = str.startsWith("string"));
				                          
				                         
				                          $('#puntoA').val(results[0].geometry.location.lat()+","+results[0].geometry.location.lng()) ;
				                          //alert(latlong);
				                
				                           } 
                 
                            });
                            */
  
         });
 /*   
 var callAjax = function(){
          $.ajax({
            method:'get',
            url:'http://sistema.mitaxiseguro.net/refreshunidad.php',
            success:function(data){
                 if(data != '0')
                  
				  ok(data);   
            }
          });
        }
        setInterval(callAjax,2000); 
  
   function ok(data){
   	alertify.success(data+alertify.labels.ok );
   //	$('#aceptadoservicio').html(data);  
   	document.getElementById('player').play();
   		var callAjax2 = function(){
          $.ajax({
            method:'get',
            url:'http://sistema.mitaxiseguro.net/refreshservicio.php',
            success:function(data){
                 $('#row-info').html(data);  
            }
          });
        }
         
    setInterval(callAjax2,60000); 
          
            
            
   	
   }
   
  
  
   

  
  var callAjax3 = function(){
          $.ajax({
            method:'get',
            url:'http://sistema.mitaxiseguro.net/nreservaciones.php',
            success:function(data){
                 $('#nreservaciones').html(data);  
            }
          });
        }
      //  setInterval(callAjax3,1000); 
  
    var callAjax4 = function(){
          $.ajax({
            method:'get',
            url:'http://sistema.mitaxiseguro.net/nserviciosaceptados.php',
            success:function(data){
                 $('#aceptadoservicio').html(data);  
            }
          });
        }
       setInterval(callAjax4,1000); 


  */
  
  
  
  });
 
  
  
<?php header('Access-Control-Allow-Origin: *'); ?> 
</script>
<div id="container">
<!--
<div id="nreservaciones"></div>-->
    <div id="contbody">

<form name="datos" id="datos" action="<?php echo url_for('dashboarddev/index'); ?>" method="POST">
				<div id="bodytop">

				<div id="searhState">
				
					<div id="zona">
				   <select name="stateId" id="stateId" >
					<option value="0">-Seleccione Departamento-</option>
					<?php foreach($states as $state): ?>
					<?php /*
					  if($state->getName() == "Guatemala1" ):
					   $seleccionar = "selected";
					  else:
					   $seleccionar = "";
					  endif;
					 */	  	  	  
						   ?>	
					<option value="<?php echo $state->getId(); ?>" <?php //echo $seleccionar ?>> <?php echo $state->getName(); ?></option>
					<?php endforeach; ?>
					
				</select>
				</div>
				<div id="municipio">
				
				<?php if($content != 'null'): ?>
				<?php    echo html_entity_decode($content);   ?>
				<?php endif; ?>	
				</div>
				<div id="distancia">
					<select name="distancia" id="distancia" >
						<option value="">-Seleccione Distancia -</option>
						<option value="1"> 1 km </option>
						<option value="2"> 2 km </option>
						<option value="3"> 3 km </option>
						<option value="4"> 4 km </option>
						<option value="5"> 5 km </option>
						<option value="6"> 6 km </option>
						<option value="7"> 7 km </option>
						<option value="8"> 8 km </option>
					</select>
					
				</div>
				<div id="distancia">
				<select id="trafico" name="trafico">
					<?php foreach ($tarifas as $tarifa): ?>
					<option value="<?php echo $tarifa->getId(); ?>"><?php echo $tarifa->getName();  ?></option>
					<?php endforeach; ?>
				</select>
				</div>
				<input type="text" name="direccion" maxlength="100" class="direccionB" id="direccion" value="">
				<input type="text" name="direccionB" maxlength="100" class="direccionB" id="direccionB" value="">
        <input type="text" name="direccionD" maxlength="100" class="direccionB" id="direccionD" value="">
        <input type="text" name="direccionC" maxlength="100" class="direccionB" id="direccionC" value="">
				<input type="text" name="puntoA" class="puntoA" id="puntoA" value="<?php echo $refA; ?>">  
				<input type="text" name="puntoB" class="puntoB" id="puntoB" value="<?php echo $puntoB; ?>">
        <input type="text" name="puntoC" class="puntoC" id="puntoC" value="<?php echo $puntoC; ?>">  
        <input type="text" name="puntoD" class="puntoD" id="puntoD" value="<?php echo $puntoD; ?>">          
				
				</div>
			<?php //echo  $posunidad = $marker[5]->getLat().",".$marker[5]->getLongi(); ?>

					<!-- <a href=""><h3 class="btnazul" id="btnBuscar">Buscar</h3></a>-->
					<button class="btnazul" type="button" id="btnBuscar" >BUSCAR</button>
					
				</div>
				
				 <div id="map_canvas" style="width: 100%; height: 539px;"></div>
				 
				 
<div id="module">
	
  <div class="title-m">ENVIO DE SOLICITUD DE SERVICIO A UNIDADES</div>
  <div id="row-info">
  	<script>
  	var callAjax2 = function(){
          $.ajax({
            method:'get',
            url:'http://sistema.mitaxiseguro.net/refreshservicio.php',
            success:function(data){
                 $('#row-info').html(data);  
            }
          });
        }
         
  callAjax2();
  	</script>
  </div>
 </div>

 
				 
				 <div id="panel_ruta" >
				 <h3 class="tabtit">DETALLE DE RUTA</h3>	
				 	<p id="detallerecorrido"> </p>
				 </div>
				
				<script type="text/javascript">
                  $(document).ready(function(){
                   
                     //obtengo la direccion del formulario
                     
                     //funcion que traduce la direccion en coordenadas
				   
				    var directionsService = new google.maps.DirectionsService(); 
				    var directionsDisplay = new google.maps.DirectionsRenderer();
    
				    var precio = 6;// precio 1 km x 4 tarifa sin trafico y 6 con trafico
				    var start = $("#puntoA").val();//'14.6407339, -90.5116066';
				    var pD = $("#puntoB").val();//'14.5970354, -90.50452059999998';
            var pC = $("#puntoC").val();
            var end = $("#puntoD").val();
				    var trafico = $("#trafico").val();
				    var tipo_trafico = <?php if ($trafico == "" ) echo "1"; else echo $trafico; ?>;
				    var precio = <?php foreach ($tarifas as $tarifa): 
				     if( $tarifa->getId() == $trafico){ $precioreal = $tarifa->getMonto();  } else $precio ="6"; 
				     endforeach;
					   if ($precioreal != "") $precio = $precioreal;
					   echo $precio;
					  ?>;
				    
				    var tipo= "<?php foreach ($tarifas as $tarifa): 
				     if( $tarifa->getId() == $trafico){ $tiporeal =  $tarifa->getName();  }else $tipo =  "Sin Trafico";
				     endforeach;
					 if($tiporeal != "") $tipo = $tiporeal;
					   echo $tipo;
					  ?>"; 
            var rendererOptions = {
                draggable: true
                };

              
            if(pC !== "" && end !== "" && pD !== "" && start !=="" ){

              
              var request = { 
                            origin:start, 
                            destination:end,
                            waypoints:[{location: pD },{location: pC}],
                            travelMode: google.maps.DirectionsTravelMode.DRIVING
                };
            }

             if(pC !== "" && pD !== "" && end == "" && start !==""  ){

              
              var request = { 
                            origin:start, 
                            destination:pC,
                            waypoints:[{location: pD}],
                            travelMode: google.maps.DirectionsTravelMode.DRIVING
                };
            }

             if(pD !== "" && pC == "" && end == "" && start !==""  ){

               var request = { 
                            origin:start, 
                            destination:pD,
                            travelMode: google.maps.DirectionsTravelMode.DRIVING
                };
            }

        

          if(pD !== "" && pC !== "" && end ==""){

               var request = { 
                            origin:start, 
                            destination:pD,
                            waypoints:[{location: pC}],
                            travelMode: google.maps.DirectionsTravelMode.DRIVING
                };
            }

          


             if(pC == "" && pD !== "" && end =="" && start !== ""){

              
              var request = { 
                            origin:start, 
                            destination:pD,
                            travelMode: google.maps.DirectionsTravelMode.DRIVING
                };
            }


             if(pC == "" && pD == "" && end =="" && start == ""){

              
              var request = { 
                            origin:start, 
                            destination:pD,
                             waypoints:[{location: end},{location: pC}],
                            travelMode: google.maps.DirectionsTravelMode.DRIVING
                };
            }


            
				    
				    directionsService.route(request, function(response, status) {
				      if (status == google.maps.DirectionsStatus.OK) {
				        directionsDisplay.setDirections(response);
				        var myroute = response.routes[0];
                var total = 0;
                var distancia= 0;
				        /*if(tipo_trafico== 1) { precio = 8;  tipo = "Con Trafico"; }
				        if(tipo_trafico == 2) { precio = 6;   tipo = "Sin Trafico"; }
				        if(tipo_trafico == 3) { precio = 7;   tipo = "Trafico Regular";  }


				        */
                for (var i = 0; i < myroute.legs.length; i++) {
                    total += myroute.legs[i].distance.value; 
                }
                total = total / 1000.0;
                distancia= parseFloat(total).toFixed(2);
				        
				        var tarifa =  distancia * precio;
				        console.log(precio);
				        $("#detallerecorrido").html("Distancia: "+ distancia
				                   + " km <br>  Tarifa: Q" + tarifa.toFixed(2)+"<br> Trafico: "+ tipo );
				        $("#tarifa").val(tarifa.toFixed(2));
				      }
				   });    
				  
			        
			        
			        var mapDiv = document.getElementById('map_canvas');
			        var map = new google.maps.Map(mapDiv, {
			            center: new google.maps.LatLng(<?php echo $position ?>),
			            zoom: 13,
			            mapTypeId: google.maps.MapTypeId.ROADMAP,
			            draggableCursor:"crosshair",
			            mapTypeControl: false
  					    });
  					directionsDisplay.setMap(map);
			      var input = /** @type {HTMLInputElement} */(document.getElementById('direccion'));
			      var options = {
                      componentRestrictions: {country: 'gt'}
                      };
                  var inputB = /** @type {HTMLInputElement} */(document.getElementById('direccionB'));
                  var inputC = /** @type {HTMLInputElement} */(document.getElementById('direccionD'));
                  var inputD = /** @type {HTMLInputElement} */(document.getElementById('direccionC'));
			      
 
                  var autocomplete = new google.maps.places.Autocomplete(input,options);
                      autocomplete.bindTo('bounds', map);

                  var autocompleteB = new google.maps.places.Autocomplete(inputB,options);
                      autocompleteB.bindTo('bounds', map);

                  var autocompleteC = new google.maps.places.Autocomplete(inputC,options);
                      autocompleteC.bindTo('bounds', map);

                  var autocompleteD = new google.maps.places.Autocomplete(inputD,options);
                      autocompleteD.bindTo('bounds', map);    
                      
                  var infowindow = new google.maps.InfoWindow();
                  var marker = new google.maps.Marker({
                      map: map
               });

			  google.maps.event.addListener(autocomplete, 'place_changed', function() {
			    infowindow.close();
			    marker.setVisible(false);
			    input.className = 'direccionB';
			    var place = autocomplete.getPlace();
			    if (!place.geometry) {
			      // Inform the user that the place was not found and return.
			     // input.className = 'puntoA';
			      return;
			    }
			    
			    // If the place has a geometry, then present it on a map.
    if (place.geometry.viewport) {
      //map.fitBounds(place.geometry.viewport);
      $('#puntoA').val(place.geometry.location.lat()+","+place.geometry.location.lng());
    } else {
      //map.setCenter(place.geometry.location);
      <?php //$position = "<script> document.write(place.geometry.location) </script>"; ?> 
      $('#puntoA').val(place.geometry.location.lat()+","+place.geometry.location.lng());

      
      //map.setZoom(17);  // Why 17? Because it looks good.
    }
    
      });

 google.maps.event.addListener(autocompleteB, 'place_changed', function() {
    infowindow.close();
    marker.setVisible(false);
    inputB.className = 'direccionB';
    var placeB = autocompleteB.getPlace();
    if (!placeB.geometry) {
      // Inform the user that the place was not found and return.
     // input.className = 'puntoA';
      return;
    }
    
    
    
    
    // If the place has a geometry, then present it on a map.
    if (placeB.geometry.viewport) {
      //map.fitBounds(place.geometry.viewport);
      $('#puntoB').val(placeB.geometry.location.lat()+","+placeB.geometry.location.lng());
    } else {
      //map.setCenter(place.geometry.location);
      <?php //$position = "<script> document.write(place.geometry.location) </script>"; ?> 
      $('#puntoB').val(placeB.geometry.location.lat()+","+placeB.geometry.location.lng());
      
      //map.setZoom(17);  // Why 17? Because it looks good.
    }
  });

    google.maps.event.addListener(autocompleteC, 'place_changed', function() {
    infowindow.close();
    marker.setVisible(false);
    inputC.className = 'direccionC';
    var placeC = autocompleteC.getPlace();
    if (!placeC.geometry) {
      // Inform the user that the place was not found and return.
     // input.className = 'puntoA';
      return;
    }
    
    
    
    
    // If the place has a geometry, then present it on a map.
    if (placeC.geometry.viewport) {
      //map.fitBounds(place.geometry.viewport);
      $('#puntoC').val(placeC.geometry.location.lat()+","+placeC.geometry.location.lng());
    } else {
      //map.setCenter(place.geometry.location);
      <?php //$position = "<script> document.write(place.geometry.location) </script>"; ?> 
      $('#puntoC').val(placeC.geometry.location.lat()+","+placeC.geometry.location.lng());
      
      //map.setZoom(17);  // Why 17? Because it looks good.
    }
  });
google.maps.event.addListener(autocompleteD, 'place_changed', function() {
    infowindow.close();
    marker.setVisible(false);
    inputB.className = 'direccionD';
    var placeD = autocompleteD.getPlace();
    if (!placeD.geometry) {
      // Inform the user that the place was not found and return.
     // input.className = 'puntoA';
      return;
    }
    
    
    
    
    // If the place has a geometry, then present it on a map.
    if (placeD.geometry.viewport) {
      //map.fitBounds(place.geometry.viewport);
      $('#puntoD').val(placeD.geometry.location.lat()+","+placeD.geometry.location.lng());
    } else {
      //map.setCenter(place.geometry.location);
      <?php //$position = "<script> document.write(place.geometry.location) </script>"; ?> 
      $('#puntoD').val(placeD.geometry.location.lat()+","+placeD.geometry.location.lng());
      
      //map.setZoom(17);  // Why 17? Because it looks good.
    }


  });
    //marker.setIcon(/** @type {google.maps.Icon} */({
     // url: place.icon,
     // size:  	new google.maps.Size(71, 71),
     // origin: new google.maps.Point(0, 0),
      //anchor: new google.maps.Point(17, 34),
      //scaledSize: new google.maps.Size(35, 35)
    //}));
    //marker.setPosition(place.geometry.location);
    //marker.setVisible(true);

    //var address = '';
    //if (place.address_components) {
     // address = [
      //  (place.address_components[0] && place.address_components[0].short_name || ''),
      //  (place.address_components[1] && place.address_components[1].short_name || ''),
      //  (place.address_components[2] && place.address_components[2].short_name || '')
     // ].join(' ');
   // }

    //infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
    //infowindow.open(map, marker);
  

  // Sets a listener on a radio button to change the filter type on Places
  // Autocomplete.
  //function setupClickListener(id, types) {
  //  var radioButton = document.getElementById(id);
  //  google.maps.event.addDomListener(radioButton, 'click', function() {
  //    autocomplete.setTypes(types);
  //  });
  //}

  //setupClickListener('changetype-all', []);
  //setupClickListener('changetype-establishment', ['establishment']);
  //setupClickListener('changetype-geocode', ['geocode']);
        
           
                  
 	              
  					// dibuja Punto de referencia de donde mide la distacia punta A.
  					var puntoA = new google.maps.LatLng(<?php echo $position ?>);
  					var fijoA = new google.maps.Marker({
  						position: puntoA,
  						draggable:true,
  					    title:"Punto A",
  					    icon: "<?php echo  image_path('LocalizationMap') ?>"
  					    });
  					// dibuja Punto de referencia de donde mide la distacia punta B.
  					var b = $('#puntoB').val();	
  					
  					var puntoB = new google.maps.LatLng(<?php echo $puntoB ?>);
  					var fijoB = new google.maps.Marker({
  						position: puntoB,
  						draggable:true,
  					    title:"Punto B",
  					    icon: "<?php echo  image_path('LocalizationMapB') ?>"
  					    });
            var puntoC = new google.maps.LatLng(<?php echo $puntoC ?>);
            var fijoC = new google.maps.Marker({
              position: puntoC,
              draggable:true,
                title:"Punto C",
                icon: "<?php echo  image_path('LocalizationMapC') ?>"
                }); 
            var puntoD = new google.maps.LatLng(<?php echo $puntoD ?>);
            var fijoD = new google.maps.Marker({
              position: puntoD,
              draggable:true,
                title:"Punto D",
                icon: "<?php echo  image_path('LocalizationMapD') ?>"
                });           

  				    google.maps.event.addListener(fijoA,'click',function(){
  					    	var markerLatLng  = fijoA.getPosition();
  					    	    markerLatLng = markerLatLng.toString(30).replace('(', '');
  					    	    markerLatLng = markerLatLng.toString(30).replace(')', '');
  					            $('input[name="puntoA"]').val(markerLatLng);
  					          //  $('.puntaA').val(markerLatLng);
  					    });

  				    google.maps.event.addListener(fijoB,'click',function(){
  					    	var markerLatLngB  = fijoB.getPosition();
  					    	    markerLatLngB = markerLatLngB.toString(30).replace('(', '');
  					    	    markerLatLngB = markerLatLngB.toString(30).replace(')', '');
  					            $('input[name="puntoB"]').val(markerLatLngB);
  					          //  $('.puntaA').val(markerLatLng);
  					    });

              google.maps.event.addListener(fijoC,'click',function(){
                  var markerLatLngC  = fijoC.getPosition();
                      markerLatLngC = markerLatLngC.toString(30).replace('(', '');
                      markerLatLngC = markerLatLngC.toString(30).replace(')', '');
                        $('input[name="puntoC"]').val(markerLatLngC);
                      //  $('.puntaA').val(markerLatLng);
                });
               google.maps.event.addListener(fijoD,'click',function(){
                  var markerLatLngD  = fijoD.getPosition();
                      markerLatLngD = markerLatLngD.toString(30).replace('(', '');
                      markerLatLngD = markerLatLngD.toString(30).replace(')', '');
                        $('input[name="puntoD"]').val(markerLatLngD);
                      //  $('.puntaA').val(markerLatLng);
                });

  					    
  					    fijoA.setMap(map);
                fijoB.setMap(map);
  					    fijoC.setMap(map);
                fijoD.setMap(map);
  					    // evento de clic coordenadas muestra en google;
  					      					    
  					    //Creo un evento asociado a "mapa" cuando se hace "click" sobre el
  					      /* 
                          google.maps.event.addListener(map, "click", function(evento) {
                        //Obtengo las coordenadas separadas
                         
                          var latitud = evento.latLng.lat();
                          var longitud = evento.latLng.lng();

                        //Puedo unirlas en una unica variable si asi lo prefiero
                           var coordenadas = evento.latLng.lat() + ", " + evento.latLng.lng();

                        //Las muestro con un popup
                          //alert(coordenadas);
                          $('#puntoA').val(coordenadas);
                         //LocalizationMap
                       //Creo un marcador utilizando las coordenadas obtenidas y almacenadas por separado en "latitud" y "longitud"
                         
                          var coordenadas = new google.maps.LatLng(latitud, longitud); /* Debo crear un punto geografico utilizando google.maps.LatLng */
                         // var marcador = new google.maps.Marker({position: coordenadas,map: map, animation: google.maps.Animation.DROP, title:"Ubicacion cliente", icon: "<?php echo  image_path('LocalizationMap') ?>"});
                         // }); 
                          
                          //Fin del evento
  					    //marcador.setMap(null);
  					  // marcador.setMap(map);
  					    
  					 
  					<?php $pos = 0; ?>
  					<?php foreach ($markerUnidades as $unidad) : ?>
  					<?php $posunidad = $unidad['lat'].",".$unidad['longi']; ?>
  					<?php $pos++; ?>
  					var myLatlng_<?php echo $pos ?> = new google.maps.LatLng(<?php echo $posunidad  ?>);
  					var marker_<?php echo $pos; ?> = new google.maps.Marker({
                        position: myLatlng_<?php echo $pos; ?>,
                        title:"Unidad: <?php 
						                   if($unidad['estado'] == 0) // Fuersa de servicio   
						                      echo  $unidad['codigo']." Estado: INACTIVO";
									       if($unidad['estado'] == 1)// Libre
                                              echo  $unidad['codigo']." Estado: LIBRE";
									       if($unidad['estado'] == 2)// ocupado
                                              echo  $unidad['codigo']." Estado: OCUPADO";
										   if($unidad['estado'] == 3)// ocupado
                                              echo  $unidad['codigo']." Estado: FUERA DE SERVICIO";
                                    
						                    ?>",
                        icon: "<?php 
                                    if($unidad['estado'] == 0) // inactivo
                                    echo  image_path('kar_icon_black');
									 if($unidad['estado'] == 1)// Libre
                                    echo  image_path('kar_icon_verde');
									 if($unidad['estado'] == 2)// ocupado
                                    echo  image_path('kar_icon_rojo');
                                    if($unidad['estado'] == 3)// fUERA DE SERVICIO
                                    echo  image_path('kar_icon_naranja');
                                    
                                    ?>"
                        });
                   
                        
                    var infoWindow_<?php echo $pos ?> = new google.maps.InfoWindow({ 
                        content: "<?php 
                        if($unidad['estado'] == 0) // Fuera de servicio
                                    echo  "<p><b>Estado:</b> INACTIVO </p>";
									 if($unidad['estado'] == 1)// Libre
                                    echo  "<p><b>Estado:</b> LIBRE </p>";
									 if($unidad['estado'] == 2)// ocupado
                                    echo  "<p><b>Estado:</b>OCUPADO</p>";
									  if($unidad['estado'] == 3)// ocupado
                                    echo  "<p><b>Estado:</b>FUERA DE SERVICIO</p>";
                                    
                        
                        echo "<p><b>Unidad:</b> ".$unidad['codigo']."</p><p> <b>Ultima comunicacion:</b> ".$unidad['updated_at']."</p><p> ".$unidades[0]->obtenerpiloto($unidad['id'])."</p>"; ?>" 
                         }); 

                         google.maps.event.addListener(marker_<?php echo $pos; ?>, 'click', function() { 
                         infoWindow_<?php echo $pos ?>.open(map, marker_<?php echo $pos; ?>); 
                         });      
                       
                     // To add the marker to the map, call setMap();
                        marker_<?php echo $pos; ?>.setMap(map);
                         
  					<?php endforeach;?>
  					<?php //if($refA):  ?>


  					
  					//var myLatlng_100 = new google.maps.LatLng(<?php //echo $refA; ?>);
  					//var myLatlng_101 = new google.maps.LatLng(<?php ////echo $posunidad;  ?>);
  					//var directionsDisplay = new google.maps.DirectionsRenderer();
                    //var directionsService = new google.maps.DirectionsService();
                    //var request = {
                       // origin: myLatlng_101,
                       // destination: myLatlng_100,
                       // travelMode: google.maps.DirectionsTravelMode['DRIVING'],
                       // unitSystem: google.maps.DirectionsUnitSystem['METRIC'],
                       // provideRouteAlternatives: true
                       // };
                        
                       // directionsService.route(request, function(response, status) {
                       // if (status == google.maps.DirectionsStatus.OK) {
                         //   directionsDisplay.setMap(map);
                           // directionsDisplay.setPanel($("#panel_ruta").get(0));
                            //directionsDisplay.setDirections(response);
                        //} else {
                          //  alert("No existen rutas entre ambos puntos");
                        //}
                        //});
                        
                       
  				<?php //endif; ?>	
  				
                  });					

	
                </script>	
                </form>
				<form name="mensaje" id="form_account" action="<?php echo url_for('dashboarddev/mensaje'); ?>" method="POST"> 
				<div id="unidades">
					<h3 class="tabtit">UNIDADES <?php echo "ENCONTRADAS: ".count($markerUnidades);  ?></h3>
					<table>
						<tr>
							<td  id="unidad">Seleccionar</td>
							<td  id="unidad">UNIDAD</td>
							<td id="unidad">DISTANCIA </td>
							<td id="chofer">PILOTO</td>
							<td id="placa">PLACA</td>
							<td id="celular">CELULAR</td>
							<td id="estado">Estado</td>
						</tr>
						<?php if(count($markerUnidades) != 0): ?>
						<?php foreach ($markerUnidades as $unidad) : ?>
                        <?php if($unidad['estado'] == 1): ?> 
			            <?php
							    $dteStart = new DateTime($unidad['updated_at']); 
					            $dteEnd   = new DateTime(date("Y-m-d H:i:s",(strtotime ("-1 Hours")) ));
								$dteDiff  = $dteStart->diff($dteEnd); 
								$diferencia = $dteDiff->format("%H:%I:%S");
								$tiempo = explode(':', $diferencia);
							    //var_dump($tiempo);
							 ?>
			  <?php //if((strval($tiempo[1]) < 5) and (strval($tiempo[0]) < 1)): ?>	
                         <tr>
                         	<td class="radius"><input type="checkbox" name="unidad[]" value="<?php echo $unidad['id']; ?>" id="unidad" checked></td>
                         	<td>UNIDAD <?php echo $unidad['codigo'];  ?></td>
                         	<td><?php echo number_format((float)$unidad['distance'], 2, '.', '');  ?> km</td>
                         	<td><?php echo $unidades[0]->obtenerpiloto($unidad['id']); //echo $unidad->getPiloto()->getFirstName();//echo $unidad->getPiloto()->getFirstName()." ".$unidad->getPiloto()->getLastName(); ?></td>
                         	<td><?php echo $unidades[0]->obtenerplaca($unidad['id']);//echo $unidad->getUnidad()->getPlaca(); ?></td>
                         	<td><?php echo $unidades[0]->obtenertelefono($unidad['id']); ?></td>
                            <td><?php 
                                      echo $unidades[0]->obtenerestado($unidad['id']); 
                                        
                                      ?></td>
                         </tr>
                         <?php //endif; ?>
                         <?php endif; ?>

						<?php endforeach;?>
						<?php endif; ?>
					</table>
				</div>
				<div id="tarifas">
					<h3 class="tabtit">TARIFA SUGERIDA</h3>
					<div id="tarifacont">
						<div id="tarifasugerida">
							<h4>Tarifa:</h4>
							<input type="text" name="tarifa[]" id="tarifa"  value="<?php //echo $tarifa; ?>"/>
	                    </div>				   
				    </div>			
				</div>
				
				<div id="cliente">
					<h3 class="tabtit">DATOS DEL CLIENTE</h3>
					<div id="clientecont">
					    <div id="clientetipo">
					   
							<h4>Tipo Cliente:</h4>
							<select  name="cliente[]" id="clientetipo" />
							<option value="0">-- Seleccione Tipo de cliente -- </option>
							
							<?php  foreach ($tipoclientes as $tipo) : ?>

								
								<option value="<?php echo $tipo->getId(); ?>"> <?php echo $tipo->getDescripcion(); ?> </option>
							
							<?php  endforeach; ?>	
							</select>
						</div>
						<div id="clientecorporativo">
							<h4>Empresa:</h4>
							<select  name="cliente[]" id="clienteempresa" />
								<option value="0">--Seleccione una empresa --</option>
								<?php  foreach ($empresas as $empresa) : ?>

								
								<option value="<?php echo $empresa->getEmpresa(); ?>"> <?php echo $empresa->getNombre(); ?> </option>
							
							<?php  endforeach; ?>
							</select>
						</div>
						<div id="clienteservicio"></div>
						<div id="datosc"></div>
						
						<div id="clientenom">
							<h4 class="cambarnombre">Nombre Cliente:</h4>
							<input type="text" name="cliente[]" id="clienten" class="clienten"  value="<?php echo $cname; ?>"/>
						</div>
						<div id="clientedir">
							<h4>Direccion Origen:</h4>
							<input type="text" name="cliente[]" id="clientendir" value="<?php echo $direccion; ?>" />
						</div>
						<div id="clientedira">
							<h4>Direccion Destino:</h4>
							<input type="text" name="cliente[]" id="clientendira" value="<?php echo $direccionB; ?>" />
						</div>
						<div id="clientetel">
							<h4>Telefono:</h4>
							<input type="text" name="cliente[]" id="cliententel" value="<?php echo $cphone; ?>"  />
						</div>
						<div id="clientecom">
							<h4>Comentarios:</h4>
							<input type="text" name="cliente[]" id="clientencom" value="<?php echo $descripcion; ?>" />
						</div>
					</div>
				</div>
				<input id="btns_submit" class="btnazul confirm" type="submit"  value="Enviar">
			</form>
			
			<div id="servicios">
					<h3 class="tabtit">SERVICIOS</h3>
					<table>
						<tr>
							<td> # SERVICIO</td>
							<td  >UNIDAD</td>
							<td  >CLIENTE</td>
							<td >FECHA </td>
							<td >TARIFA</td>
							<td>DETALLE</td>
							
						</tr>
						<?php foreach ($servicios as $servicio): ?>
						<tr>
							
							<td><?php echo $servicio->getId(); ?></td>
							<td><?php $unidad = $servicio->obtenercodigounidad($servicio->getUnidadId()); echo $unidad; ?></td>
							<td><?php echo $servicio->getClientName(); ?></td>
							<td><?php echo $servicio->getUpdatedAt(); ?></td>
							<td>Q. <?php echo $servicio->getTarifaId(); ?></td>
							<td><a href="index.php/servicio/index?id=<?php echo $servicio->getId(); ?> ">Ver detalle</a></td>
							
							
							
							
						</tr>
					   <?php endforeach; ?>	
					</table>
				</div>
		</div>
		
		
		
			</div>
		</div>		
		
		<audio id="player" src="<?php echo image_path('../alertas/000870921_prev.mp3'); ?>"> </audio>
<a id="servicioSMS"  href="#contenido" title="Servicio">link</a>
<div id="contenido">

</div>


<div id="clientescorporativo" class="ventana" title="BUSCAR CLIENTE">
     
   
 
</div>
