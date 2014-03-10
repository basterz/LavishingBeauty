<?php

/**
 * Banner form.
 *
 * @package    osteo_cardics
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class BannerForm extends BaseBannerForm
{
  public function configure() {
        unset($this['created_at'], $this['updated_at']);

        $this->embedI18n(array_keys(sfConfig::get('app_supported_languages')));
    }

    public function doSave($con = null) {
        $response = parent::doSave($con);

        $resize_dimentions = sfConfig::get('app_banner_thumb_image');
        $filepath = sfConfig::get('sf_upload_dir') . '/banners/' . $this->getObject()->getImage();
        $current_lang = $this->getObject()->getLang();
        
        $image_field = $this->values[$current_lang]['image'];
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
            $image->adaptiveResize($resize_dimentions['width'], $resize_dimentions['height']);

            //saves the new image to the directory
            $image->save($filepath);
        }
    }
}
