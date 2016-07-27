<?php

/**
 * Reservacion form base class.
 *
 * @method Reservacion getObject() Returns the current form's model object
 *
 * @package    sistem-taxi
 * @subpackage form
 * @author     Walter Rosales
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseReservacionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'client_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Cliente'), 'add_empty' => false)),
      'direccion_origen'  => new sfWidgetFormInputText(),
      'direccion_destino' => new sfWidgetFormInputText(),
      'fecha_servicio'    => new sfWidgetFormDateTime(),
      'hora'              => new sfWidgetFormDateTime(),
      'no_pasajeros'      => new sfWidgetFormInputText(),
      'tarifa_id'         => new sfWidgetFormInputText(),
      'unidad_id'         => new sfWidgetFormInputText(),
      'estado'            => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'client_id'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Cliente'))),
      'direccion_origen'  => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'direccion_destino' => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'fecha_servicio'    => new sfValidatorDateTime(array('required' => false)),
      'hora'              => new sfValidatorDateTime(array('required' => false)),
      'no_pasajeros'      => new sfValidatorInteger(array('required' => false)),
      'tarifa_id'         => new sfValidatorInteger(array('required' => false)),
      'unidad_id'         => new sfValidatorInteger(array('required' => false)),
      'estado'            => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('reservacion[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Reservacion';
  }

}
