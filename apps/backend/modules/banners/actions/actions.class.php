<?php

/**
 * banners actions.
 *
 * @package    osteo_cardics
 * @subpackage banners
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class bannersActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->page = (int) $request->getParameter('page', 1);
    $this->banners = new sfDoctrinePager('Banner', sfConfig::get('app_records_per_page'));
    $query = Doctrine_Core::getTable('Banner')
            ->createQuery('a');

    $this->banners->setQuery($query);
    $this->banners->setPage($this->page);
    $this->banners->init();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new bannerForm();
    if ($request->isMethod(sfRequest::PUT)) {
      $this->processForm($request, $this->form);
    }
  }


  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($object = Doctrine_Core::getTable('Banner')->find(array($request->getParameter('id'))), sprintf('Object image does not exist (%s).', $request->getParameter('id')));
    $this->form = new bannerForm($object);
    if ($request->isMethod(sfRequest::POST)) {
      $this->processForm($request, $this->form);
    }
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($product = Doctrine_Core::getTable('Banner')->find(array($request->getParameter('id'))), sprintf('Object product does not exist (%s).', $request->getParameter('id')));
    $product->delete();

    $this->redirect('@banners_list');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $product = $form->save();

      $this->redirect('@banners_list');
    }
  }
}
