<?php

/**
 * dashboard actions.
 *
 * @package    sistem-taxi
 * @subpackage unidad
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class unidad_no_reportadaActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
     $this->unidades = Doctrine::getTable('unidad')->findAll();
  

  }
  
}
