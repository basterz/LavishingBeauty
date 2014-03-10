<?php

/**
 * Slider_imageTranslation form.
 *
 * @package    osteo_cardics
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class Slider_imageTranslationForm extends BaseSlider_imageTranslationForm {

    public function configure() {
        $this->widgetSchema['link'] = new sfWidgetFormInputText();
        $this->validatorSchema['link'] = new sfValidatorUrl(array(
                    'required' => true),
                     array('invalid' => 'невалиден линк'));
        
        $this->widgetSchema['image'] = new sfWidgetFormInputFile();
        $this->validatorSchema['image'] = new sfValidatorFile(
                        array(
                            'required' => false,
                            'path' => sfConfig::get('sf_upload_dir') . '/slider_images',
                            'mime_types' => 'web_images'
                ));

    }

}

