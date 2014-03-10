<?php

/**
 * emails actions.
 *
 * @package    FancyFooter
 * @subpackage emails
 * @author     Vertinity
 */
class emailsActions extends sfActions
{
  public function executePrivate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfWebRequest::POST));
    $return_url = $request->getParameter('return_url', '@users_list');
    $form = new MailForm();
    $form->bind($request->getParameter('mail_form'));
    if ($form->isValid()) {
      $user = Doctrine_Core::getTable('User')->find($form->getValue('user_id'));
      if ($user) {
        $mailer = new Mailer();
        $body = $this->getPartial('message', array('body' => $form->getValue('body')));
        $mailer->sendMail(
                sfConfig::get('app_contact_email'),
                $user->getEmail(),
                $form->getValue('subject'),
                $body);
        $this->getUser()->setFlash('mail_success', 1);
      } else {
        $this->getUser()->setFlash('mail_error', 1);
      }
    } else {
      $this->getUser()->setFlash('mail_error', 1);
    }
    $this->redirect($return_url);
  }
  
  public function executeSelected(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfWebRequest::POST));
    $return_url = $request->getParameter('return_url', '@users_list');
    $form = new MailForm();
    $form->bind($request->getParameter('mail_form'));
    if ($form->isValid()) {
      $user_ids = $request->getParameter('user_ids');
      if (is_array($user_ids) && count($user_ids) > 0) {
        $emails = Doctrine_Core::getTable('User')
                ->createQuery()
                ->select('email')
                ->whereIn('id', $user_ids)
                ->fetchArray();
        $to = array();
        foreach ($emails as $email) {
          $to[] = $email['email'];
        }
        $mailer = new Mailer();
        $body = $this->getPartial('message', array('body' => $form->getValue('body')));
        $mailer->sendMail(
                sfConfig::get('app_contact_email'),
                $to,
                $form->getValue('subject'),
                $body);
        $this->getUser()->setFlash('mail_success', 1);
      } else {
        $this->getUser()->setFlash('mail_error', 1);
      }
    } else {
      $this->getUser()->setFlash('mail_error', 1);
    }
    $this->redirect($return_url);
  }
  
  public function executeAll(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfWebRequest::POST));
    $return_url = $request->getParameter('return_url', '@users_list');
    $form = new MailForm();
    $form->bind($request->getParameter('mail_form'));
    if ($form->isValid()) {
      $emails = Doctrine_Core::getTable('User')
              ->createQuery()
              ->select('email')
              ->fetchArray();
      $to = array();
      foreach ($emails as $email) {
        $to[] = $email['email'];
      }
      $mailer = new Mailer();
      $body = $this->getPartial('message', array('body' => $form->getValue('body')));
      $mailer->sendMail(
              sfConfig::get('app_contact_email'),
              $to,
              $form->getValue('subject'),
              $body);
      $this->getUser()->setFlash('mail_success', 1);
    } else {
      $this->getUser()->setFlash('mail_error', 1);
    }
    $this->redirect($return_url);
  }
}
