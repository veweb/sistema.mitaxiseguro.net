<?php

/**
 * Smilies filter form base class.
 *
 * @package    sistem-taxi
 * @subpackage filter
 * @author     Walter Rosales
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseSmiliesFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'image_code' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'path'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'image_code' => new sfValidatorPass(array('required' => false)),
      'path'       => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('smilies_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Smilies';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'image_code' => 'Text',
      'path'       => 'Text',
    );
  }
}
