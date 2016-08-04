<?php

/**
 * asignacion module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage asignacion
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: helper.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseAsignacionGeneratorHelper extends sfModelGeneratorHelper
{
  public function getUrlForAction($action)
  {
    return 'list' == $action ? 'asignacion_unidad_piloto' : 'asignacion_unidad_piloto_'.$action;
  }
}
