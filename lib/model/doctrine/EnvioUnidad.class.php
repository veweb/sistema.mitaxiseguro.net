<?php

/**
 * UnidadMensaje
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    sistem-taxi
 * @subpackage model
 * @author     Walter Rosales
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class EnvioUnidad extends BaseEnvioUnidad
{
public function mensajeUnidades($idunidad,$idservicio){
		
		//echo "DATOS: ".$idunidad." ".$idtarifa." ".$name." ".$origen." ".$destino." ".$telefono." ".$comment;	
		//exit;	
		   
		$mensaje = new envioUnidad();
		
		$mensaje->setUnidadId($idunidad);
		$mensaje->setServicioId($idservicio);
		$mensaje->setEstado(0);
		
		$mensaje->setUpdatedAt(date("Y-m-d H:i:s", (strtotime ("-2 Hours"))));
		$mensaje->setCreatedAt(date("Y-m-d H:i:s", (strtotime ("-2 Hours"))));
		$mensaje->save();
		
		   
		
		
	}	
	
}
