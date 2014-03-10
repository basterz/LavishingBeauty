<?php

/**
 * ProductTranslation form.
 *
 * @package    osteo_cardics
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProductTranslationForm extends BaseProductTranslationForm {

    public function configure() {
        $this->widgetSchema['image'] = new sfWidgetFormInputFile();
        $this->widgetSchema['big_image'] = new sfWidgetFormInputFile();
        $this->widgetSchema['area_label'] = new sfWidgetFormChoice(array(
            'choices' => array(
                            'разгърната площ' => 'разгърната площ', 
                            'характеристики' => 'характеристики', 
                            'описание' => 'описание', 
                            'клиент' => 'клиент'
            )
        ));
        $this->widgetSchema['author_label'] = new sfWidgetFormChoice(array(
            'choices' => array(
                            'автор' => 'автор', 
                            'автори' => 'автори',
                            'концепция' => 'концепция'
            )
        ));
        $this->validatorSchema['image'] = new sfValidatorFile(
                        array(
                            'required' => false,
                            'path' => sfConfig::get('sf_upload_dir') . '/projects',
                            'mime_types' => 'web_images'
                ));
        
        $this->validatorSchema['big_image'] = new sfValidatorFile(
                        array(
                            'required' => false,
                            'path' => sfConfig::get('sf_upload_dir') . '/projects',
                            'mime_types' => 'web_images'
                ));
    }

}
