<?php

/**
 * Unidad filter form base class.
 *
 * @package    sistem-taxi
 * @subpackage filter
 * @author     Walter Rosales
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseUnidadFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_device'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'codigo'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_marca'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Marca'), 'add_empty' => true)),
      'lat'        => new sfWidgetFormFilterInput(),
      'longi'      => new sfWidgetFormFilterInput(),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'tipo_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Tipo'), 'add_empty' => true)),
      'placa'      => new sfWidgetFormFilterInput(),
      'anio_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Anio'), 'add_empty' => true)),
      'linea_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Linea'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id_device'  => new sfValidatorPass(array('required' => false)),
      'codigo'  => new sfValidatorPass(array('required' => false)),
      'id_marca'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Marca'), 'column' => 'id')),
      'lat'        => new sfValidatorPass(array('required' => false)),
      'longi'      => new sfValidatorPass(array('required' => false)),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'tipo_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Tipo'), 'column' => 'id')),
      'placa'      => new sfValidatorPass(array('required' => false)),
      'anio_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Anio'), 'column' => 'id')),
      'linea_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Linea'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('unidad_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Unidad';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'id_device'  => 'Text',
      'codigo'     => 'Text',
      'id_marca'   => 'ForeignKey',
      'lat'        => 'Text',
      'longi'      => 'Text',
      'created_at' => 'Date',
      'updated_at' => 'Date',
      'tipo_id'    => 'ForeignKey',
      'placa'      => 'Text',
      'anio_id'    => 'ForeignKey',
      'linea_id'   => 'ForeignKey',
    );
  }
}
