<?php

/**
 * pages actions.
 *
 * @package    osteo_cardics
 * @subpackage pages
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class pagesActions extends sfActions {

	public function preExecute() {
		$request = $this->getRequest();
		$this->type = $request->getParameter('type');
	}

	public function executeIndex(sfWebRequest $request) {
		$this->page = Doctrine_Core::getTable('Page')
			->createQuery('a')
			->leftJoin('a.Translation t')
			->where('t.lang = ?', $this->getUser()->getCulture())
			->andWhere('a.type = ?', $this->type)
			->andWhere('t.is_published = ?', true)
			->limit(1)
			->fetchOne();
                $this->populateMetaData($this->page);

	}

	public function executePage() {
		$page = Doctrine_Core::getTable('Page')
			->createQuery('a')
			->leftJoin('a.Translation t')
			->where('t.lang = ?', $this->getUser()->getCulture())
			->andWhere('a.type = ?', $this->type)
			->andWhere('t.is_published = ?', true)
			->limit(1)
			->fetchOne();
		if ($page) {

			// find the home page id
			$page_id = Doctrine_Core::getTable('Page')
				->createQuery()
				->select('id')
				->where('type = 1')
				->limit(1)
				->fetchOne(array(), Doctrine_Core::HYDRATE_SINGLE_SCALAR);

			$this->page_type = $this->type;
			$this->page = $page->toArray();

			$pages = sfConfig::get('app_translated_page_types');
			$this->page_name = $pages[$this->type];

			// SEO
			$this->populateMetaData($this->page);
		}
	}

	public function executeContacts(sfWebRequest $request) {

		$page = Doctrine_Core::getTable('Page')
			->createQuery('a')
			->leftJoin('a.Translation t')
			->where('t.lang = ?', $this->getUser()->getCulture())
			->andWhere('a.type = ?', $this->type)
			->andWhere('t.is_published = ?', true)
			->limit(1)
			->fetchOne();
		if ($page) {

			// find the home page id
			$page_id = Doctrine_Core::getTable('Page')
				->createQuery()
				->select('id')
				->where('type = 1')
				->limit(1)
				->fetchOne(array(), Doctrine_Core::HYDRATE_SINGLE_SCALAR);


			$this->page = $page;

			$pages = sfConfig::get('app_translated_page_types');
			$this->page_name = $pages[$this->type];
			// SEO
			$this->populateMetaData($this->page);
		}

		$this->form = new MessageForm();

		if ($request->isMethod(sfWebRequest::POST)) {
			$this->form->bind($request->getParameter('mail_form'));
			//$valid = $request->getParameter('anti');

			if ($this->form->isValid()) {
				$from = $this->form->getValue('email');
				$to = sfConfig::get('app_receiver_email');
				$name = $this->form->getValue('name');
				$subject = $this->form->getValue('message   ') . $this->form->getValue('about');
				$body = $this->getPartial('common/contactMail', array(
					'name' => $name,
					'email' => $from,
					'subject' => $subject,
					'body' => $this->form->getValue('message')
					));

				$mailer = new Mailer();
                                
				$mailer->sendMail($from, $to, $subject, $body);
                                
				$this->getUser()->setFlash('success', 1);
				$this->redirect('@homepage');
			}
                        $this->redirect('@homepage');
		}
	}
        public function executeSend(sfWebRequest $request){
            
            $form = new MessageForm();
            if ($request->isMethod(sfWebRequest::POST)) {
			$form->bind($request->getParameter('mail_form'));
			$valid = $request->getParameter('anti');
              
                        $form_rfesultForm = $form->isValid();
     
			if ($form->isValid()) {
				$from = $form->getValue('email');
				$to = sfConfig::get('app_receiver_email');
				$name = $form->getValue('name');
				$subject = $form->getValue('message') . $form->getValue('about');
				$body = $this->getPartial('common/contactMail', array(
					'name' => $name,
					'email' => $from,
					'subject' => $subject,
					'body' => $form->getValue('message')
					));

				$mailer = new Mailer();
                                if($valid == null){
                                    $mailer->sendMail($from, $to, $subject, $body);
                                    
                                }
   
				$this->getUser()->setFlash('success', 1);
				$this->redirect('@homepage');
                                var_dump($form);
			}
                        else{
                            $this->getUser()->setFlash('error', 1);
                        }
                        
                        $this->redirect('@homepage');
		}
        }

	public function executeSubscribe(sfWebRequest $request) {
		$page = Doctrine_Core::getTable('Page')
			->createQuery('a')
			->leftJoin('a.Translation t')
			->where('t.lang = ?', $this->getUser()->getCulture())
			->andWhere('a.type = ?', $this->type)
			->andWhere('t.is_published = ?', true)
			->limit(1)
			->fetchOne();
		if ($page) {

			// find the home page id
			$page_id = Doctrine_Core::getTable('Page')
				->createQuery()
				->select('id')
				->where('type = 9')
				->limit(1)
				->fetchOne(array(), Doctrine_Core::HYDRATE_SINGLE_SCALAR);


			$this->page = $page;

			$pages = sfConfig::get('app_translated_page_types');
			$this->page_name = $pages[$this->type];
			// SEO
			$this->populateMetaData($this->page);
		}

		$this->form = new SubscribtionForm();

		if ($request->isMethod(sfRequest::POST)) {

			$this->processForm($request, $this->form);
		}
	}

	private function populateMetaData($page) {
		$response = $this->getResponse();
		if (isset($page['Translation'][$this->getUser()->getCulture()]['meta_keywords']) && $page['Translation'][$this->getUser()->getCulture()]['meta_keywords']) {
			$response->addMeta('keywords', $page['Translation'][$this->getUser()->getCulture()]['meta_keywords']);
		}
		if (isset($page['Translation'][$this->getUser()->getCulture()]['meta_description']) && $page['Translation'][$this->getUser()->getCulture()]['meta_description']) {
			$response->addMeta('description', $page['Translation'][$this->getUser()->getCulture()]['meta_description']);
		}
		if (isset($page['Translation'][$this->getUser()->getCulture()]['meta_title']) && $page['Translation'][$this->getUser()->getCulture()]['meta_title']) {
			$response->setTitle($page['Translation'][$this->getUser()->getCulture()]['meta_title']);
		}
	}

	protected function processForm(sfWebRequest $request, sfForm $form) {
		$form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));

		if ($form->isValid()) {

			$from = $form->getValue('email');
			$to = sfConfig::get('app_receiver_email');
			$name = $form->getValue('name');
			$subject = 'Запитване от контактна форма';
			$body = $this->getPartial('common/contactMail', array(
				'name' => $name,
				'email' => $from,
				'subject' => $subject,
				'body' => $name
				));

			$mailer = new Mailer();
			$mailer->sendMail($from, $to, $subject, $body);

			$form->save();
			$this->getUser()->setFlash('success', 1);
			$this->redirect('@subscribe');
		}
	}

	public function executeSearch(sfWebRequest $request) {
		$search_word = $request->getParameter("search_word");
		$this->products = Doctrine_Core::getTable('Product')
			->createQuery('a')
			->leftJoin('a.Translation t WITH t.lang = ?', $this->getUser()->getCulture())
			->where('t.title LIKE ?', '%' . $search_word . '%')
			->orWhere('t.body LIKE ?', '%' . $search_word . '%')
			->execute();
		$this->services = Doctrine_Core::getTable('Category')
			->createQuery('a')
			->leftJoin('a.Translation t WITH t.lang = ?', $this->getUser()->getCulture())
			->where('t.title LIKE ?', '%' . $search_word . '%')
			->orWhere('t.body LIKE ?', '%' . $search_word . '%')
			->execute();
		$this->articles = Doctrine_Core::getTable('Article')
			->createQuery('a')
			->leftJoin('a.Translation t WITH t.lang = ?', $this->getUser()->getCulture())
			->where('t.title LIKE ?', '%' . $search_word . '%')
			->orWhere('t.body LIKE ?', '%' . $search_word . '%')
			->execute();
	}
        public function executeVirtual(sfWebRequest $request){
            
        }

}
