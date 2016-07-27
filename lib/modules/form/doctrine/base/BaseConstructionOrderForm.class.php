<?php

/**
 * ConstructionOrder form base class.
 *
 * @method ConstructionOrder getObject() Returns the current form's model object
 *
 * @package    sistem-taxi
 * @subpackage form
 * @author     Walter Rosales
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseConstructionOrderForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'first_name'    => new sfWidgetFormInputText(),
      'last_name'     => new sfWidgetFormInputText(),
      'email'         => new sfWidgetFormInputText(),
      'phone'         => new sfWidgetFormInputText(),
      'address'       => new sfWidgetFormTextarea(),
      'township_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Township'), 'add_empty' => false)),
      'age'           => new sfWidgetFormInputText(),
      'client_id'     => new sfWidgetFormInputText(),
      'type'          => new sfWidgetFormInputText(),
      'comments'      => new sfWidgetFormTextarea(),
      'event'         => new sfWidgetFormInputText(),
      'order_address' => new sfWidgetFormTextarea(),
      'payment_type'  => new sfWidgetFormTextarea(),
      'created_at'    => new sfWidgetFormDateTime(),
      'updated_at'    => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'first_name'    => new sfValidatorString(array('max_length' => 255)),
      'last_name'     => new sfValidatorString(array('max_length' => 255)),
      'email'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'phone'         => new sfValidatorString(array('max_length' => 255)),
      'address'       => new sfValidatorString(),
      'township_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Township'))),
      'age'           => new sfValidatorInteger(array('required' => false)),
      'client_id'     => new sfValidatorString(array('max_length' => 255)),
      'type'          => new sfValidatorString(array('max_length' => 255)),
      'comments'      => new sfValidatorString(array('required' => false)),
      'event'         => new sfValidatorString(array('max_length' => 255)),
      'order_address' => new sfValidatorString(),
      'payment_type'  => new sfValidatorString(),
      'created_at'    => new sfValidatorDateTime(),
      'updated_at'    => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('construction_order[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ConstructionOrder';
  }

}
