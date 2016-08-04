<?php 

header('Access-Control-Allow-Origin: *');

$link = mysql_connect("130.211.184.73","root","lQN76ptAq");
if (!$link) {
    die('No pudo conectar: ' . mysql_error());
}

mysql_select_db("db461977375");

$ms = mysql_query("SELECT * FROM servicio WHERE  estado=0 Or estado=1 Or estado=4 ORDER BY created_at DESC LIMIT 20");

$tot = mysql_num_rows($ms);

$i=0;
$n=1;
  ///foreach ($servicios as $servicioss => $servicio) {
    while($servicio = mysql_fetch_array($ms)){
    	if($servicio['estado'] == 0){
    		$query = mysql_query("SELECT * FROM envio_unidad WHERE servicio_id= ".$servicio['id']."");
		
			$tot = mysql_num_rows($query);
			
           echo " <div id=row-".$n." class='row-service serEspera'><div id='icono' class='iconoEspera'></div>servicio #".$servicio['id']."   -   Cliente: ".utf8_encode($servicio['client_name'])."      -       ".$servicio['created_at']."  -  Servicio en espera    <div id=noti></div></div>";	  
		   echo "<div id=row-".$n."-sub  class='dina cerrar' > <p><h1>SERVICIO: <a  href=/index.php/servicio/index?id=".$servicio['id']."  title='Detalle de servicio'>".$servicio['id']." </a></h1></p><p>unidades que se envio: ".$tot."</p> <ul>";
		   while ($fila = mysql_fetch_array($query)) {
		         $codigo = muestraCodigoUnidad($fila['unidad_id']);
		         echo "<li>".$codigo."</li>";
			     if($fila['estado'] == 1)
		         $unidad = muestraCodigoUnidad($fila['unidad_id']);
		   }
		   echo "</ul><a href=/index.php/servicio/eliminar?id=".$servicio['id']." >Eliminar Servicio</a><div id=".$n." class=cerrar >Cerrar</div></div>"; }
        if($servicio['estado'] == 1){
        	$query = mysql_query("SELECT * FROM envio_unidad WHERE servicio_id= ".$servicio['id']."");
		
			$tot = mysql_num_rows($query);
			
           echo " <div id=row-".$n." class='row-service serTomado'><div id='icono' class='iconoTomado'></div>servicio #".$servicio['id']."   -   Cliente: ".utf8_encode($servicio['client_name'])."      -       ".$servicio['created_at']."  -  Servicio Asignado    <div id=noti></div></div>";	  
		   echo "<div id=row-".$n."-sub  class='dina cerrar'> <p><h1>SERVICIO: <a href=/index.php/servicio/index?id=".$servicio['id']."  title='Detalle de servicio'>".$servicio['id']." </a></h1></p><p>unidades que se envio: ".$tot."</p> <ul>";
		   while ($fila = mysql_fetch_array($query)) {
		         $codigo = muestraCodigoUnidad($fila['unidad_id']);
		         echo "<li>".$codigo."</li>";
			     if($fila['estado'] == 1)
		         $unidad = muestraCodigoUnidad($fila['unidad_id']);
		   }
		   echo "</ul> <p>Unidad Asignada: <b>".$unidad."</b></p><a href=/index.php/servicio/eliminar?id=".$servicio['id']." >Eliminar Servicio</a><div id=".$n." class=cerrar  >Cerrar</div></div>";
		   }
        if($servicio['estado'] == 4){
           $query = mysql_query("SELECT * FROM envio_unidad WHERE servicio_id= ".$servicio['id']."");
		
			$tot = mysql_num_rows($query);
			
           echo " <div id=row-".$n." class='row-service serSinRespuesta'><div id='icono' class='iconoSinRespuesta'></div>servicio #".$servicio['id']."   -   Cliente: ".utf8_encode($servicio['client_name'])."      -       ".$servicio['created_at']."  -  Servicio Eliminado   <div id=noti></div></div>";	  
		   echo "<div id=row-".$n."-sub class='dina cerrar'> <p><h1>SERVICIO: <a href=/index.php/servicio/index?id=".$servicio['id']."  title='Detalle de servicio'>".$servicio['id']." </a></h1></p><p>unidades que se envio: ".$tot."</p> <ul>";
		   while ($fila = mysql_fetch_array($query)) {
		   	     $codigo = muestraCodigoUnidad($fila['unidad_id']);
		         echo "<li>".$codigo."</li>";
			     //if($fila['estado'] == 1)
		         //$unidad =muestraCodigoUnidad($fila['unidad_id']);
		   }
		   echo "</ul><div id=".$n." class=cerrar >Cerrar</div></div>";   }
   // echo $n.".- Servicio # ".$servicio['id']." Cliente: ".$servicio['client_name']." Fecha: ".$servicio['created_at']." <a href=http://sistema.mitaxiseguro.net/index.php/servicio/index?id="
	//     .$servicio['id']."  target=blank >Detalle</a> <a href=http://sistema.mitaxiseguro.net/index.php/servicio/eliminar?id="
	 //     .$servicio['id']." >X</a> .<br>";
    $i++;	
	$n++;  
  }
function muestraCodigoUnidad($id){
	
	$ms = mysql_query("SELECT * FROM unidad WHERE id =".$id);
	$unidad = mysql_fetch_array($ms);
	return $unidad['codigo'];
	
}
	

	
mysql_close($link);

 ?>
 <script type="text/javascript">
 
 
  $(".row-service").click(function(){
  
   
    var id = '#'+$(this).attr('id')+'-sub';
   
      $(id).addClass('dina2');
 

  });
  $(".cerrar").click(function(){
 	 	var id = '#row-'+$(this).attr('id')+'-sub';
    	$(id).removeClass('dina2');
    });

</script>
