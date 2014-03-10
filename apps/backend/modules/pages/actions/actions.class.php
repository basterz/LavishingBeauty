<?php

/**
 * pages actions.
 *
 * @package    FancyFooter
 * @subpackage pages
 * @author     Vertinity
 */
class pagesActions extends sfActions
{
  private $_sort_by = array('title', 'position', 'created_at');
  
  public function preExecute() {
    $request = $this->getRequest();
    $this->types = sfConfig::get('app_translated_page_types');
    $this->type = $request->getParameter('type');
    $this->redirectUnless(
            is_array($this->types)
            && in_array($this->type, array_keys($this->types)), '@homepage');
  }
  
  public function executeView(sfWebRequest $request)
  {
    $page = Doctrine_Core::getTable('Page')->getPageByType($this->type);
    $this->form = new PageForm($page);
    if ($request->isMethod(sfWebRequest::POST)) {
      $this->form->bind($request->getParameter('page'));
      if ($this->form->isValid()) {
        $page = $this->form->save();
        $this->getUser()->setFlash('success', 1);
        $this->redirect('pages/view?type=' . $page->getType());
      }
    }
  }
  
  public function executeList(sfWebRequest $request)
  {
    // Order by
    $order_by = $request->getParameter('sort');
    if (!in_array($order_by, $this->_sort_by)) {
      $order_by = 'position';
    }
    $this->sort = $order_by;
    if ($request->hasParameter('desc')) {
      $order_by .= ' DESC';
    }
    
    // Current page
    $page = (int)$request->getParameter('page', 1);
    // Init the pager
    $this->records = new sfDoctrinePager('Page', sfConfig::get('app_records_per_page'));
    $query = Doctrine_Core::getTable('Page')->getListingQuery($this->type, $order_by);
    $this->records->setQuery($query);
    $this->records->setPage($page);
    $this->records->init();
  }
  
  public function executeNew(sfWebRequest $request)
  {
    $page = new Page();
    $page->setType($this->type);
    $this->form = new PageForm($page, array('is_multiple' => true));
    if ($request->isMethod(sfRequest::PUT)) {
      $this->processForm($request, $this->form);
    }
  }
  
  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($page = Doctrine_Core::getTable('Page')->find(array($request->getParameter('id'))), sprintf('Object page does not exist (%s).', $request->getParameter('id')));
    $this->form = new PageForm($page, array('is_multiple' => true));
    if ($request->isMethod(sfRequest::POST)) {
      $this->processForm($request, $this->form);
    }
  }
  
  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($page = Doctrine_Core::getTable('Page')->find(array($request->getParameter('id'))), sprintf('Object page does not exist (%s).', $request->getParameter('id')));
    $user->delete();

    $this->getUser()->setFlash('success', 1);
    $this->redirect('@pages_list?type=' . $this->type);
  }
  
  public function executeDelete_selected(sfWebRequest $request)
  {
    // Delete records
    $record_ids = $request->getParameter('record_id');
    if (!empty($record_ids)) {
      foreach ($record_ids as $record_id) {
        $record = Doctrine::getTable('Page')->find((int)$record_id);
        if ($record) {
          $record->delete();
        }
      }
    }
    
    $this->getUser()->setFlash('success', 1);
    $this->redirect('@pages_list?type=' . $this->type);
  }
  
  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $user = $form->save();

      $this->getUser()->setFlash('success', 1);

    }
  }
}
