<?php

/**
 * AppVar form base class.
 *
 * @method AppVar getObject() Returns the current form's model object
 *
 * @package    LavishingBeaty
 * @subpackage form
 * @author     Tsvetan Himchev
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAppVarForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      'var_key'   => new sfWidgetFormInputText(),
      'var_value' => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'var_key'   => new sfValidatorString(array('max_length' => 255)),
      'var_value' => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('app_var[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AppVar';
  }

}
