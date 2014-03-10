<?php

/**
 * LinkingSliderCategory form.
 *
 * @package    creaton
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class LinkingSliderCategoryForm extends BaseLinkingSliderCategoryForm
{
  public function configure() {
       unset($this['slider_image_id']);

    }
}
