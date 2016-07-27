<?php

/**
 * ConstructionOrder filter form base class.
 *
 * @package    sistem-taxi
 * @subpackage filter
 * @author     Walter Rosales
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseConstructionOrderFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'first_name'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'last_name'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'email'         => new sfWidgetFormFilterInput(),
      'phone'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'address'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'township_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Township'), 'add_empty' => true)),
      'age'           => new sfWidgetFormFilterInput(),
      'client_id'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'type'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'comments'      => new sfWidgetFormFilterInput(),
      'event'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'order_address' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'payment_type'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'first_name'    => new sfValidatorPass(array('required' => false)),
      'last_name'     => new sfValidatorPass(array('required' => false)),
      'email'         => new sfValidatorPass(array('required' => false)),
      'phone'         => new sfValidatorPass(array('required' => false)),
      'address'       => new sfValidatorPass(array('required' => false)),
      'township_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Township'), 'column' => 'id')),
      'age'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'client_id'     => new sfValidatorPass(array('required' => false)),
      'type'          => new sfValidatorPass(array('required' => false)),
      'comments'      => new sfValidatorPass(array('required' => false)),
      'event'         => new sfValidatorPass(array('required' => false)),
      'order_address' => new sfValidatorPass(array('required' => false)),
      'payment_type'  => new sfValidatorPass(array('required' => false)),
      'created_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('construction_order_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ConstructionOrder';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'first_name'    => 'Text',
      'last_name'     => 'Text',
      'email'         => 'Text',
      'phone'         => 'Text',
      'address'       => 'Text',
      'township_id'   => 'ForeignKey',
      'age'           => 'Number',
      'client_id'     => 'Text',
      'type'          => 'Text',
      'comments'      => 'Text',
      'event'         => 'Text',
      'order_address' => 'Text',
      'payment_type'  => 'Text',
      'created_at'    => 'Date',
      'updated_at'    => 'Date',
    );
  }
}
