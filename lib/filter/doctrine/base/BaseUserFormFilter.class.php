<?php

/**
 * User filter form base class.
 *
 * @package    creaton
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseUserFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'parent_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Parent'), 'add_empty' => true)),
      'email'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'password'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'remember_key' => new sfWidgetFormFilterInput(),
      'name'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'role'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'is_active'    => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'created_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'parent_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Parent'), 'column' => 'id')),
      'email'        => new sfValidatorPass(array('required' => false)),
      'password'     => new sfValidatorPass(array('required' => false)),
      'remember_key' => new sfValidatorPass(array('required' => false)),
      'name'         => new sfValidatorPass(array('required' => false)),
      'role'         => new sfValidatorPass(array('required' => false)),
      'is_active'    => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'created_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('user_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'User';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'parent_id'    => 'ForeignKey',
      'email'        => 'Text',
      'password'     => 'Text',
      'remember_key' => 'Text',
      'name'         => 'Text',
      'role'         => 'Text',
      'is_active'    => 'Boolean',
      'created_at'   => 'Date',
      'updated_at'   => 'Date',
    );
  }
}
