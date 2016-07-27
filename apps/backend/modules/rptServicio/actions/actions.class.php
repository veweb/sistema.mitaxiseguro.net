<?php

/**
 * dashboard actions.
 *
 * @package    sistem-taxi
 * @subpackage rpt_serivicio
 * @author     Walter Rosales
 * @version    SVN: $Id: actions.class.php 23810 2014-10-16 20:38:44Z Kris.Wallsmith $
 */
class rptServicioActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
  	//$this->servicios = Doctrine::getTable('Servicio')->findByEstado(4);
	$q = Doctrine_Query::create()
       ->from('Servicio s')
       ->where('s.unidad_id <> ?', 0)
	   ->OrderBy('s.created_at DESC');
	$this->servicios= $q->limit(800)->execute();   // se esta mostrando solo los ultimos 3000 servicios 
	//echo count($this->servicios);
	
	/*$q = Doctrine_Core::getTable('Servicio')
				->createQuery('s')
				->innerJoin('s.Unidad u')
				->andWhere('s.unidad_id = u.id')
	            ->orderBy('c.created_at ASC');
	$this->servicios = $q->execute();
	 * 
  	*/
  	/*
  	$query = "SELECT `u`.codigo,`s`.client_name,`s`.client_origen,`s`.client_destino,`s`.Description,`s`.tarifa_id,`s`.created_at FROM `servicio` `s` \n"
    . "INNER JOIN `unidad` `u`\n"
    . "ON `s`.unidad_id = `u`.id";
  	$connection = Doctrine_Manager::connection();
	$statement = $connection->execute($query);
	$statement->execute();
	$resultset = $statement->fetch(PDO::FETCH_OBJ);
	$this->servicios = $resultset;
	 
	 */
	
	//echo $resultset->codigo;
	//echo count($resultset);
	//exit;
  }
  
}
  