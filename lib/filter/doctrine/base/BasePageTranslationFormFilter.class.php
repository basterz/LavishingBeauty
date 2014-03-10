<?php

/**
 * PageTranslation filter form base class.
 *
 * @package    creaton
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePageTranslationFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'title'            => new sfWidgetFormFilterInput(),
      'image'            => new sfWidgetFormFilterInput(),
      'body'             => new sfWidgetFormFilterInput(),
      'links'            => new sfWidgetFormFilterInput(),
      'partners'         => new sfWidgetFormFilterInput(),
      'meta_title'       => new sfWidgetFormFilterInput(),
      'meta_keywords'    => new sfWidgetFormFilterInput(),
      'meta_description' => new sfWidgetFormFilterInput(),
      'is_published'     => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'title'            => new sfValidatorPass(array('required' => false)),
      'image'            => new sfValidatorPass(array('required' => false)),
      'body'             => new sfValidatorPass(array('required' => false)),
      'links'            => new sfValidatorPass(array('required' => false)),
      'partners'         => new sfValidatorPass(array('required' => false)),
      'meta_title'       => new sfValidatorPass(array('required' => false)),
      'meta_keywords'    => new sfValidatorPass(array('required' => false)),
      'meta_description' => new sfValidatorPass(array('required' => false)),
      'is_published'     => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('page_translation_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PageTranslation';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'title'            => 'Text',
      'image'            => 'Text',
      'body'             => 'Text',
      'links'            => 'Text',
      'partners'         => 'Text',
      'meta_title'       => 'Text',
      'meta_keywords'    => 'Text',
      'meta_description' => 'Text',
      'is_published'     => 'Boolean',
      'lang'             => 'Text',
    );
  }
}
