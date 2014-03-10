<?php
class MessageForm extends sfForm
{
  public function configure() {
    $this->setWidgets(array(
        'name' => new sfWidgetFormInputText(),
        'email' => new sfWidgetFormInputText(),
        'message' => new sfWidgetFormTextarea(),
    ));
    
    $this->setValidators(array(
        'name' => new sfValidatorString(),
        'email' => new sfValidatorEmail(),
        'message' => new sfValidatorString()
    ));
    
    $this->getWidgetSchema()->setNameFormat('mail_form[%s]');
  }
}