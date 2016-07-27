<?php

/**
 * Chat filter form base class.
 *
 * @package    sistem-taxi
 * @subpackage filter
 * @author     Walter Rosales
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseChatFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'msg'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'timestamp' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'displayed' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'user_id'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'msg'       => new sfValidatorPass(array('required' => false)),
      'timestamp' => new sfValidatorPass(array('required' => false)),
      'displayed' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('chat_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Chat';
  }

  public function getFields()
  {
    return array(
      'id'        => 'Number',
      'user_id'   => 'Number',
      'msg'       => 'Text',
      'timestamp' => 'Text',
      'displayed' => 'Text',
    );
  }
}
