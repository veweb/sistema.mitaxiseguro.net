<?php

/**
 * reservacion actions.
 *
 * @package    sistem-taxi
 * @subpackage reservacion
 * @author     Walter Rosales
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class reservacionActions extends sfActions
{
	public function executeIndex(sfWebRequest $request)
  {
    $this->reservaciones = Doctrine::getTable('Reservacion')
		      ->createQuery()
			  ->Where('estado = ?',0)
			  ->orderBy('id DESC')
              ->execute();
		
	
  }
  public function executeCompletarservicio(sfWebRequest $request){
  	 $this->id =$request->getParameter('actionidreservacion');
	 $this->cliente =$request->getParameter('cliente');
  }
  public function executeActivar(sfWebRequest $request){
  	$detalle = $request->getParameter('detalleServicio');
	$id= $request->getParameter('idcliente');
	$q = Doctrine_Query::create()
    ->update('Reservacion')
    ->set('estado', '?', 1)
	->set('detalle', '?', $detalle)
    ->where('id = ?', $id)
    ->execute();
		$this->redirect('reservacion/index');
	
  }
	   
	
}
