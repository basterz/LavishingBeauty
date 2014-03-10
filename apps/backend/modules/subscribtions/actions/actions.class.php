<?php

/**
 * subscribtions actions.
 *
 * @package    osteo_cardics
 * @subpackage subscribtions
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class subscribtionsActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->page = (int) $request->getParameter('page', 1);
    $this->subscribtions = new sfDoctrinePager('Subscribtion', sfConfig::get('app_records_per_page'));
    $query = Doctrine_Core::getTable('Subscribtion')
            ->createQuery('a');

    $this->subscribtions->setQuery($query);
    $this->subscribtions->setPage($this->page);
    $this->subscribtions->init();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new SubscribtionForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new SubscribtionForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($subscribtion = Doctrine_Core::getTable('Subscribtion')->find(array($request->getParameter('id'))), sprintf('Object subscribtion does not exist (%s).', $request->getParameter('id')));
    $this->form = new SubscribtionForm($subscribtion);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($subscribtion = Doctrine_Core::getTable('Subscribtion')->find(array($request->getParameter('id'))), sprintf('Object subscribtion does not exist (%s).', $request->getParameter('id')));
    $this->form = new SubscribtionForm($subscribtion);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($subscribtion = Doctrine_Core::getTable('Subscribtion')->find(array($request->getParameter('id'))), sprintf('Object subscribtion does not exist (%s).', $request->getParameter('id')));
    $subscribtion->delete();

    $this->redirect('subscribtions/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $subscribtion = $form->save();

      $this->redirect('subscribtions/edit?id='.$subscribtion->getId());
    }
  }
}
