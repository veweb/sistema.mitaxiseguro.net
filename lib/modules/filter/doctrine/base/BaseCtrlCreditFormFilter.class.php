<?php

/**
 * CtrlCredit filter form base class.
 *
 * @package    sistem-taxi
 * @subpackage filter
 * @author     Walter Rosales
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCtrlCreditFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'constructor_order_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ConstructorOrder'), 'add_empty' => true)),
      'status'               => new sfWidgetFormFilterInput(),
      'bank_id'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Bank'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'constructor_order_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ConstructorOrder'), 'column' => 'id')),
      'status'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'bank_id'              => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Bank'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('ctrl_credit_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CtrlCredit';
  }

  public function getFields()
  {
    return array(
      'id'                   => 'Number',
      'constructor_order_id' => 'ForeignKey',
      'status'               => 'Number',
      'bank_id'              => 'ForeignKey',
    );
  }
}
