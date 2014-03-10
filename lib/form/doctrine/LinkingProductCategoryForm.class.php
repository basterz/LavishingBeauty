<?php

/**
 * LinkingProductCategory form.
 *
 * @package    creaton
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class LinkingProductCategoryForm extends BaseLinkingProductCategoryForm {

    public function configure() {
       unset($this['product_id']);
       
    }

}
