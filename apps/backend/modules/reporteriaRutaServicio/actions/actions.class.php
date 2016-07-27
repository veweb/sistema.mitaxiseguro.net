<?php

/**
 * dashboard actions.
 *
 * @package    sistem-taxi
 * @subpackage reporteriaRutaServicio
 * @author     Walter Rosales
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class reporteriaRutaServicioActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
  	$servicio = $request->getParameter('servicio_id');
  	$this->ruta = Doctrine::getTable('rutaServicio')->findByServicioId($servicio);
  	
  }
  
}
  