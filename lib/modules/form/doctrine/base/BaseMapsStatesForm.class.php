<?php

/**
 * MapsStates form base class.
 *
 * @method MapsStates getObject() Returns the current form's model object
 *
 * @package    sistem-taxi
 * @subpackage form
 * @author     Walter Rosales
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseMapsStatesForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      'code'      => new sfWidgetFormInputText(),
      'name'      => new sfWidgetFormInputText(),
      'region'    => new sfWidgetFormChoice(array('choices' => array('Centro' => 'Centro', 'Oriente' => 'Oriente', 'Occidente' => 'Occidente'))),
      'location'  => new sfWidgetFormInputText(),
      'zip'       => new sfWidgetFormInputText(),
      'published' => new sfWidgetFormInputText(),
      'sync'      => new sfWidgetFormInputText(),
      'version'   => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'code'      => new sfValidatorInteger(array('required' => false)),
      'name'      => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'region'    => new sfValidatorChoice(array('choices' => array(0 => 'Centro', 1 => 'Oriente', 2 => 'Occidente'), 'required' => false)),
      'location'  => new sfValidatorString(array('max_length' => 255)),
      'zip'       => new sfValidatorInteger(),
      'published' => new sfValidatorInteger(array('required' => false)),
      'sync'      => new sfValidatorInteger(array('required' => false)),
      'version'   => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('maps_states[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'MapsStates';
  }

}
