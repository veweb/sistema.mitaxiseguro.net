<?php

/**
 * Viaje form base class.
 *
 * @method Viaje getObject() Returns the current form's model object
 *
 * @package    sistem-taxi
 * @subpackage form
 * @author     Walter Rosales
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseServicioForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'unidad_id'       => new sfWidgetFormTextarea(),
      'tarifa_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('UnidadMensaje'), 'add_empty' => false)),
      'created_at'        => new sfWidgetFormDateTime(),
      'update_at'         => new sfWidgetFormDateTime(),
      'created_by'        => new sfWidgetFormInputText(),
      'updated_by'        => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'descripcion'       => new sfValidatorString(array('required' => false)),
      'mensaje_unidad_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('UnidadMensaje'))),
      'created_at'        => new sfValidatorDateTime(array('required' => false)),
      'update_at'         => new sfValidatorDateTime(array('required' => false)),
      'created_by'        => new sfValidatorInteger(array('required' => false)),
      'updated_by'        => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('viaje[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Viaje';
  }

}