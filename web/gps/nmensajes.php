<?php 

$id_device = $_REQUEST['id_device'];

$link = mysql_connect("130.211.184.73","root","lQN76ptAq");
if (!$link) {
    die('No pudo conectar: ' . mysql_error());
}

mysql_select_db("dbo461977375");

$qq = mysql_query("SELECT * FROM  mensaje_unidadtablet WHERE id_device='$id_device' AND estado = 0 ORDER BY mensaje_id DESC");
//echo "SELECT * FROM  mensaje_unidadtablet WHERE id_device='$id_device' AND estado = 0 ORDER BY mensaje_id DESC";
$tot = mysql_num_rows($qq);
//$respuesta = mysql_fetch_array($ms);
$table = db_result_to_array($qq);

if(count($table) != 0)
echo count($table);

//echo "SELECT * FROM respuesta_ts WHERE  type=2 && user_id=".$_REQUEST['id_user']." Order by id DESC";
  ///foreach ($servicios as $servicioss => $servicio) {ec

mysql_close($link);
function db_result_to_array($result)
{
   $res_array = array();

   for ($count=0; $row = @mysql_fetch_array($result); $count++)
     $res_array[$count] = $row;

   return $res_array;
}
 ?>