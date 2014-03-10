<?php

/**
 * ArticleTranslation form.
 *
 * @package    osteo_cardics
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ArticleTranslationForm extends BaseArticleTranslationForm {

    public function configure() {
        $this->widgetSchema['image'] = new sfWidgetFormInputFile();
        $this->validatorSchema['image'] = new sfValidatorFile(
                        array(
                            'required' => false,
                            'path' => sfConfig::get('sf_upload_dir') . '/articles',
                            'mime_types' => 'web_images'
                ));
        $this->widgetSchema['big_image'] = new sfWidgetFormInputFile();
        $this->validatorSchema['big_image'] = new sfValidatorFile(
                        array(
                            'required' => false,
                            'path' => sfConfig::get('sf_upload_dir') . '/articles',
                            'mime_types' => 'web_images'
                ));
    }

}
