<?php 



$link = mysql_connect("db461977375.db.1and1.com","dbo461977375","locames2013");
if (!$link) {
    die('No pudo conectar: ' . mysql_error());
}

mysql_select_db("db461977375");

$ms = mysql_query("SELECT * FROM respuesta_ts WHERE  type=2 && user_id=".$_REQUEST['id_user']." Order by id DESC");
$tot = mysql_num_rows($ms);
//$respuesta = mysql_fetch_array($ms);
$table = db_result_to_array($ms);
//echo "SELECT * FROM respuesta_ts WHERE  type=2 && user_id=".$_REQUEST['id_user']." Order by id DESC";
  ///foreach ($servicios as $servicioss => $servicio) {
for($i=0;$i<$tot;$i++){
	echo "[".$table[$i]['fecha']."]"; echo "<br>";
	echo $table[$i]['respuesta']; echo "<br>";
	//echo "UPDATE unidad_mensaje SET notificacion = 1 WHERE id_unidad= ".$unidad['id_unidad'];
	}

mysql_close($link);
function db_result_to_array($result)
{
   $res_array = array();

   for ($count=0; $row = @mysql_fetch_array($result); $count++)
     $res_array[$count] = $row;

   return $res_array;
}



 ?>