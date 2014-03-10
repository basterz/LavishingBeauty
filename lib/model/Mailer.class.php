<?php

/**
 * Wrapper for sending mails
 *
 * @author st2
 */
class Mailer {
  private $_mailer;

  public function __construct() {
    $this->_mailer = sfContext::getInstance()->getMailer();
    $this->_mailer->registerPlugin(new Swift_Plugins_AntiFloodPlugin(100, 1));
  }

  public function sendMail($from, $to, $subject, $body)
  { 
    $message = Swift_Message::newInstance()
                ->setFrom($from)
                ->setTo($to)
                ->setSubject($subject)
                ->setBody($body, 'text/html');

    $this->_mailer->send($message);
  }
}
?>
