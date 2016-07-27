<?php

/**
 * UnidadMensaje filter form base class.
 *
 * @package    sistem-taxi
 * @subpackage filter
 * @author     Walter Rosales
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseUnidadMensajeFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_unidad'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Unidad'), 'add_empty' => true)),
      'id_tarifa'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Tarifa'), 'add_empty' => true)),
      'texto'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'client_name'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'client_origen'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'client_destino'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'client_telefono'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'estado'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'created_by' => new sfWidgetFormFilterInput(),
      'updated_by' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'id_unidad'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Unidad'), 'column' => 'id')),
      'id_tarifa'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Tarifa'), 'column' => 'id')),
      'texto'      => new sfValidatorPass(array('required' => false)),
      'client_name'      => new sfValidatorPass(array('required' => false)),
      'client_destino'      => new sfValidatorPass(array('required' => false)),
      'client_origen'      => new sfValidatorPass(array('required' => false)),
      'client_destino'      => new sfValidatorPass(array('required' => false)),
      'client_telefono'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'created_by' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'updated_by' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('unidad_mensaje_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'UnidadMensaje';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'id_unidad'  => 'ForeignKey',
      'id_tarifa'  => 'ForeignKey',
      'texto'      => 'Text',
      'client_name'      => 'Text',
      'client_origen'      => 'Text',
      'client_destino'      => 'Text',
      'client_telefono'      => 'Text',
      'estado'     => 'Number',
      'created_at' => 'Date',
      'updated_at' => 'Date',
      'created_by' => 'Number',
      'updated_by' => 'Number',
    );
  }
}
