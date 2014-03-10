<?php

class ProductFilter extends sfForm
{
  public function configure() {
    $this->setWidgets(array(
        'search_text' => new sfWidgetFormInputText(),
        'category' => new sfWidgetFormInputText()
    ));
    
    $this->setValidators(array(
        'search_text' => new sfValidatorString(array('required' => false)),

    ));
  }
}