<?php

/**
 * Slider_imageTranslation form base class.
 *
 * @method Slider_imageTranslation getObject() Returns the current form's model object
 *
 * @package    LavishingBeaty
 * @subpackage form
 * @author     Tsvetan Himchev
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseSlider_imageTranslationForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'image'        => new sfWidgetFormInputText(),
      'link'         => new sfWidgetFormTextarea(),
      'is_published' => new sfWidgetFormInputCheckbox(),
      'lang'         => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'image'        => new sfValidatorString(array('max_length' => 255)),
      'link'         => new sfValidatorString(),
      'is_published' => new sfValidatorBoolean(array('required' => false)),
      'lang'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('lang')), 'empty_value' => $this->getObject()->get('lang'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('slider_image_translation[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Slider_imageTranslation';
  }

}
