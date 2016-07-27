<?php

/**
 * CtrlCredit form base class.
 *
 * @method CtrlCredit getObject() Returns the current form's model object
 *
 * @package    sistem-taxi
 * @subpackage form
 * @author     Walter Rosales
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCtrlCreditForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                   => new sfWidgetFormInputHidden(),
      'constructor_order_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ConstructorOrder'), 'add_empty' => false)),
      'status'               => new sfWidgetFormInputText(),
      'bank_id'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Bank'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'                   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'constructor_order_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ConstructorOrder'))),
      'status'               => new sfValidatorInteger(array('required' => false)),
      'bank_id'              => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Bank'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ctrl_credit[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CtrlCredit';
  }

}
