<?php

/**
 * BannerTranslation form base class.
 *
 * @method BannerTranslation getObject() Returns the current form's model object
 *
 * @package    LavishingBeaty
 * @subpackage form
 * @author     Tsvetan Himchev
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseBannerTranslationForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'image'        => new sfWidgetFormInputText(),
      'link'         => new sfWidgetFormTextarea(),
      'title'        => new sfWidgetFormTextarea(),
      'body'         => new sfWidgetFormTextarea(),
      'is_published' => new sfWidgetFormInputCheckbox(),
      'position'     => new sfWidgetFormInputText(),
      'lang'         => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'image'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'link'         => new sfValidatorString(array('required' => false)),
      'title'        => new sfValidatorString(array('required' => false)),
      'body'         => new sfValidatorString(array('required' => false)),
      'is_published' => new sfValidatorBoolean(array('required' => false)),
      'position'     => new sfValidatorInteger(array('required' => false)),
      'lang'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('lang')), 'empty_value' => $this->getObject()->get('lang'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('banner_translation[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'BannerTranslation';
  }

}
