<?php

/**
 * AppVar filter form base class.
 *
 * @package    creaton
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseAppVarFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'var_key'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'var_value' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'var_key'   => new sfValidatorPass(array('required' => false)),
      'var_value' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('app_var_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AppVar';
  }

  public function getFields()
  {
    return array(
      'id'        => 'Number',
      'var_key'   => 'Text',
      'var_value' => 'Text',
    );
  }
}
