<?php
$user_id = $_REQUEST['user_id'];
$respuesta = $_REQUEST['respuesta'];
$mensaje_id = $_REQUEST['mensaje_id'];
//echo $lat;
$link = mysql_connect("db461977375.db.1and1.com","dbo461977375","locames2013");
if (!$link) {
    die('No pudo conectar: ' . mysql_error());
}

mysql_select_db("db461977375");
echo "INSERT INTO  respuesta_ts (id,respuesta,user_id,type,fecha) values(null,'".$respuesta."',".$user_id.",0,DATE_SUB(NOW(),INTERVAL 1 HOUR)) ";
//echo "SELECT * FROM unidad_mensaje WHERE id_unidad = ".$table['id']." AND estado=0";
$ms = mysql_query("INSERT INTO  respuesta_ts (id,respuesta,mensaje_id,user_id,type,fecha) values(null,'".$respuesta."',".$mensaje_id.",".$user_id.",0,DATE_SUB(NOW(),INTERVAL 1 HOUR)) ");
//echo "SELECT * FROM mensaje WHERE unidad_id = ".$table['mensaje_id'];
// echo  "SELECT * FROM envio_unidad WHERE unidad_id = ".$table['id']." AND (estado=0 OR estado=3) AND servicio_id = ".$id_servicio;
//$mensajes = mysql_fetch_array($ms);
$mu = mysql_query("UPDATE mensaje_unidadtablet SET estado = 1 WHERE mensaje_id= ".$mensaje_id);
$mi = mysql_query("UPDATE respuesta_ts  SET type = 2 WHERE mensaje_id= ".$mensaje_id);

mysql_close($link);

?>