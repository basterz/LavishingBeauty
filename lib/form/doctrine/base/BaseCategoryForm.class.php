<?php

/**
 * Category form base class.
 *
 * @method Category getObject() Returns the current form's model object
 *
 * @package    LavishingBeaty
 * @subpackage form
 * @author     Tsvetan Himchev
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCategoryForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'parrent_id'        => new sfWidgetFormInputText(),
      'icon'              => new sfWidgetFormInputText(),
      'position'          => new sfWidgetFormInputText(),
      'created_at'        => new sfWidgetFormDateTime(),
      'updated_at'        => new sfWidgetFormDateTime(),
      'product_list'      => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Product')),
      'slider_image_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Slider_image')),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'parrent_id'        => new sfValidatorInteger(array('required' => false)),
      'icon'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'position'          => new sfValidatorInteger(array('required' => false)),
      'created_at'        => new sfValidatorDateTime(),
      'updated_at'        => new sfValidatorDateTime(),
      'product_list'      => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Product', 'required' => false)),
      'slider_image_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Slider_image', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('category[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Category';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['product_list']))
    {
      $this->setDefault('product_list', $this->object->Product->getPrimaryKeys());
    }

    if (isset($this->widgetSchema['slider_image_list']))
    {
      $this->setDefault('slider_image_list', $this->object->Slider_image->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveProductList($con);
    $this->saveSlider_imageList($con);

    parent::doSave($con);
  }

  public function saveProductList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['product_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Product->getPrimaryKeys();
    $values = $this->getValue('product_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Product', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Product', array_values($link));
    }
  }

  public function saveSlider_imageList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['slider_image_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Slider_image->getPrimaryKeys();
    $values = $this->getValue('slider_image_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Slider_image', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Slider_image', array_values($link));
    }
  }

}
