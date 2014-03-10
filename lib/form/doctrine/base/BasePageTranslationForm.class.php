<?php

/**
 * PageTranslation form base class.
 *
 * @method PageTranslation getObject() Returns the current form's model object
 *
 * @package    LavishingBeaty
 * @subpackage form
 * @author     Tsvetan Himchev
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePageTranslationForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'title'            => new sfWidgetFormInputText(),
      'image'            => new sfWidgetFormInputText(),
      'body'             => new sfWidgetFormTextarea(),
      'links'            => new sfWidgetFormTextarea(),
      'partners'         => new sfWidgetFormTextarea(),
      'meta_title'       => new sfWidgetFormTextarea(),
      'meta_keywords'    => new sfWidgetFormTextarea(),
      'meta_description' => new sfWidgetFormTextarea(),
      'is_published'     => new sfWidgetFormInputCheckbox(),
      'lang'             => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'title'            => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'image'            => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'body'             => new sfValidatorString(array('required' => false)),
      'links'            => new sfValidatorString(array('required' => false)),
      'partners'         => new sfValidatorString(array('required' => false)),
      'meta_title'       => new sfValidatorString(array('required' => false)),
      'meta_keywords'    => new sfValidatorString(array('required' => false)),
      'meta_description' => new sfValidatorString(array('required' => false)),
      'is_published'     => new sfValidatorBoolean(array('required' => false)),
      'lang'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('lang')), 'empty_value' => $this->getObject()->get('lang'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('page_translation[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PageTranslation';
  }

}
