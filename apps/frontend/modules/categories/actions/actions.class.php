<?php

/**
 * categories actions.
 *
 * @package    osteo_cardics
 * @subpackage categories
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class categoriesActions extends sfActions {
    public function executeIndex(sfWebRequest $request) {
        $this->records = Doctrine_Core::getTable('Category')
                ->createQuery('a')
                ->leftJoin('a.Translation t')
                ->where('t.lang = ?', $this->getUser()->getCulture())
                ->andWhere('t.is_published = ?', true)
                ->orderBy('a.position ASC')
                ->execute();
    }
    
    public function executeShow(sfWebRequest $request) {
        $category_id = $request->getParameter('id');

        $this->category = Doctrine_Core::getTable('Category')
                ->createQuery('a')
                ->leftJoin('a.Translation t')
                ->where('a.id = ?', $category_id)
                ->andWhere('t.lang = ?', $this->getUser()->getCulture())
                ->andWhere('t.is_published = ?', true)
                ->fetchOne();
        $current_position = $this->category->getPosition();   
        //var_dump($current_position);
        $this->next_category = Doctrine_Core::getTable('Category')
                ->createQuery('a')
                ->leftJoin('a.Translation t')
                ->where('a.position > ?', $current_position)
                ->andWhere('t.lang = ?', $this->getUser()->getCulture())
                ->andWhere('t.is_published = ?', true)
                ->orderBy('a.position ASC')
                ->fetchOne();
        
        $this->previous_category = Doctrine_Core::getTable('Category')
                ->createQuery('a')
                ->leftJoin('a.Translation t')
                ->where('a.position < ?', $current_position)
                ->andWhere('t.lang = ?', $this->getUser()->getCulture())
                ->andWhere('t.is_published = ?', true)
                ->orderBy('a.position DESC')
                ->fetchOne();
        
        
        $this->populateMetaData($this->category);
        
    }

    private function populateMetaData($product) {
        $response = $this->getResponse();

        $response->addMeta('keywords', $product->getTitle());
        $response->addMeta('description', strip_tags(htmlspecialchars_decode($product->getBody(), ENT_QUOTES)));
        $response->setTitle($product->getTitle());
    }

}
