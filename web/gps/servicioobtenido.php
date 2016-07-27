<?php


$sv = mysql_query("SELECT * FROM servicio WHERE unidad_id = ".$servicio['unidad_id']." AND estado=1 AND id= ".$servicio['servicio_id']." ORDER BY id DESC");
$servicio = mysql_fetch_array($sv);
         echo "Datos del Cliente: \n";
	     echo "Nombre: ".$servicio['client_name']."\n";
	     echo "Telefono: ".$servicio['client_phone']."\n";
		 echo "Servicio #:".$servicio['id']."   \n";
	     echo "Ubicacion: ".$servicio['client_origen']."\n";
	     echo "Destino: ".$servicio['client_destino']."\n";
	     echo "Detalles del Servicio: \n ";
		 echo "Precio: Q".$servicio['tarifa_id']."\n";
	     echo $servicio['description']."\n";
		 echo "Fecha: ".$servicio['created_at']."\n";
     
?>