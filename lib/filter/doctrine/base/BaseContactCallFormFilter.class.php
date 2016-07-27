<?php

/**
 * ContactCall filter form base class.
 *
 * @package    sistem-taxi
 * @subpackage filter
 * @author     Walter Rosales
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseContactCallFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'construction_order_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ConstructionOrder'), 'add_empty' => true)),
      'constructor_order_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ConstructorOrder'), 'add_empty' => true)),
      'description'           => new sfWidgetFormFilterInput(),
      'created_at'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'status'                => new sfWidgetFormFilterInput(),
      'is_paymet'             => new sfWidgetFormFilterInput(),
      'is_credit'             => new sfWidgetFormFilterInput(),
      'is_contact'            => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'construction_order_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ConstructionOrder'), 'column' => 'id')),
      'constructor_order_id'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ConstructorOrder'), 'column' => 'id')),
      'description'           => new sfValidatorPass(array('required' => false)),
      'created_at'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'status'                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'is_paymet'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'is_credit'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'is_contact'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('contact_call_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ContactCall';
  }

  public function getFields()
  {
    return array(
      'id'                    => 'Number',
      'construction_order_id' => 'ForeignKey',
      'constructor_order_id'  => 'ForeignKey',
      'description'           => 'Text',
      'created_at'            => 'Date',
      'updated_at'            => 'Date',
      'status'                => 'Number',
      'is_paymet'             => 'Number',
      'is_credit'             => 'Number',
      'is_contact'            => 'Number',
    );
  }
}
