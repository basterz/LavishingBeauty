<?php

/**
 * articles actions.
 *
 * @package    osteo_cardics
 * @subpackage articles
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class articlesActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->page = (int) $request->getParameter('page', 1);
    $this->articles = new sfDoctrinePager('Article', sfConfig::get('app_records_per_page'));
    $query = Doctrine_Core::getTable('Article')
            ->createQuery('a')
            ->orderBy('a.created_at DESC');

    $this->articles->setQuery($query);
    $this->articles->setPage($this->page);
    $this->articles->init();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ArticleForm();
    if ($request->isMethod(sfRequest::PUT)) {
      $this->processForm($request, $this->form);
    }
  }


  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($object = Doctrine_Core::getTable('Article')->find(array($request->getParameter('id'))), sprintf('Object image does not exist (%s).', $request->getParameter('id')));
    $this->form = new ArticleForm($object);
    if ($request->isMethod(sfRequest::POST)) {
      $this->processForm($request, $this->form);
    }
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($product = Doctrine_Core::getTable('article')->find(array($request->getParameter('id'))), sprintf('Object product does not exist (%s).', $request->getParameter('id')));
    $product->delete();

    $this->redirect('@articles_list');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $product = $form->save();

      $this->redirect('@articles_list');
    }
  }
}
