<?php
	
	$ruta = $_POST['ruta'];
	$id_device = $_POST['id_device'];
	$no_servicio	 = 3214; //$_POST['no_servicio'];
	$link = mysql_connect("db461977375.db.1and1.com","dbo461977375","locames2013");
	if (!$link) {
		
    	die('No pudo conectar: ' . mysql_error());
	}

	mysql_select_db("db461977375");
	$rutaquery = mysql_query("SELECT * FROM unidad WHERE id_device = '".$id_device."'");
	$existe = mysql_num_rows($rutaquery);
	if($existe != 0){
		$rutaAct = mysql_fetch_array($rutaquery);
		$rutaquery = mysql_query("SELECT * FROM ruta_servicio WHERE servicio_id = $no_servicio");
		$rutaExiste = mysql_num_rows($rutaquery);
		if($rutaExiste == 0){
			$id = $rutaAct['id'];
			$q = mysql_query("INSERT INTO ruta_servicio (id,servicio_id,unidad_id,ruta,fecha) VALUES(null,$no_servicio,$id,'$ruta',now())");
		}
		else{
			$query = mysql_query("SELECT * FROM ruta_servicio WHERE servicio_id=$no_servicio");
			$rutA = mysql_fetch_array($query);
			$ruta = "&".$ruta. $rutA['ruta'];
			$updateruta = mysql_query("UPDATE ruta_servicio SET ruta='$ruta', fecha=now() WHERE servicio_id=$no_servicio");
			echo "UPDATE ruta_servicio SET ruta=$ruta, fecha=now() WHERE servicio_id=$no_servicio";
		}
	}
	
	
	
	
	
	
?>