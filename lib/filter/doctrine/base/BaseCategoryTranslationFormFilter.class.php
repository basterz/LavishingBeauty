<?php

/**
 * CategoryTranslation filter form base class.
 *
 * @package    creaton
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCategoryTranslationFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'title'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'body'         => new sfWidgetFormFilterInput(),
      'is_published' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'title'        => new sfValidatorPass(array('required' => false)),
      'body'         => new sfValidatorPass(array('required' => false)),
      'is_published' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('category_translation_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CategoryTranslation';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'title'        => 'Text',
      'body'         => 'Text',
      'is_published' => 'Boolean',
      'lang'         => 'Text',
    );
  }
}
