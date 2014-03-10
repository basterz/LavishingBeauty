<?php

class AccessLogFilter extends sfForm
{
  public function configure() {
    $this->setWidgets(array(
        'email' => new sfWidgetFormInputText(),
        'ip' => new sfWidgetFormInputText(),
        'browser_info' => new sfWidgetFormInputText(),
        'date' => new sfWidgetFormDateRange(array(
            'from_date' => new sfWidgetFormDate(array('format' => '%day% %month% %year%')),
            'to_date' => new sfWidgetFormDate(array('format' => '%day% %month% %year%')),
            'template' => '%from_date% - %to_date%'
        ))
    ));
    $this->setValidators(array(
        'email' => new sfValidatorEmail(),
        'ip' => new sfValidatorString(),
        'browser_info' => new sfValidatorString(),
        'date' => new sfValidatorDateRange(array(
            'from_date' => new sfValidatorDate(),
            'to_date' => new sfValidatorDate()
        ))
    ));
  }
}