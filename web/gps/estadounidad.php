<?php
$resp = $_REQUEST['estado'];
$id_device = $_REQUEST['id_device'];

//echo $lat;
$link = mysql_connect("db461977375.db.1and1.com","dbo461977375","locames2013");
if (!$link) {
    die('No pudo conectar: ' . mysql_error());
}

mysql_select_db("db461977375");

$qq = mysql_query("SELECT * FROM unidad WHERE id_device='$id_device'");
    //echo "SELECT * FROM unidad WHERE id_device='$id_device'";
    //echo mysql_num_rows($qq);
   $table = mysql_fetch_array($qq);
   echo "Unidad: ".$table['codigo'];//." Device: "; //.$id_device;
//$
if($resp == 1){
   $qq = mysql_query("SELECT * FROM unidad WHERE id_device='$id_device'");
    //echo "SELECT * FROM unidad WHERE id_device='$id_device'";
    //echo mysql_num_rows($qq);
   $table = mysql_fetch_array($qq);
   echo "Unidad: ".$table['codigo'];//." Device: ";//.$id_device;

  
	
      $q=mysql_query("UPDATE  unidad SET estado=1 , updated_at= DATE_SUB(NOW(),INTERVAL 2 HOUR) WHERE id = ".$table['id']);	
      //$mensaje = mysql_fetch_array($ms);
      //echo $mensaje['texto'];
     

    }

if($resp == 2){
   $qq = mysql_query("SELECT * FROM unidad WHERE id_device='$id_device'");
    //echo "SELECT * FROM unidad WHERE id_device='$id_device'";
    //echo mysql_num_rows($qq);
   $table = mysql_fetch_array($qq);


  
	
      $q=mysql_query("UPDATE  unidad SET estado=2 , updated_at= DATE_SUB(NOW(),INTERVAL 2 HOUR) WHERE id = ".$table['id']);	
      //$mensaje = mysql_fetch_array($ms);
      //echo $mensaje['texto'];
     

    }

if($resp == 3){
   $qq = mysql_query("SELECT * FROM unidad WHERE id_device='$id_device'");
    //echo "SELECT * FROM unidad WHERE id_device='$id_device'";
    //echo mysql_num_rows($qq);
   $table = mysql_fetch_array($qq);
   echo "Unidad: ".$table['codigo'];//." Device: ";//.$id_device;

  
	
      $q=mysql_query("UPDATE  unidad SET estado=3 , updated_at= DATE_SUB(NOW(),INTERVAL 2 HOUR) WHERE id = ".$table['id']);	
      //$mensaje = mysql_fetch_array($ms);
      //echo $mensaje['texto'];
     

    }


mysql_close($link);
?>