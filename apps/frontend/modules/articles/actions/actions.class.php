<?php

/**
 * articles actions.
 *
 * @package    creaton
 * @subpackage articles
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class articlesActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
        $page = (int)$request->getParameter('page', 1);      
        $this->records = new sfDoctrinePager('Article', sfConfig::get('app_records_per_page'));
        $query = ArticleTable::getInstance()
                ->createQuery('a')
                ->leftJoin('a.Translation t')
                ->where('t.lang = ?', $this->getUser()->getCulture())
                ->andWhere('t.is_published = ?', true)
                ->orderBy('a.created_at DESC');
        $this->records->setQuery($query);
        $this->records->setPage($page);
        $this->records->init();
  }
  public function executeShow(sfWebRequest $request){
      $article_id = $request->getParameter('id');
        
        $this->article = Doctrine_Core::getTable('Article')
                ->createQuery('a')
                ->leftJoin('a.Translation t')
                ->where('a.id = ?', $article_id)
                ->andWhere('t.lang = ?', $this->getUser()->getCulture())
                ->andWhere('t.is_published = ?', true)
                ->limit(1)
                ->fetchOne();
        $this->populateMetaData($this->article);
        //adds +1 for view
        $current_view = $this->article->getViewed();
        $this->article->setViewed($current_view+1);
        $this->article->save();
        
        $this->next_article = Doctrine_Core::getTable('Article')
                ->createQuery('a')
                ->leftJoin('a.Translation t')
                ->where('a.id > ?', $article_id)
                ->andWhere('t.lang = ?', $this->getUser()->getCulture())
                ->andWhere('t.is_published = ?', true)
                ->fetchOne();
        
        $this->previous_article = Doctrine_Core::getTable('Article')
                ->createQuery('a')
                ->leftJoin('a.Translation t')
                ->where('a.id < ?', $article_id)
                ->andWhere('t.lang = ?', $this->getUser()->getCulture())
                ->andWhere('t.is_published = ?', true)
                ->orderBy('a.id DESC')
                ->fetchOne();
  }
  private function populateMetaData($product) {
        $response = $this->getResponse();

        $response->addMeta('keywords', $product->getTitle());
        $response->addMeta('description', strip_tags(htmlspecialchars_decode($product->getBody(), ENT_QUOTES)));
        $response->setTitle($product->getTitle());
    }

  
}
