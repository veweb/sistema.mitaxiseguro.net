<?php
$lat = $_REQUEST['latitude'];
$long = $_REQUEST['longitude'];
$id_device = $_REQUEST['id_device'];

echo "device: ".$id_device;
$link = mysql_connect("db461977375.db.1and1.com","dbo461977375","locames2013");
if (!$link) {
    die('No pudo conectar: ' . mysql_error());
}

mysql_select_db("db461977375");
$pp = mysql_query("SELECT * FROM unidad WHERE id_device = '".$id_device."'");
$existe = mysql_num_rows($pp);

if($existe == 0){
	
	$nuevo = mysql_query("INSERT INTO `unidad` (`id`, `id_device`, `id_marca`, `lat`, `longi`, `created_at`, `updated_at`, `tipo_id`, `placa`, `anio_id`, `linea_id`,'estado')
VALUES
	(NULL, '$id_device', 1, '', '', DATE_SUB(NOW(),INTERVAL 2 HOUR),DATE_SUB(NOW(),INTERVAL 2 HOUR), 2, NULL, 1, 1,0);
");
	
}
else {
	


$q=mysql_query("UPDATE  unidad SET lat='$lat',longi='$long',id_device='$id_device', updated_at=DATE_SUB(NOW(),INTERVAL 2 HOUR) WHERE
                id_device='".$id_device."'");
//echo $id_device;				
//echo "UPDATE  unidad SET lat='$lat',longi='$long',id_device='$id_device', updated_at= '".date( "H-M-S", mktime(date("M")-2,0,0,0,0,0))."' WHERE
 //              id_device='".$id_device."' <br>";				
//echo "UPDATE  unidad SET lat='$lat',longi='$long',id_device='$id_device', updated_at= now() WHERE
     //           id_device='".$id_device."'";
//echo "INSERT INTO  posicion (lat,longi,id_device,created_at) VAlUES('$lat','$long',1,now()) ";
//echo "Mensaje desde la Web. Resultado: ".$q;

//echo "ESTE ES EL ID QUE NECESITO TAMAR FOTO JUAN CARLOS: ".$id_device;

$qq = mysql_query("SELECT * FROM unidad WHERE id_device='$id_device'");
//echo "SELECT * FROM unidad WHERE id_device='$id_device'";
//echo mysql_num_rows($qq);
$table = mysql_fetch_array($qq);
if($table['estado'] == 1){
$ms = mysql_query("SELECT * FROM envio_unidad WHERE unidad_id = ".$table['id']." AND estado=0");
//echo "SELECT * FROM envio_unidad WHERE unidad_id = ".$table['id']." AND estado=0";
$tot = mysql_num_rows($ms);
//echo "total= ".$tot;
if($tot != 0){
   $mensaje = mysql_fetch_array($ms);
   //echo "SELECT * FROM servicio WHERE id=".$mensaje['servicio_id'];	
   $servicio = mysql_query("SELECT * FROM servicio WHERE id=".$mensaje['servicio_id']."");	
   $serv =mysql_fetch_array($servicio);
   
   echo $serv['id'].",Tarifa: Q ".$serv['tarifa_id']." \n ".$serv['description']." \n  Fecha: ".$serv['created_at'];
}
else {
	 //echo "0";
	$ms = mysql_query("SELECT * FROM envio_unidad WHERE unidad_id = ".$table['id']." AND estado=3");
    //echo "SELECT * FROM envio_unidad WHERE unidad_id = ".$table['id']." AND estado=3";
    $tot = mysql_num_rows($ms);
    if($tot != 0){
       $mensaje = mysql_fetch_array($ms);
       //echo "SELECT * FROM servicio WHERE id=".$mensaje['servicio_id'];	
       $servicio = mysql_query("SELECT * FROM servicio WHERE id=".$mensaje['servicio_id']."");	
       $serv =mysql_fetch_array($servicio);
       echo $serv['id'].",Tarifa: Q ".$serv['tarifa_id']." \n  ".$serv['description']." \n"." Fecha: ".$serv['created_at'];
    }
}
}// fin del if existe
}
mysql_close($link);
?>
