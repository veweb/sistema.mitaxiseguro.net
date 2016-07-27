<?php

/**
 * Unidad form base class.
 *
 * @method Unidad getObject() Returns the current form's model object
 *
 * @package    sistem-taxi
 * @subpackage form
 * @author     Walter Rosales
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseUnidadForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'id_device'  => new sfWidgetFormInputText(),
      'codigo'     => new sfWidgetFormInputText(),
      'id_marca'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Marca'), 'add_empty' => false)),
      'lat'        => new sfWidgetFormInputText(),
      'longi'      => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
      'tipo_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Tipo'), 'add_empty' => false)),
      'placa'      => new sfWidgetFormInputText(),
      'anio_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Anio'), 'add_empty' => false)),
      'linea_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Linea'), 'add_empty' => false)),
      'estado'     => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
    
	));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'id_device'  => new sfValidatorString(array('max_length' => 50)),
      'codigo'     => new sfValidatorString(array('max_length' => 50)),
      'id_marca'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Marca'))),
      'lat'        => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'longi'      => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'created_at' => new sfValidatorDateTime(array('required' => false)),
      'updated_at' => new sfValidatorDateTime(array('required' => false)),
      'tipo_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Tipo'))),
      'placa'      => new sfValidatorString(array('max_length' => 25, 'required' => false)),
      'anio_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Anio'))),
      'linea_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Linea'))),
      'estado'   => new sfValidatorString(array('max_length' => 11)),
   
    ));

    $this->widgetSchema->setNameFormat('unidad[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Unidad';
  }

}
