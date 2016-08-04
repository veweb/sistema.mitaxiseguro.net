<?php

/**
 * Colaborador filter form base class.
 *
 * @package    sistem-taxi
 * @subpackage filter
 * @author     Walter Rosales
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseColaboradorFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'codigo'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'nombre_completo'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'destino'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'inicio'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'comentarios'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'hora_pico'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'empresa'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Empresa'), 'add_empty' => true)),
      'created_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'update_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'codigo'           => new sfValidatorPass(array('required' => false)),
      'primer_nombre'    => new sfValidatorPass(array('required' => false)),
      'segundo_nombre'   => new sfValidatorPass(array('required' => false)),
      'primer_apellido'  => new sfValidatorPass(array('required' => false)),
      'segundo_apellido' => new sfValidatorPass(array('required' => false)),
      'destino'          => new sfValidatorPass(array('required' => false)),
      'inicio'           => new sfValidatorPass(array('required' => false)),
      'comentarios'      => new sfValidatorPass(array('required' => false)),
      'hora_pico'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'empresa'          => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Empresa'), 'column' => 'empresa')),
      'created_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'update_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('colaborador_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Colaborador';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'codigo'           => 'Text',
      'nombre_completo'    => 'Text',
      'destino'          => 'Text',
      'inicio'           => 'Text',
      'comentarios'           => 'Text',
      'hora_pico_id'        => 'ForeignKey',
      'empresa_id'          => 'ForeignKey',
      'created_at'       => 'Date',
      'update_at'        => 'Date',
    );
  }
}
