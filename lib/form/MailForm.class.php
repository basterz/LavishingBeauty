<?php
class MailForm extends sfForm
{
  public function configure() {
    $this->setWidgets(array(
        'subject' => new sfWidgetFormInputText(),
        'body' => new sfWidgetFormTextarea(),
        'user_id' => new sfWidgetFormInputHidden()
    ));
    
    $this->setValidators(array(
        'subject' => new sfValidatorString(),
        'body' => new sfValidatorString(),
        'user_id' => new sfValidatorNumber(array('required' => false))
    ));
    
    $this->getWidgetSchema()->setNameFormat('mail_form[%s]');
  }
}