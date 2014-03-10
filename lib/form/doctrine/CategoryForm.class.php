<?php

/**
 * Category form.
 *
 * @package    osteo_cardics
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CategoryForm extends BaseCategoryForm
{
  public function configure()
  {
      unset($this['created_at'], $this['updated_at']);
      unset($this->validatorSchema['product_list']);
      unset($this->widgetSchema['product_list']);
      unset($this->validatorSchema['slider_image_list']);
      unset($this->widgetSchema['slider_image_list']);
      
      $this->setDefaults(array(
			'position' => Doctrine_Core::getTable('Category')->getNextPosition()
		));
      $this->embedI18n(array_keys(sfConfig::get('app_supported_languages')));
  }
}
