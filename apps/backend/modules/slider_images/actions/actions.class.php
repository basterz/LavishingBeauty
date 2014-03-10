<?php

/**
 * slider_images actions.
 *
 * @package    osteo_cardics
 * @subpackage slider_images
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class slider_imagesActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->page = (int) $request->getParameter('page', 1);
    $this->slider_images = new sfDoctrinePager('Slider_image', sfConfig::get('app_records_per_page'));
    $query = Doctrine_Core::getTable('Slider_image')
            ->createQuery('a')
            ->orderBy('a.created_at DESC');

    $this->slider_images->setQuery($query);
    $this->slider_images->setPage($this->page);
    $this->slider_images->init();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new Slider_imageForm();
    if ($request->isMethod(sfRequest::PUT)) {
      $this->processForm($request, $this->form);
    }
  }


  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($object = Doctrine_Core::getTable('Slider_image')->find(array($request->getParameter('id'))), sprintf('Object image does not exist (%s).', $request->getParameter('id')));
    $this->form = new Slider_imageForm($object);
    if ($request->isMethod(sfRequest::POST)) {
      $this->processForm($request, $this->form);
    }
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($product = Doctrine_Core::getTable('Slider_image')->find(array($request->getParameter('id'))), sprintf('Object product does not exist (%s).', $request->getParameter('id')));
    $product->delete();

    $this->redirect('@slider_images_list');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $product = $form->save();

      $this->redirect('@slider_images_list');
    }
  }
}
