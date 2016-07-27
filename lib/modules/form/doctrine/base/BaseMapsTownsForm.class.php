<?php

/**
 * MapsTowns form base class.
 *
 * @method MapsTowns getObject() Returns the current form's model object
 *
 * @package    sistem-taxi
 * @subpackage form
 * @author     Walter Rosales
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseMapsTownsForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      'code'      => new sfWidgetFormInputText(),
      'name'      => new sfWidgetFormInputText(),
      'state_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('MapsStates'), 'add_empty' => false)),
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
      'state_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('MapsStates'))),
      'location'  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'zip'       => new sfValidatorInteger(),
      'published' => new sfValidatorInteger(array('required' => false)),
      'sync'      => new sfValidatorInteger(array('required' => false)),
      'version'   => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('maps_towns[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'MapsTowns';
  }

}
