<?php

class commonComponents extends sfComponents {
    
    public function executeHeader() {
        $this->records = Doctrine_Core::getTable('Category')
                ->createQuery('a')
                ->leftJoin('a.Translation t')
                ->where('t.lang = ?', $this->getUser()->getCulture())
                ->andWhere('t.is_published = ?', true)
                ->orderBy('a.position ASC')
                ->execute();
    }
    
    public function executeSlider() {
        $this->slider_images = Doctrine_Core::getTable('Slider_image')
                ->createQuery('a')
                ->leftJoin('a.Translation t')
                ->where('t.lang = ?', $this->getUser()->getCulture())
                ->andWhere('t.is_published = ?', true)
                ->limit(10)
                ->orderBy('RAND()')
                ->execute();
        
    }
    public function executeBooking_form() {
        $this->form = new HomepageBookingForm();
    }

    public function executeFooter() {
        
    }
    
    public function executeHomepage_boxes() {
        $this->boxes = Doctrine_Core::getTable('Banner')
                ->createQuery('a')
                ->leftJoin('a.Translation t')
                ->where('t.lang = ?', $this->getUser()->getCulture())
                ->andWhere('t.is_published = ?', true)
                ->limit(4)
                ->orderBy('t.position')
                ->execute();
    }
    
    public function executeHomepage_users() {
        
    }

}

//