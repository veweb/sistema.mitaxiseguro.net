<?php 



$link = mysql_connect("db461977375.db.1and1.com","dbo461977375","locames2013");
if (!$link) {
    die('No pudo conectar: ' . mysql_error());
}

mysql_select_db("db461977375");

$ms = mysql_query("SELECT * FROM servicio WHERE  estado=1 && notificacion=0");
$tot = mysql_num_rows($ms);
$unidad = mysql_fetch_array($ms);
if(($tot > 0) && ($unidad['notificacion'] == 0)){

	echo "La Unidad ".$unidad['unidad_id']." Acepto el servicio #".$unidad['id'].".<br>";
	$act = mysql_query("UPDATE servicio SET notificacion = 1 WHERE unidad_id= ".$unidad['unidad_id']);
	//echo "UPDATE unidad_mensaje SET notificacion = 1 WHERE id_unidad= ".$unidad['id_unidad'];
}
else{
	echo "0";
}
mysql_close($link);




 ?>