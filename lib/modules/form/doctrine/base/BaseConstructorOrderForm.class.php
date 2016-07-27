<?php

/**
 * ConstructorOrder form base class.
 *
 * @method ConstructorOrder getObject() Returns the current form's model object
 *
 * @package    sistem-taxi
 * @subpackage form
 * @author     Walter Rosales
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseConstructorOrderForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                      => new sfWidgetFormInputHidden(),
      'constructor_township_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ConstructorTownship'), 'add_empty' => false)),
      'construction_order_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ConstructionOrder'), 'add_empty' => false)),
      'is_accepted'             => new sfWidgetFormInputText(),
      'was_declined'            => new sfWidgetFormInputText(),
      'created_at'              => new sfWidgetFormDateTime(),
      'updated_at'              => new sfWidgetFormDateTime(),
      'is_accepted_terms'       => new sfWidgetFormInputText(),
      'is_payment'              => new sfWidgetFormInputText(),
      'is_contact'              => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'constructor_township_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ConstructorTownship'))),
      'construction_order_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ConstructionOrder'))),
      'is_accepted'             => new sfValidatorInteger(array('required' => false)),
      'was_declined'            => new sfValidatorInteger(array('required' => false)),
      'created_at'              => new sfValidatorDateTime(),
      'updated_at'              => new sfValidatorDateTime(),
      'is_accepted_terms'       => new sfValidatorInteger(array('required' => false)),
      'is_payment'              => new sfValidatorInteger(array('required' => false)),
      'is_contact'              => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('constructor_order[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ConstructorOrder';
  }

}
