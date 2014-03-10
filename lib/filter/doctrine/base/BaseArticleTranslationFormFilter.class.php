<?php

/**
 * ArticleTranslation filter form base class.
 *
 * @package    creaton
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseArticleTranslationFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'title'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'short_body'   => new sfWidgetFormFilterInput(),
      'body'         => new sfWidgetFormFilterInput(),
      'author'       => new sfWidgetFormFilterInput(),
      'source'       => new sfWidgetFormFilterInput(),
      'image'        => new sfWidgetFormFilterInput(),
      'big_image'    => new sfWidgetFormFilterInput(),
      'is_published' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'title'        => new sfValidatorPass(array('required' => false)),
      'short_body'   => new sfValidatorPass(array('required' => false)),
      'body'         => new sfValidatorPass(array('required' => false)),
      'author'       => new sfValidatorPass(array('required' => false)),
      'source'       => new sfValidatorPass(array('required' => false)),
      'image'        => new sfValidatorPass(array('required' => false)),
      'big_image'    => new sfValidatorPass(array('required' => false)),
      'is_published' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('article_translation_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ArticleTranslation';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'title'        => 'Text',
      'short_body'   => 'Text',
      'body'         => 'Text',
      'author'       => 'Text',
      'source'       => 'Text',
      'image'        => 'Text',
      'big_image'    => 'Text',
      'is_published' => 'Boolean',
      'lang'         => 'Text',
    );
  }
}
