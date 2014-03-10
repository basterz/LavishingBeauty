<?php

/**
 * Slider_imageTranslation filter form base class.
 *
 * @package    creaton
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseSlider_imageTranslationFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'image'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'link'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'is_published' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'image'        => new sfValidatorPass(array('required' => false)),
      'link'         => new sfValidatorPass(array('required' => false)),
      'is_published' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('slider_image_translation_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Slider_imageTranslation';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'image'        => 'Text',
      'link'         => 'Text',
      'is_published' => 'Boolean',
      'lang'         => 'Text',
    );
  }
}
