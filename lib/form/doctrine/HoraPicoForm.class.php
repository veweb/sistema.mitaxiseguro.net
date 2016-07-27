<?php

/**
 * HoraPico form.
 *
 * @package    sistem-taxi
 * @subpackage form
 * @author     Walter Rosales
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class HoraPicoForm extends BaseHoraPicoForm
{
  public function configure()
  {
  	unset($this['created_at'],$this['updated_at']);
  }
}
