<?php

/**
 * ContactCall form base class.
 *
 * @method ContactCall getObject() Returns the current form's model object
 *
 * @package    sistem-taxi
 * @subpackage form
 * @author     Walter Rosales
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseContactCallForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                    => new sfWidgetFormInputHidden(),
      'construction_order_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ConstructionOrder'), 'add_empty' => false)),
      'constructor_order_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ConstructorOrder'), 'add_empty' => false)),
      'description'           => new sfWidgetFormInputText(),
      'created_at'            => new sfWidgetFormDateTime(),
      'updated_at'            => new sfWidgetFormDateTime(),
      'status'                => new sfWidgetFormInputText(),
      'is_paymet'             => new sfWidgetFormInputText(),
      'is_credit'             => new sfWidgetFormInputText(),
      'is_contact'            => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                    => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'construction_order_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ConstructionOrder'))),
      'constructor_order_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ConstructorOrder'))),
      'description'           => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'created_at'            => new sfValidatorDateTime(array('required' => false)),
      'updated_at'            => new sfValidatorDateTime(array('required' => false)),
      'status'                => new sfValidatorInteger(array('required' => false)),
      'is_paymet'             => new sfValidatorInteger(array('required' => false)),
      'is_credit'             => new sfValidatorInteger(array('required' => false)),
      'is_contact'            => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('contact_call[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ContactCall';
  }

}
