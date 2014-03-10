    <?php

/**
 * products actions.
 *
 * @package    osteo_cardics
 * @subpackage products
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class productsActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $filters = array(
        'search_text' => $request->getParameter('search_text'),
        'category' => $request->getParameter('category')
    );
    $page = (int)$request->getParameter('page', 1);
    
    $this->products = new sfDoctrinePager('Product', sfConfig::get('app_records_per_page'));
    $query = Doctrine_Core::getTable('Product')->
            getListingQuery($filters)->
            innerJoin('a.LinkingProductCategory cp')->
            orderBy('position DESC');
    
    $this->products->setQuery($query);
    $this->products->setPage($page);
    $this->products->init();
    $this->filters = new ProductFilter($filters);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new productForm();
    if ($request->isMethod(sfRequest::PUT)) {
      $this->processForm($request, $this->form);
    }
  }


  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($object = Doctrine_Core::getTable('Product')->find(array($request->getParameter('id'))), sprintf('Object image does not exist (%s).', $request->getParameter('id')));
    $this->form = new ProductForm($object);
    $this->categoryParrentName = Doctrine_Core::getTable('Category')
        ->createQuery('a')
        ->where('a.id = '.$object->getID())
        ->fetchOne(Doctrine_Core::HYDRATE_SINGLE_SCALAR);
    if ($request->isMethod(sfRequest::POST)) {
      $this->processForm($request, $this->form);
    }
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($product = Doctrine_Core::getTable('product')->find(array($request->getParameter('id'))), sprintf('Object product does not exist (%s).', $request->getParameter('id')));
    $product->delete();

    $this->redirect('@products_list');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $product = $form->save();

      $this->redirect('@products_list');
    }
  }
  public function executePosition(sfWebRequest $request){
    sfContext::getInstance()->getConfiguration()->loadHelpers("SmartLinks");
    $this->forward404Unless($record = Doctrine::getTable('Product')->find(array($request->getParameter('id'))), sprintf('Object group does not exist (%s).', $request->getParameter('id')));
    $this->forward404Unless($request->hasParameter('operation'));
    $operation = $request->getParameter('operation');
    if ($operation == 'up') {
      $record->moveUp();
    } else if ($operation == 'down') {
      $record->moveDown();
    }
    // Redirect
    $this->redirect('@products_list');
  }
}
