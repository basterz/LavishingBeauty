<?php

/**
 * LinkingSliderCategory filter form base class.
 *
 * @package    creaton
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseLinkingSliderCategoryFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'slider_image_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Slider_images'), 'add_empty' => true)),
      'category_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Categories'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'slider_image_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Slider_images'), 'column' => 'id')),
      'category_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Categories'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('linking_slider_category_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'LinkingSliderCategory';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'slider_image_id' => 'ForeignKey',
      'category_id'     => 'ForeignKey',
    );
  }
}
