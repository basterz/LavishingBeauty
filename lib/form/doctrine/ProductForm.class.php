<?php

/**
 * Product form.
 *
 * @package    osteo_cardics
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProductForm extends BaseProductForm {

    public function configure() {
        unset($this['created_at'], $this['updated_at']);
        $this->setDefaults(array(
            'position' => Doctrine_Core::getTable('Product')->getNextPosition()
        ));
        
        $this->embedI18n(array_keys(sfConfig::get('app_supported_languages')));
    }

    public function doSave($con = null) {
        $response = parent::doSave($con);
      
        $resize_dimentions = sfConfig::get('app_thumb_image');
        $filepath = sfConfig::get('sf_upload_dir') . '/projects/' . $this->getObject()->getImage();
        $current_lang = $this->getObject()->getLang();
        $image_field = $this->values[$current_lang]['image'];
        $this->adaptiveResizeImage($filepath, $resize_dimentions, $image_field);
        
        $resize_dimentions = sfConfig::get('app_product_big_image');//dobavi razmer na golqmoto izobrajenie na proekta!!!!!!!!!!
        $image_field = $this->values[$current_lang]['big_image'];
        $filepath = sfConfig::get('sf_upload_dir') . '/projects/' . $this->getObject()->getBigImage();
        $this->adaptiveResizeImage($filepath, $resize_dimentions, $image_field);
        return $response;
    }

    private function adaptiveResizeImage($filepath, $resize_dimentions, $image_field) {
        if ($image_field) {
            $image = PhpThumbFactory::create($filepath);

            //get the new image dimentions
            $image_size = $image->getCurrentDimensions();

            //check if the image needs to be resized or croped 
            $image->setOptions(array('resizeUp' => true));

            //resizes or crops the image
            $original_width = $image_size['width'];
            $original_height = $image_size['height'];
            if ($original_width > $original_height) {
                $image->resize($resize_dimentions['width'], 0);
            } elseif ($original_width == $original_height){
                $image->resize($resize_dimentions['width'], 0);
            } 
            else {
                $image->resize(0, $resize_dimentions['height']);
            }

            //saves the new image to the directory
            $image->save($filepath);
        }
    }

}
