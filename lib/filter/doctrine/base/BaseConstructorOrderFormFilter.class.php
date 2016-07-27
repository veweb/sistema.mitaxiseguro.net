<?php

/**
 * ConstructorOrder filter form base class.
 *
 * @package    sistem-taxi
 * @subpackage filter
 * @author     Walter Rosales
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseConstructorOrderFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'constructor_township_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ConstructorTownship'), 'add_empty' => true)),
      'construction_order_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ConstructionOrder'), 'add_empty' => true)),
      'is_accepted'             => new sfWidgetFormFilterInput(),
      'was_declined'            => new sfWidgetFormFilterInput(),
      'created_at'              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'is_accepted_terms'       => new sfWidgetFormFilterInput(),
      'is_payment'              => new sfWidgetFormFilterInput(),
      'is_contact'              => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'constructor_township_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ConstructorTownship'), 'column' => 'id')),
      'construction_order_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ConstructionOrder'), 'column' => 'id')),
      'is_accepted'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'was_declined'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'              => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'              => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'is_accepted_terms'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'is_payment'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'is_contact'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('constructor_order_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ConstructorOrder';
  }

  public function getFields()
  {
    return array(
      'id'                      => 'Number',
      'constructor_township_id' => 'ForeignKey',
      'construction_order_id'   => 'ForeignKey',
      'is_accepted'             => 'Number',
      'was_declined'            => 'Number',
      'created_at'              => 'Date',
      'updated_at'              => 'Date',
      'is_accepted_terms'       => 'Number',
      'is_payment'              => 'Number',
      'is_contact'              => 'Number',
    );
  }
}
