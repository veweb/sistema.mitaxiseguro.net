<?php

$device_id = $_REQUEST['device_id'];
$link = mysql_connect("db461977375.db.1and1.com","dbo461977375","locames2013");
if (!$link) {
    die('No pudo conectar: ' . mysql_error());
}

mysql_select_db("db461977375");
$qq = mysql_query("SELECT * FROM unidad WHERE id_device='$device_id'");
$table = mysql_fetch_array($qq);
if($table['estado'] == 2){
   $query = mysql_query("SELECT * FROM servicio WHERE estado = 1 AND unidad_id=".$table['id']." Order by id Desc limit 1");
   $servicio = mysql_fetch_array($query);
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
}
if($table['estado'] == 1){
	echo "libre";
}
if($table['estado'] == 3){
	echo "fuera de servicio";
}



?> 