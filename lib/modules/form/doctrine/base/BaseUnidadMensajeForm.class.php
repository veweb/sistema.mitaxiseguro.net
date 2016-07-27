<?php

/**
 * UnidadMensaje form base class.
 *
 * @method UnidadMensaje getObject() Returns the current form's model object
 *
 * @package    sistem-taxi
 * @subpackage form
 * @author     Walter Rosales
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseUnidadMensajeForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'id_unidad'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Unidad'), 'add_empty' => false)),
      'id_tarifa'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Tarifa'), 'add_empty' => false)),
      'texto'      => new sfWidgetFormInputText(),
      'client_name'      => new sfWidgetFormInputText(),
      'client_origen'      => new sfWidgetFormInputText(),
      'client_destino'      => new sfWidgetFormInputText(),
      'client_telefono'      => new sfWidgetFormInputText(),
      'estado'     => new sfWidgetFormInputText(),
      'notificacion'     => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
      'created_by' => new sfWidgetFormInputText(),
      'updated_by' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'id_unidad'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Unidad'))),
      'id_tarifa'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Tarifa'))),
      'texto'      => new sfValidatorString(array('max_length' => 255)),
      'client_name'      => new sfValidatorString(array('max_length' => 255)),
      'client_origen'      => new sfValidatorString(array('max_length' => 255)),
      'client_destino'      => new sfValidatorString(array('max_length' => 255)),
      'client_telefono'      => new sfValidatorString(array('max_length' => 50)),
      'estado'     => new sfValidatorInteger(),
      'notificacion'     => new sfValidatorInteger(),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(array('required' => false)),
      'created_by' => new sfValidatorInteger(array('required' => false)),
      'updated_by' => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('unidad_mensaje[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'UnidadMensaje';
  }

}
