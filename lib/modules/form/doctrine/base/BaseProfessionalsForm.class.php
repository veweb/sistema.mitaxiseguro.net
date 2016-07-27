<?php

/**
 * Professionals form base class.
 *
 * @method Professionals getObject() Returns the current form's model object
 *
 * @package    sistem-taxi
 * @subpackage form
 * @author     Walter Rosales
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseProfessionalsForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                       => new sfWidgetFormInputText(),
      'name'                     => new sfWidgetFormInputText(),
      'email'                    => new sfWidgetFormInputText(),
      'phone'                    => new sfWidgetFormInputText(),
      'address'                  => new sfWidgetFormTextarea(),
      'professional_category_id' => new sfWidgetFormInputText(),
      'state_id'                 => new sfWidgetFormInputText(),
      'city_id'                  => new sfWidgetFormInputText(),
      'zone_id'                  => new sfWidgetFormInputText(),
      'published'                => new sfWidgetFormInputText(),
      'created_by'               => new sfWidgetFormInputText(),
      'updated_by'               => new sfWidgetFormInputText(),
      'created_at'               => new sfWidgetFormDateTime(),
      'updated_at'               => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                       => new sfValidatorInteger(array('required' => false)),
      'name'                     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'email'                    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'phone'                    => new sfValidatorInteger(array('required' => false)),
      'address'                  => new sfValidatorString(array('required' => false)),
      'professional_category_id' => new sfValidatorInteger(array('required' => false)),
      'state_id'                 => new sfValidatorInteger(array('required' => false)),
      'city_id'                  => new sfValidatorInteger(array('required' => false)),
      'zone_id'                  => new sfValidatorInteger(array('required' => false)),
      'published'                => new sfValidatorInteger(array('required' => false)),
      'created_by'               => new sfValidatorInteger(array('required' => false)),
      'updated_by'               => new sfValidatorInteger(array('required' => false)),
      'created_at'               => new sfValidatorDateTime(array('required' => false)),
      'updated_at'               => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('professionals[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Professionals';
  }

}
