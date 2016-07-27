<?php

/**
 * Empresa form base class.
 *
 * @method Empresa getObject() Returns the current form's model object
 *
 * @package    sistem-taxi
 * @subpackage form
 * @author     Walter Rosales
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseEmpresaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'empresa'    => new sfWidgetFormInputHidden(),
      'nombre'     => new sfWidgetFormInputText(),
      'direccion'  => new sfWidgetFormInputText(),
      'telefono'   => new sfWidgetFormInputText(),
      'email'      => new sfWidgetFormInputText(),
      'contacto'   => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
      'codigo'     => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'empresa'    => new sfValidatorChoice(array('choices' => array($this->getObject()->get('empresa')), 'empty_value' => $this->getObject()->get('empresa'), 'required' => false)),
      'nombre'     => new sfValidatorString(array('max_length' => 50)),
      'direccion'  => new sfValidatorString(array('max_length' => 50)),
      'telefono'   => new sfValidatorString(array('max_length' => 8)),
      'email'      => new sfValidatorString(array('max_length' => 40)),
      'contacto'   => new sfValidatorString(array('max_length' => 50)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
      'codigo'     => new sfValidatorInteger(),
    ));

    $this->widgetSchema->setNameFormat('empresa[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Empresa';
  }

}
