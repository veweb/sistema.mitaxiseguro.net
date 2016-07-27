<?php

/**
 * Reservacion filter form base class.
 *
 * @package    sistem-taxi
 * @subpackage filter
 * @author     Walter Rosales
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseReservacionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'client_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Cliente'), 'add_empty' => true)),
      'direccion_origen'  => new sfWidgetFormFilterInput(),
      'direccion_destino' => new sfWidgetFormFilterInput(),
      'fecha_servicio'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'hora'              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'no_pasajeros'      => new sfWidgetFormFilterInput(),
      'tarifa_id'         => new sfWidgetFormFilterInput(),
      'unidad_id'         => new sfWidgetFormFilterInput(),
      'estado'            => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'client_id'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Cliente'), 'column' => 'id')),
      'direccion_origen'  => new sfValidatorPass(array('required' => false)),
      'direccion_destino' => new sfValidatorPass(array('required' => false)),
      'fecha_servicio'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'hora'              => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'no_pasajeros'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'tarifa_id'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'unidad_id'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'estado'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('reservacion_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Reservacion';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'client_id'         => 'ForeignKey',
      'direccion_origen'  => 'Text',
      'direccion_destino' => 'Text',
      'fecha_servicio'    => 'Date',
      'hora'              => 'Date',
      'no_pasajeros'      => 'Number',
      'tarifa_id'         => 'Number',
      'unidad_id'         => 'Number',
      'estado'            => 'Number',
    );
  }
}
