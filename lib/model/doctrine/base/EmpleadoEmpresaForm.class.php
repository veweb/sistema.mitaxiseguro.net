<?php

/**
 * EmpleadoEmpresa form.
 *
 * @package    sistem-taxi
 * @subpackage form
 * @author     Walter Rosales
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class EmpleadoEmpresaForm extends BaseEmpleadoEmpresaForm
{
  public function configure()
  {
  	unset($this['created_at'],$this['update_at']);
  }
}
