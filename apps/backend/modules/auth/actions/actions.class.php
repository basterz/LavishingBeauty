<?php

/**
 * auth actions.
 *
 * @package    FancyFooter
 * @subpackage auth
 * @author     Vertinity
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class authActions extends sfActions
{
  public function preExecute()
  {
    $this->setLayout('login');
  }
  
  public function executeSign_in(sfWebRequest $request)
  {
    if ($this->getUser()->isAuthenticated()) {
      $this->redirect('@homepage');
    }
    $this->return_url = $this->getController()->genUrl($request->getParameterHolder()->getAll());
    $this->form = new SignInForm();
    if ($request->isMethod(sfWebRequest::POST)) {
      $this->form->bind($request->getParameter('sign_in'));
      if ($this->form->isValid()) {
        $user = Doctrine_Core::getTable('User')->getUserByCredentials(array(
            'email' => $this->form->getValue('email'),
            'password' => $this->form->getValue('password')
        ));
        if ($user) {
          $this->getUser()->signIn($user, $this->form->getValue('remember_me'));
          $return_url = $request->getParameter('return_url');
          $this->redirect($return_url ? $return_url : '@homepage');
        } else {
          $this->getUser()->setFlash('sign_in_error', 1);
          $this->redirect('@sign_in');
        }
      }
    }
  }
  
  public function executeSign_out(sfWebRequest $request)
  {
    $this->getUser()->signOut();
    $this->getUser()->setFlash('sign_out_success', 1);
    $this->redirect('@sign_in');
  }
}
