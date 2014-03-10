<?php

/**
 * PageTranslation form.
 *
 * @package    cmp
 * @subpackage form
 * @author     St2
 */
class PageTranslationForm extends BasePageTranslationForm {

    public function configure() {
        // SEO
        $this->widgetSchema['meta_title'] = new sfWidgetFormInputText();
        $this->widgetSchema['meta_keywords'] = new sfWidgetFormInputText();
        $this->widgetSchema['meta_description'] = new sfWidgetFormInputText();
        
        $this->widgetSchema['image'] = new sfWidgetFormInputFile();
        $this->validatorSchema['image'] = new sfValidatorFile(
                        array(
                            'required' => false,
                            'path' => sfConfig::get('sf_upload_dir') . '/pages',
                            'mime_types' => 'web_images'
                ));
        
    }

}
