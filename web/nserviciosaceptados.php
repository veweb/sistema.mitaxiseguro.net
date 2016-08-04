<?php 



$link = mysql_connect("130.211.184.73","root","lQN76ptAq");
if (!$link) {
    die('No pudo conectar: ' . mysql_error());
}

mysql_select_db("db461977375");

$ms = mysql_query("SELECT * FROM servicio WHERE  estado=1 &&  notificacion=1");
$tot = mysql_num_rows($ms);
$unidad = mysql_fetch_array($ms);
echo "Servicios Aceptados: <a href=http://sistema.mitaxiseguro.net/index.php/servicio/listservices >(".$tot.")</a>";
mysql_close($link);




 ?>