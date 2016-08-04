<?php 



$link = mysql_connect("130.211.184.73","root","lQN76ptAq");
if (!$link) {
    die('No pudo conectar: ' . mysql_error());
}

mysql_select_db("db461977375");

$ms = mysql_query("SELECT * FROM reservacion WHERE  estado=0");
$tot = mysql_num_rows($ms);
echo "Reservaciones: <a href=/index.php/reservacion/index >( ".$tot." )</a>";
mysql_close($link);




 ?>