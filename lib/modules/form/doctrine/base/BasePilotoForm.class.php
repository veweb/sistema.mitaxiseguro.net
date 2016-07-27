<?php

/**
 * Piloto form base class.
 *
 * @method Piloto getObject() Returns the current form's model object
 *
 * @package    sistem-taxi
 * @subpackage form
 * @author     Walter Rosales
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePilotoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'first_name'       => new sfWidgetFormInputText(),
      'last_name'        => new sfWidgetFormInputText(),
      'phone'            => new sfWidgetFormInputText(),
      'direccion'        => new sfWidgetFormInputText(),
      'email'            => new sfWidgetFormInputText(),
      'licencia'         => new sfWidgetFormInputText(),
      'dpi'              => new sfWidgetFormInputText(),
      'cedula'           => new sfWidgetFormInputText(),
      'fecha_nacimiento' => new sfWidgetFormDate(),
      'created_at'       => new sfWidgetFormDateTime(),
      'updated_at'       => new sfWidgetFormDateTime(),
      'created_by'       => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'first_name'       => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'last_name'        => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'phone'            => new sfValidatorInteger(array('required' => false)),
      'direccion'        => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'email'            => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'licencia'         => new sfValidatorString(array('max_length' => 25, 'required' => false)),
      'dpi'              => new sfValidatorString(array('max_length' => 25, 'required' => false)),
      'cedula'           => new sfValidatorString(array('max_length' => 25, 'required' => false)),
      'fecha_nacimiento' => new sfValidatorDate(array('required' => false)),
      'created_at'       => new sfValidatorDateTime(array('required' => false)),
      'updated_at'       => new sfValidatorDateTime(array('required' => false)),
      'created_by'       => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('piloto[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Piloto';
  }

}
