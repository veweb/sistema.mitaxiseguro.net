<?php

/**
 * chatcliente actions.
 *
 * @package    sistem-taxi
 * @subpackage chatcliente
 * @author     Walter Rosales
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class chatclienteActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->user = Doctrine::getTable('ChatUser')->findAll();
  }
}
