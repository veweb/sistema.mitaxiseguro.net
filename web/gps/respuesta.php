<?php
$id_device = $_REQUEST['id_device'];

//echo $lat;
$link = mysql_connect("db461977375.db.1and1.com","dbo461977375","locames2013");
if (!$link) {
    die('No pudo conectar: ' . mysql_error());
}

mysql_select_db("db461977375");
//echo "SELECT * FROM unidad_mensaje WHERE id_unidad = ".$table['id']." AND estado=0";
$ms = mysql_query("SELECT * FROM respuesta WHERE mensaje_id = ".$_REQUEST['id']);
//echo "SELECT * FROM mensaje WHERE unidad_id = ".$table['mensaje_id'];
// echo  "SELECT * FROM envio_unidad WHERE unidad_id = ".$table['id']." AND (estado=0 OR estado=3) AND servicio_id = ".$id_servicio;
//$mensajes = mysql_fetch_array($ms);
$tot = mysql_num_rows($ms);
while ($fila = mysql_fetch_array($ms, MYSQL_NUM)) {
       echo  $fila[2];  
}
mysql_free_result($ms);
mysql_close($link);
?>