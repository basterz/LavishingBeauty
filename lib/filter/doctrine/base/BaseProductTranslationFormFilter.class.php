<?php

/**
 * ProductTranslation filter form base class.
 *
 * @package    creaton
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseProductTranslationFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'title'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'body'         => new sfWidgetFormFilterInput(),
      'image'        => new sfWidgetFormFilterInput(),
      'big_image'    => new sfWidgetFormFilterInput(),
      'project_type' => new sfWidgetFormFilterInput(),
      'phase'        => new sfWidgetFormFilterInput(),
      'area_label'   => new sfWidgetFormFilterInput(),
      'area'         => new sfWidgetFormFilterInput(),
      'city'         => new sfWidgetFormFilterInput(),
      'author_label' => new sfWidgetFormFilterInput(),
      'author'       => new sfWidgetFormFilterInput(),
      'is_published' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'title'        => new sfValidatorPass(array('required' => false)),
      'body'         => new sfValidatorPass(array('required' => false)),
      'image'        => new sfValidatorPass(array('required' => false)),
      'big_image'    => new sfValidatorPass(array('required' => false)),
      'project_type' => new sfValidatorPass(array('required' => false)),
      'phase'        => new sfValidatorPass(array('required' => false)),
      'area_label'   => new sfValidatorPass(array('required' => false)),
      'area'         => new sfValidatorPass(array('required' => false)),
      'city'         => new sfValidatorPass(array('required' => false)),
      'author_label' => new sfValidatorPass(array('required' => false)),
      'author'       => new sfValidatorPass(array('required' => false)),
      'is_published' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('product_translation_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ProductTranslation';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'title'        => 'Text',
      'body'         => 'Text',
      'image'        => 'Text',
      'big_image'    => 'Text',
      'project_type' => 'Text',
      'phase'        => 'Text',
      'area_label'   => 'Text',
      'area'         => 'Text',
      'city'         => 'Text',
      'author_label' => 'Text',
      'author'       => 'Text',
      'is_published' => 'Boolean',
      'lang'         => 'Text',
    );
  }
}
