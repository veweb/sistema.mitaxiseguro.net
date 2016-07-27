<?php

/**
 * AsignacionUnidadPiloto form base class.
 *
 * @method AsignacionUnidadPiloto getObject() Returns the current form's model object
 *
 * @package    sistem-taxi
 * @subpackage form
 * @author     Walter Rosales
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAsignacionUnidadPilotoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'id_piloto'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Piloto'), 'add_empty' => true)),
      'descripcion' => new sfWidgetFormTextarea(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
      'created_by'  => new sfWidgetFormInputText(),
      'updated_by'  => new sfWidgetFormInputText(),
      'unidad_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Unidad'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'id_piloto'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Piloto'), 'required' => false)),
      'descripcion' => new sfValidatorString(array('required' => false)),
      'created_at'  => new sfValidatorDateTime(array('required' => false)),
      'updated_at'  => new sfValidatorDateTime(array('required' => false)),
      'created_by'  => new sfValidatorInteger(array('required' => false)),
      'updated_by'  => new sfValidatorInteger(array('required' => false)),
      'unidad_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Unidad'))),
    ));

    $this->widgetSchema->setNameFormat('asignacion_unidad_piloto[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AsignacionUnidadPiloto';
  }

}
