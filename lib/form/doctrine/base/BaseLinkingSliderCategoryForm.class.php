<?php

/**
 * LinkingSliderCategory form base class.
 *
 * @method LinkingSliderCategory getObject() Returns the current form's model object
 *
 * @package    LavishingBeaty
 * @subpackage form
 * @author     Tsvetan Himchev
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseLinkingSliderCategoryForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'slider_image_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Slider_images'), 'add_empty' => false)),
      'category_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Categories'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'slider_image_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Slider_images'))),
      'category_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Categories'))),
    ));

    $this->widgetSchema->setNameFormat('linking_slider_category[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'LinkingSliderCategory';
  }

}
