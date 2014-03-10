<?php

/**
 * users actions.
 *
 * @package    FancyFooter
 * @subpackage users
 * @author     Vertinity
 */
class usersActions extends sfActions
{
  private $_sort_by = array('name', 'email', 'role', 'is_active', 'created_at');
  
  public function executeIndex(sfWebRequest $request)
  {
    $filters = array(
        'search_text' => $request->getParameter('search_text'),
        'role' => $request->getParameter('role'),
        'date' => $request->getParameter('date')
    );
    
    // Order criteria
    $order_by = $request->getParameter('sort');
    if (!in_array($order_by, $this->_sort_by)) {
      $order_by = 'created_at';
      $request->setParameter('desc', 1);
    }
    $this->sort = $order_by;
    if ($request->hasParameter('desc')) {
      $order_by .= ' DESC';
    }

    // Get the current page
    $page = (int)$request->getParameter('page', 1);

    // Init the pager
    $this->records = new sfDoctrinePager('User', sfConfig::get('app_records_per_page'));
    $query = Doctrine_Core::getTable('User')->getListingQuery($filters, $order_by);
    $this->records->setQuery($query);
    $this->records->setPage($page);
    $this->records->init();
    
    $this->filters = new UsersFilter($filters);
    $this->mail_form = new MailForm();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new UserForm();
    if ($request->isMethod(sfRequest::PUT)) {
      $this->processForm($request, $this->form);
    }
  }
  
  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($user = Doctrine_Core::getTable('User')->find(array($request->getParameter('id'))), sprintf('Object user does not exist (%s).', $request->getParameter('id')));
    $this->form = new UserForm($user);
    if ($request->isMethod(sfRequest::POST)) {
      $this->processForm($request, $this->form);
    }
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($user = Doctrine_Core::getTable('User')->find(array($request->getParameter('id'))), sprintf('Object user does not exist (%s).', $request->getParameter('id')));
    $user->delete();

    $this->getUser()->setFlash('success', 1);
    $this->redirect('@users_list');
  }
  
  public function executeDelete_selected(sfWebRequest $request)
  {
    // Delete records
    $record_ids = $request->getParameter('record_id');
    if (!empty($record_ids)) {
      foreach ($record_ids as $record_id) {
        $record = Doctrine::getTable('User')->find((int)$record_id);
        if ($record) {
          $record->delete();
        }
      }
    }
    
    $this->getUser()->setFlash('success', 1);
    $this->redirect('@users_list');
  }
  
  public function executeState(sfWebRequest $request)
  {
    $output = json_encode(array('success' => 0));
    $this->getResponse()->setContentType('application/json');
    if ($request->isXmlHttpRequest()) {
      $id = (int)$request->getParameter('id');
      $user = Doctrine_Core::getTable('User')->find($id);
      if ($user) {
        $user->setIsActive(!$user->getIsActive());
        $user->save();
        $output = json_encode(array('success' => 1, 'result' => $user->getIsActive()));
      }
    }
    $this->renderText($output);
    return sfView::NONE;
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $user = $form->save();

      $this->getUser()->setFlash('success', 1);
      $this->redirect('@users_edit?id=' . $user->getId());
    }
  }
}
