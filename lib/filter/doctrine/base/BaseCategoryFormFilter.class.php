<?php

/**
 * Category filter form base class.
 *
 * @package    creaton
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCategoryFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'icon'              => new sfWidgetFormFilterInput(),
      'position'          => new sfWidgetFormFilterInput(),
      'created_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'product_list'      => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Product')),
      'slider_image_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Slider_image')),
    ));

    $this->setValidators(array(
      'icon'              => new sfValidatorPass(array('required' => false)),
      'position'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'product_list'      => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Product', 'required' => false)),
      'slider_image_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Slider_image', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('category_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addProductListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.LinkingProductCategory LinkingProductCategory')
      ->andWhereIn('LinkingProductCategory.product_id', $values)
    ;
  }

  public function addSliderImageListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.LinkingSliderCategory LinkingSliderCategory')
      ->andWhereIn('LinkingSliderCategory.slider_image_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'Category';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'icon'              => 'Text',
      'position'          => 'Number',
      'created_at'        => 'Date',
      'updated_at'        => 'Date',
      'product_list'      => 'ManyKey',
      'slider_image_list' => 'ManyKey',
    );
  }
}
