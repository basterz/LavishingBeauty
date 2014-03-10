<?php

/**
 * LinkingProductCategory form base class.
 *
 * @method LinkingProductCategory getObject() Returns the current form's model object
 *
 * @package    LavishingBeaty
 * @subpackage form
 * @author     Tsvetan Himchev
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseLinkingProductCategoryForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'product_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Products'), 'add_empty' => false)),
      'category_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Categories'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'product_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Products'))),
      'category_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Categories'))),
    ));

    $this->widgetSchema->setNameFormat('linking_product_category[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'LinkingProductCategory';
  }

}
