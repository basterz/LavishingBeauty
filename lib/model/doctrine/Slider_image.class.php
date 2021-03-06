<?php

/**
 * Slider_image
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    creaton
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Slider_image extends BaseSlider_image
{
    public function delete(Doctrine_Connection $conn = null) {
        $filename = sfConfig::get('sf_upload_dir') . '/slider_images/' . $this->getImage();
        if (file_exists($filename)) {
            @unlink($filename);
        }
        return parent::delete($conn);
    }
}