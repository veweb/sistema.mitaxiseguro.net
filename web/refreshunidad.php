<?php 



$link = mysql_connect("130.211.184.73","root","lQN76ptAq");
if (!$link) {
    die('No pudo conectar: ' . mysql_error());
}

mysql_select_db("db461977375");

$ms = mysql_query("select u.codigo as unidad, s.id as servicio, s.unidad_id as id from  servicio s inner join unidad u on s.unidad_id = u.id where s.estado = 1 and s.notificacion=0");
$tot = mysql_num_rows($ms);
$unidad = mysql_fetch_array($ms);
if(($tot > 0) && ($unidad['notificacion'] == 0)){

	echo "La Unidad ".$unidad['unidad']." Acepto el servicio #".$unidad['servicio'].".<br>";
	$act = mysql_query("UPDATE servicio SET notificacion = 1 WHERE unidad_id= ".$unidad['id']);
	//echo "UPDATE unidad_mensaje SET notificacion = 1 WHERE id_unidad= ".$unidad['unidad'];
}
else{
	echo "0";
}
mysql_close($link);




 ?>