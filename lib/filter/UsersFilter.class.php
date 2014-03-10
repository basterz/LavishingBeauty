<?php

class UsersFilter extends sfForm
{
  public function configure()
  {
    $this->setWidgets(array(
        'search_text' => new sfWidgetFormInputText(),
        'role' => new sfWidgetFormChoice(array('choices' => array('' => '', 'admin' => 'Administrator', 'user' => 'User'))),
        'date' => new sfWidgetFormDateRange(array(
            'from_date' => new sfWidgetFormDate(array('format' => '%day% %month% %year%')),
            'to_date' => new sfWidgetFormDate(array('format' => '%day% %month% %year%')),
            'template' => '%from_date% - %to_date%'
        ))
    ));
    
    $this->setValidators(array(
        'search_text' => new sfValidatorString(array('required' => false)),
        'role' => new sfValidatorChoice(array('required' => false, 'choices' => array('admin' => 'Administrator', 'user' => 'User'))),
        'date' => new sfValidatorDateRange(array(
            'required' => false,
            'from_date' => new sfValidatorDate(),
            'to_date' => new sfValidatorDate()
        ))
    ));
  }
}