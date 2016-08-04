<?php
$posicion[] = $_REQUEST['posicion[]'];

//echo $lat;
$link = mysql_connect("130.211.184.73","root","lQN76ptAq");
if (!$link) {
    die('No pudo conectar: ' . mysql_error());
}

mysql_select_db("db461977375");
mysql_close($link);
?>