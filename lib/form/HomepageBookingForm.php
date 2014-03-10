<?php
class HomepageBookingForm extends sfForm {
    public function configure() {
    $this->setWidgets(array(
        'category' => new sfWidgetFormChoice(
        array('choices' => array_keys(array(
              'Please Select' => 0,
              'One Off' => 'One Off',
              'Once A Month' => 'Once A Month',
              'Once A Year' => 'Once A Year'
             ))), array('required' => 'Please choose something!')
        ),
        'product' => new sfWidgetFormChoice(array(
             'choices' => array_keys(array(
	     'Please Select' => 0,
             'One Off' => 'One Off',
             'Once A Month' => 'Once A Month',
             'Once A Year' => 'Once A Year'
            ))), array('required' => 'Please choose something!')),
        'area' => new sfWidgetFormInputText(),
        'date' => new sfWidgetFormInputText()
    ));
    
    $this->setValidators(array(
        'category' => new sfValidatorString(),
        'product' => new sfValidatorString(),
        'area' => new sfValidatorString(),
        'date' => new sfValidatorString()
    ));
    
    $this->getWidgetSchema()->setNameFormat('homepage_booking_form[%s]');
  }
}
