<?php

/**
 * Colaborador form base class.
 *
 * @method Colaborador getObject() Returns the current form's model object
 *
 * @package    sistem-taxi
 * @subpackage form
 * @author     Walter Rosales
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseColaboradorForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'codigo'           => new sfWidgetFormInputText(),
      'nombre_completo'    => new sfWidgetFormTextArea(),
      'destino'          => new sfWidgetFormInputText(),
      'inicio'           => new sfWidgetFormInputText(),
      'comentarios'      => new sfWidgetFormTextArea(),
      'hora_pico_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('HoraPico'), 'add_empty' => false)),
      'empresa_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Empresa'), 'add_empty' => false)),
      'created_at'       => new sfWidgetFormDateTime(),
      'update_at'        => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'codigo'           => new sfValidatorString(array('max_length' => 10)),
      'nombre_completo'    => new sfValidatorString(array('max_length' => 100)),
      'destino'          => new sfValidatorString(array('max_length' => 100)),
      'inicio'           => new sfValidatorString(array('max_length' => 100)),
      'comentarios'      => new sfValidatorString(array('max_length' => 100)),
      'hora_pico_id'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('HoraPico'))),
      'empresa_id'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Empresa'))),
      'created_at'       => new sfValidatorDateTime(),
      'update_at'        => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('colaborador[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Colaborador';
  }

}
