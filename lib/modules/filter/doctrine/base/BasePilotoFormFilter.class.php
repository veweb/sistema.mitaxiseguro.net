<?php

/**
 * Piloto filter form base class.
 *
 * @package    sistem-taxi
 * @subpackage filter
 * @author     Walter Rosales
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePilotoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'first_name'       => new sfWidgetFormFilterInput(),
      'last_name'        => new sfWidgetFormFilterInput(),
      'phone'            => new sfWidgetFormFilterInput(),
      'direccion'        => new sfWidgetFormFilterInput(),
      'email'            => new sfWidgetFormFilterInput(),
      'licencia'         => new sfWidgetFormFilterInput(),
      'dpi'              => new sfWidgetFormFilterInput(),
      'cedula'           => new sfWidgetFormFilterInput(),
      'fecha_nacimiento' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'created_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'created_by'       => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'first_name'       => new sfValidatorPass(array('required' => false)),
      'last_name'        => new sfValidatorPass(array('required' => false)),
      'phone'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'direccion'        => new sfValidatorPass(array('required' => false)),
      'email'            => new sfValidatorPass(array('required' => false)),
      'licencia'         => new sfValidatorPass(array('required' => false)),
      'dpi'              => new sfValidatorPass(array('required' => false)),
      'cedula'           => new sfValidatorPass(array('required' => false)),
      'fecha_nacimiento' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'created_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'created_by'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('piloto_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Piloto';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'first_name'       => 'Text',
      'last_name'        => 'Text',
      'phone'            => 'Number',
      'direccion'        => 'Text',
      'email'            => 'Text',
      'licencia'         => 'Text',
      'dpi'              => 'Text',
      'cedula'           => 'Text',
      'fecha_nacimiento' => 'Date',
      'created_at'       => 'Date',
      'updated_at'       => 'Date',
      'created_by'       => 'Number',
    );
  }
}
