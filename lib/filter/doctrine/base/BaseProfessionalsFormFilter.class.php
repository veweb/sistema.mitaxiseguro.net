<?php

/**
 * Professionals filter form base class.
 *
 * @package    sistem-taxi
 * @subpackage filter
 * @author     Walter Rosales
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseProfessionalsFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                       => new sfWidgetFormFilterInput(),
      'name'                     => new sfWidgetFormFilterInput(),
      'email'                    => new sfWidgetFormFilterInput(),
      'phone'                    => new sfWidgetFormFilterInput(),
      'address'                  => new sfWidgetFormFilterInput(),
      'professional_category_id' => new sfWidgetFormFilterInput(),
      'state_id'                 => new sfWidgetFormFilterInput(),
      'city_id'                  => new sfWidgetFormFilterInput(),
      'zone_id'                  => new sfWidgetFormFilterInput(),
      'published'                => new sfWidgetFormFilterInput(),
      'created_by'               => new sfWidgetFormFilterInput(),
      'updated_by'               => new sfWidgetFormFilterInput(),
      'created_at'               => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'               => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'id'                       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'name'                     => new sfValidatorPass(array('required' => false)),
      'email'                    => new sfValidatorPass(array('required' => false)),
      'phone'                    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'address'                  => new sfValidatorPass(array('required' => false)),
      'professional_category_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'state_id'                 => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'city_id'                  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'zone_id'                  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'published'                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_by'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'updated_by'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'               => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'               => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('professionals_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Professionals';
  }

  public function getFields()
  {
    return array(
      'id'                       => 'Number',
      'name'                     => 'Text',
      'email'                    => 'Text',
      'phone'                    => 'Number',
      'address'                  => 'Text',
      'professional_category_id' => 'Number',
      'state_id'                 => 'Number',
      'city_id'                  => 'Number',
      'zone_id'                  => 'Number',
      'published'                => 'Number',
      'created_by'               => 'Number',
      'updated_by'               => 'Number',
      'created_at'               => 'Date',
      'updated_at'               => 'Date',
    );
  }
}
