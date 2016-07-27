<?php

/**
 * MapsStates filter form base class.
 *
 * @package    sistem-taxi
 * @subpackage filter
 * @author     Walter Rosales
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseMapsStatesFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'code'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'name'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'region'    => new sfWidgetFormChoice(array('choices' => array('' => '', 'Centro' => 'Centro', 'Oriente' => 'Oriente', 'Occidente' => 'Occidente'))),
      'location'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'zip'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'published' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'sync'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'version'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'code'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'name'      => new sfValidatorPass(array('required' => false)),
      'region'    => new sfValidatorChoice(array('required' => false, 'choices' => array('Centro' => 'Centro', 'Oriente' => 'Oriente', 'Occidente' => 'Occidente'))),
      'location'  => new sfValidatorPass(array('required' => false)),
      'zip'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'published' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'sync'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'version'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('maps_states_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'MapsStates';
  }

  public function getFields()
  {
    return array(
      'id'        => 'Number',
      'code'      => 'Number',
      'name'      => 'Text',
      'region'    => 'Enum',
      'location'  => 'Text',
      'zip'       => 'Number',
      'published' => 'Number',
      'sync'      => 'Number',
      'version'   => 'Number',
    );
  }
}
