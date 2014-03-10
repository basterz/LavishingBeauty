<?php

/**
 * products actions.
 *
 * @package    osteo_cardics
 * @subpackage products
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class productsActions extends sfActions {

    public function executeIndex(sfWebRequest $request) {
        $page = (int)$request->getParameter('page', 1);
        $filter = array();
        $this->filter_values = array();
        if($request->getParameter("filter") != null){
            $filter = $request->getParameter("filter");;
            $this->filter_values = $filter;

        }
        $this->products = new sfDoctrinePager('Product', sfConfig::get('app_records_per_page'));
        $query = ProductTable::getInstance()
                ->createQuery('a')
                ->leftJoin('a.Translation t')
                ->innerJoin('a.LinkingProductCategory cp')
                ->where('t.lang = ?', $this->getUser()->getCulture())
                ->andWhere('t.is_published = ?', true)
                ->andWhereIn('cp.category_id', $filter)
                ->orderBy('position DESC');
        $this->products->setQuery($query);
        $this->products->setPage($page);
        $this->products->init();
    }

    public function executeShow(sfWebRequest $request) {
        $product_id = $request->getParameter('id');

        $this->product = Doctrine_Core::getTable('Product')
                ->createQuery('a')
                ->leftJoin('a.Translation t')
                ->where('a.id = ?', $product_id)
                ->andWhere('t.lang = ?', $this->getUser()->getCulture())
                ->andWhere('t.is_published = ?', true)
                ->limit(1)
                ->fetchOne();
        $this->populateMetaData($this->product);
        $this->next_product = Doctrine_Core::getTable('Product')
                ->createQuery('a')
                ->leftJoin('a.Translation t')
                ->where('a.position < ?', $this->product->getPosition())
                ->andWhere('t.lang = ?', $this->getUser()->getCulture())
                ->andWhere('t.is_published = ?', true)
                ->orderBy('a.position DESC')
                ->fetchOne();
        
        $this->previous_product = Doctrine_Core::getTable('Product')
                ->createQuery('a')
                ->leftJoin('a.Translation t')
                ->where('a.position > ?', $this->product->getPosition())
                ->andWhere('t.lang = ?', $this->getUser()->getCulture())
                ->andWhere('t.is_published = ?', true)
                ->orderBy('a.position ASC')
                ->fetchOne();
    }

    private function populateMetaData($product) {
        $response = $this->getResponse();

        $response->addMeta('keywords', $product->getTitle());
        $response->addMeta('description', strip_tags(htmlspecialchars_decode($product->getBody(), ENT_QUOTES)));
        $response->setTitle($product->getTitle());
    }

}
