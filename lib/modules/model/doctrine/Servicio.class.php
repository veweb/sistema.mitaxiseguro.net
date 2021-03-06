<?php

/**
 * Servicio
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    sistem-taxi
 * @subpackage model
 * @author     Walter Rosales
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Servicio extends BaseServicio
{
	
	public function obtenercodigounidad($id){
		
		$data = Doctrine::getTable('Unidad')
		      ->createQuery()
			  ->Where('id = ?',$id)
			  ->execute();
		return $data[0]->getCodigo();
		
	}
}
