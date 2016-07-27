<?php 



$link = mysql_connect("db461977375.db.1and1.com","dbo461977375","locames2013");
if (!$link) {
    die('No pudo conectar: ' . mysql_error());
}

mysql_select_db("db461977375");

$ms = mysql_query("SELECT * FROM reservacion WHERE  estado=0");
$tot = mysql_num_rows($ms);
echo "Reservaciones: <a href=/index.php/reservacion/index >( ".$tot." )</a>";
mysql_close($link);




 ?>