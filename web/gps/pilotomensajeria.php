<?php
$id_device = $_REQUEST['id_device'];

//echo $lat;
$link = mysql_connect("db461977375.db.1and1.com","dbo461977375","locames2013");
if (!$link) {
    die('No pudo conectar: ' . mysql_error());
}

mysql_select_db("db461977375");
//echo "SELECT * FROM  mensaje_unidadtablet WHERE id_device='$id_device' AND estado = 0 ORDER BY mensaje_id DESC";
$qq = mysql_query("SELECT * FROM  mensaje_unidadtablet WHERE id_device='$id_device' AND estado = 0 ORDER BY mensaje_id DESC");
//echo "SELECT * FROM  mensaje_unidadtablet WHERE id_device='$id_device' AND estado = 0";
// echo mysql_num_ows($qq);

$table = db_result_to_array($qq);
$total = mysql_num_rows($qq);
// echo $total;
// print_r($table);
for($i=0;$i<=$total;$i++){
   	//echo $table[$i]['mensaje_id']."<br>";
     //echo "SELECT * FROM unidad_mensaje WHERE id_unidad = ".$table['id']." AND estado=0";
     //echo "SELECT * FROM mensaje WHERE id = ".$table[$i]['mensaje_id'];
     $ms = mysql_query("SELECT * FROM mensaje WHERE id = ".$table[$i]['mensaje_id']);
	 
  	 while ($fila = mysql_fetch_array($ms, MYSQL_NUM)) {
  	 	    
		 
		    if($i == 0){
		    	$cadena = $fila[5]."#".$fila[0]."#".$fila[1]."#". $fila[4]."#".$table[$i]['fecha'];   
		    }
			else {
			    $cadena = $cadena.",".$fila[5]."#". $fila[0]."#".$fila[1]."#". $fila[4]."#".$table[$i]['fecha'];  
			}   
	}
            
}
mysql_free_result($ms);
echo utf8_encode($cadena);



function db_result_to_array($result)
{
   $res_array = array();

   for ($count=0; $row = @mysql_fetch_array($result); $count++)
     $res_array[$count] = $row;

   return $res_array;
}
