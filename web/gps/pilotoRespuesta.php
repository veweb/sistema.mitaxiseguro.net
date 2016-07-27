<?php
$resp = $_REQUEST['respuesta'];
$id_device = $_REQUEST['id_device'];
$id_servicio = $_REQUEST['id_service'];

//echo $lat;
$link = mysql_connect("db461977375.db.1and1.com","dbo461977375","locames2013");
if (!$link) {
    die('No pudo conectar: ' . mysql_error());
}

mysql_select_db("db461977375");


//echo $resp;
if($resp == 1){
   $qq = mysql_query("SELECT * FROM unidad  WHERE id_device='$id_device';");
    //echo "SELECT * FROM unidad WHERE id_device='$id_device';";
   // echo mysql_num_rows($qq);
   $table = mysql_fetch_array($qq, MYSQL_ASSOC);


     //echo "SELECT * FROM unidad_mensaje WHERE id_unidad = ".$table['id']." AND estado=0";
     $ms = mysql_query("SELECT * FROM envio_unidad WHERE unidad_id = ".$table['id']." AND (estado=0 OR estado=3) AND servicio_id = ".$id_servicio);
    // echo  "SELECT * FROM envio_unidad WHERE unidad_id = ".$table['id']." AND (estado=0 OR estado=3) AND servicio_id = ".$id_servicio;
    $servicio = mysql_fetch_array($ms);
    $tot = mysql_num_rows($ms);
   // echo "Total: ".$tot." resp=".$resp;
   if($tot != 0 && $resp == 1){
   	    // Muestra que el mensaje fue tomado      	
         $q=mysql_query("CALL PAC_Asigna_Unidad_Servicio (".$table['id'].",".$id_servicio.")");	
         $sv = mysql_query("SELECT * FROM servicio WHERE unidad_id = ".$servicio['unidad_id']." AND estado=1 AND id= ".$servicio['servicio_id']." ORDER BY id DESC");
	       // echo "SELECT * FROM servicio WHERE unidad_id = ".$servicio['unidad_id']." AND estado=1 AND id= ".$servicio['servicio_id']." ORDER BY id DESC";
	       $servicio = mysql_fetch_array($sv);
	       // elimina todas las demas unidades solicitando el servicio 
	       $d =mysql_query("UPDATE  envio_unidad SET estado=10 WHERE estado = 0 AND unidad_id <> ".$table['id']."  AND servicio_id=".$servicio['id'] );
	       $d2 =mysql_query("UPDATE  envio_unidad SET estado=10 WHERE estado = 3 AND unidad_id <> ".$table['id']."   AND servicio_id=".$servicio['id'] );
	  
	       // echo "DELETE * FROM envio_unidad WHERE estado = 0  AND servicio_id=".$servicio['id'];
         $consulta = mysql_query("SELECT * FROM envio_unidad WHERE estado =1 AND  unidad_id = ".$table['id']." AND  servicio_id = ".$id_servicio);
         $tota = mysql_num_rows($consulta);
         if($tota == 1){
            $cliente = mysql_fetch_array($ms);
            echo "Datos del Cliente: \n";
	          echo "Nombre: ".$servicio['client_name']."\n";
	          echo "Telefono: ".$servicio['client_phone']."\n";
		        echo "Servicio #:".$servicio['id']."   \n";
	          echo "Ubicacion: ".$servicio['client_origen']."\n";
	          echo "Destino: ".$servicio['client_destino']."\n";
	          echo "Detalles del Servicio: \n ";
		        echo "Precio: Q".$servicio['tarifa_id']."\n";
	          echo $servicio['description']."\n";
		        echo "Fecha: ".$servicio['created_at']."\n";
          }
          else{
             echo "false";
          }
     }
    else {
    	//$q=mysql_query("UPDATE  envio_mensaje SET estado=2 WHERE id_unidad = ".$table['id']);	
	 echo "false";
		 //$d =mysql_query("DELETE * FROM unidad_mensaje WHERE estado = 3 AND id_unidad != ".$table['id']);
     }

    }
else{
	//echo "respuesta: ".$resp;
	$qq = mysql_query("SELECT * FROM unidad WHERE id_device='$id_device'");
   // echo "SELECT * FROM unidad WHERE id='$id_device'";
    //echo mysql_num_rows($qq);
    $table = mysql_fetch_array($qq);
	
	$ms = mysql_query("SELECT * FROM envio_unidad WHERE unidad_id = ".$table['id']." AND estado=0  AND servicio_id = ".$id_servicio." AND servicio_id = ".$id_servicio);
     //echo  "SELECT * FROM envio_unidad WHERE unidad_id = ".$table['id']." AND estado=0";
    $servicio = mysql_fetch_array($ms);
     //echo "SELECT * FROM unidad WHERE id_device='".$id_device."'";
    //echo mysql_num_rows($qq);
    $table = mysql_fetch_array($qq);



    $q=mysql_query("UPDATE  envio_unidad SET estado=2 WHERE unidad_id = ".$servicio['unidad_id']." AND servicio_id=".$servicio['servicio_id']);	
    //$d =mysql_query("DELETE * FROM unidad_mensaje WHERE estado = 3 ");

   // echo "UPDATE  envio_unidad SET estado=2 WHERE unidad_id = ".$servicio['unidad_id']." AND servicio_id=".$servicio['servicio_id'];
    //echo "UPDATE  envio_unidad SET estado=2 WHERE unidad_id = ".$servicio['unidad_id']." AND servicio_id=".$servicio['servicio_id'];	
	

}
mysql_close($link);
?>