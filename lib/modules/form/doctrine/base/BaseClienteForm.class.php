<?php

/**
 * Cliente form base class.
 *
 * @method Cliente getObject() Returns the current form's model object
 *
 * @package    sistem-taxi
 * @subpackage form
 * @author     Walter Rosales
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseClienteForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'first_name'       => new sfWidgetFormInputText(),
      'last_name'        => new sfWidgetFormInputText(),
      'fecha_nacimiento' => new sfWidgetFormDateTime(),
      'genero'           => new sfWidgetFormChoice(array('choices' => array('Masculino' => 'Masculino', 'Femenino' => 'Femenino'))),
      'direccion'        => new sfWidgetFormTextarea(),
      'telefono'         => new sfWidgetFormInputText(),
      'celular'          => new sfWidgetFormInputText(),
      'identificacion'   => new sfWidgetFormInputText(),
      'created_at'       => new sfWidgetFormDateTime(),
      'updated_at'       => new sfWidgetFormDateTime(),
      'created_by'       => new sfWidgetFormInputText(),
      'updated_by'       => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'first_name'       => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'last_name'        => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'fecha_nacimiento' => new sfValidatorDateTime(array('required' => false)),
      'genero'           => new sfValidatorChoice(array('choices' => array(0 => 'Masculino', 1 => 'Femenino'), 'required' => false)),
      'direccion'        => new sfValidatorString(array('required' => false)),
      'telefono'         => new sfValidatorInteger(array('required' => false)),
      'celular'          => new sfValidatorInteger(array('required' => false)),
      'identificacion'   => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'created_at'       => new sfValidatorDateTime(array('required' => false)),
      'updated_at'       => new sfValidatorDateTime(array('required' => false)),
      'created_by'       => new sfValidatorInteger(array('required' => false)),
      'updated_by'       => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('cliente[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Cliente';
  }

}
