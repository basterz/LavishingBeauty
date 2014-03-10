<?php

/**
 * categories actions.
 *
 * @package    osteo_cardics
 * @subpackage categories
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class categoriesActions extends sfActions
{
  public function executeCategory(sfWebRequest $request){
      if (!$request->isXmlHttpRequest()) {
            $this->redirect404();
        }
      $this->categories = Doctrine_Core::getTable('category')
      ->createQuery('a')
      ->where("a.parrent_id = 0")
      ->execute();
      $this->setLayout($name = false);
  }
  public function executeIndex(sfWebRequest $request)
  {
    $this->categories = Doctrine_Core::getTable('category')
      ->createQuery('a')
      ->where("a.parrent_id = 0")
      ->orderBy('a.position')
      ->execute();
  }
  public function executeNew(sfWebRequest $request) {
        $this->form = new categoryForm();
        if ($request->isMethod(sfRequest::PUT)) {
            $this->processForm($request, $this->form);
        }
    }

    public function executeEdit(sfWebRequest $request) {
        $this->forward404Unless($object = Doctrine_Core::getTable('Category')->find(array($request->getParameter('id'))), sprintf('Object image does not exist (%s).', $request->getParameter('id')));
        $this->form = new categoryForm($object);
        
        $this->categoryParrentName = Doctrine_Core::getTable('Category')
        ->createQuery('a')
        ->where('a.id = '.$object->getId())
        ->fetchOne(Doctrine_Core::HYDRATE_SINGLE_SCALAR);
                
        if ($request->isMethod(sfRequest::POST)) {
            $this->processForm($request, $this->form);
            
        }
    }

    public function executeDelete(sfWebRequest $request) {
        $request->checkCSRFProtection();

        $this->forward404Unless($product = Doctrine_Core::getTable('category')->find(array($request->getParameter('id'))), sprintf('Object product does not exist (%s).', $request->getParameter('id')));
        $product->delete();

        $this->redirect('@categories_list');
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $product = $form->save();

            $this->redirect('@categories_list');
        }
    }
    public function executePosition(sfWebRequest $request){
    sfContext::getInstance()->getConfiguration()->loadHelpers("SmartLinks");
    $this->forward404Unless($record = Doctrine::getTable('Category')->find(array($request->getParameter('id'))), sprintf('Object group does not exist (%s).', $request->getParameter('id')));
    $this->forward404Unless($request->hasParameter('operation'));
    $operation = $request->getParameter('operation');
    if ($operation == 'up') {
      $record->moveUp();
    } else if ($operation == 'down') {
      $record->moveDown();
    }
    // Redirect
    $this->redirect('@categories_list');
  }
  
}
