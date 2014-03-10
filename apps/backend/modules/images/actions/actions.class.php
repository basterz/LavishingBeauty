<?php

/**
 * images actions.
 *
 * @package    cmp
 * @subpackage images
 * @author     St2
 */
class imagesActions extends sfActions {

	private $_sort_by = array('title', 'position', 'created_at');

	public function preExecute() {
		$request = $this->getRequest();
		$this->product = Doctrine_Core::getTable('Product')->find($request->getParameter('product_id'));
		$this->redirectUnless($this->product, '@homepage');
	}

	public function executeList(sfWebRequest $request) {
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
		$page = (int) $request->getParameter('page', 1);
		// Init the pager
		$this->records = new sfDoctrinePager('Image', sfConfig::get('app_records_per_page'));
		$query = Doctrine_Core::getTable('Image')
			->createQuery('a')
			->leftJoin('a.Translation t')
			->where('a.product_id = ?', $this->product->getId())
			->andWhere('t.lang = ?', $this->getUser()->getCulture())
			->orderBy($order_by);
		$this->records->setQuery($query);
		$this->records->setPage($page);
		$this->records->init();
	}

	public function executeNew(sfWebRequest $request) {
		$object = new Image();
		$object->setProductId($this->product->getId());
		$this->form = new ImageForm($object);
		if ($request->isMethod(sfRequest::PUT)) {
			$this->processForm($request, $this->form);
		}
	}

	public function executeEdit(sfWebRequest $request) {
		$this->forward404Unless($object = Doctrine_Core::getTable('Image')->find(array($request->getParameter('id'))), sprintf('Object image does not exist (%s).', $request->getParameter('id')));
		$this->form = new ImageForm($object);
		if ($request->isMethod(sfRequest::POST)) {
			$this->processForm($request, $this->form);
		}
	}

	public function executeDelete(sfWebRequest $request) {
		$request->checkCSRFProtection();
		$this->forward404Unless($object = Doctrine_Core::getTable('Image')->find(array($request->getParameter('id'))), sprintf('Object image does not exist (%s).', $request->getParameter('id')));
		$object->delete();
		$this->getUser()->setFlash('success', 1);
		$this->redirect('@images_list?product_id=' . $this->product->getId());
	}

	public function executeDelete_selected(sfWebRequest $request) {
		// Delete records
		$record_ids = $request->getParameter('record_id');
		if (!empty($record_ids)) {
			foreach ($record_ids as $record_id) {
				$record = Doctrine::getTable('Image')->find((int) $record_id);
				if ($record) {
					$record->delete();
				}
			}
		}
		$this->getUser()->setFlash('success', 1);
		$this->redirect('@images_list?product_id=' . $this->product->getId());
	}

	protected function processForm(sfWebRequest $request, sfForm $form) {
		$form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
		if ($form->isValid()) {
			$object = $form->save();
			$this->getUser()->setFlash('success', 1);
			$this->redirect('@images_edit?product_id=' . $this->product->getId() . '&id=' . $object->getId());
		}
	}

}
