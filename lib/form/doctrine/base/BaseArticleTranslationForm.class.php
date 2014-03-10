<?php

/**
 * ArticleTranslation form base class.
 *
 * @method ArticleTranslation getObject() Returns the current form's model object
 *
 * @package    LavishingBeaty
 * @subpackage form
 * @author     Tsvetan Himchev
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseArticleTranslationForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'title'        => new sfWidgetFormInputText(),
      'short_body'   => new sfWidgetFormTextarea(),
      'body'         => new sfWidgetFormTextarea(),
      'author'       => new sfWidgetFormInputText(),
      'source'       => new sfWidgetFormTextarea(),
      'image'        => new sfWidgetFormInputText(),
      'big_image'    => new sfWidgetFormInputText(),
      'is_published' => new sfWidgetFormInputCheckbox(),
      'lang'         => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'title'        => new sfValidatorString(array('max_length' => 255)),
      'short_body'   => new sfValidatorString(array('required' => false)),
      'body'         => new sfValidatorString(array('required' => false)),
      'author'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'source'       => new sfValidatorString(array('required' => false)),
      'image'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'big_image'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'is_published' => new sfValidatorBoolean(array('required' => false)),
      'lang'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('lang')), 'empty_value' => $this->getObject()->get('lang'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('article_translation[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ArticleTranslation';
  }

}
