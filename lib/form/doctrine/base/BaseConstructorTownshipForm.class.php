<?php

/**
 * ConstructorTownship form base class.
 *
 * @method ConstructorTownship getObject() Returns the current form's model object
 *
 * @package    sistem-taxi
 * @subpackage form
 * @author     Walter Rosales
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseConstructorTownshipForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'constructor_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Constructor'), 'add_empty' => false)),
      'township_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Township'), 'add_empty' => false)),
      'flag'           => new sfWidgetFormInputText(),
      'created_at'     => new sfWidgetFormDateTime(),
      'updated_at'     => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'constructor_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Constructor'))),
      'township_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Township'))),
      'flag'           => new sfValidatorInteger(array('required' => false)),
      'created_at'     => new sfValidatorDateTime(),
      'updated_at'     => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('constructor_township[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ConstructorTownship';
  }

}
