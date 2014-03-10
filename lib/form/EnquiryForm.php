<?php

class EnquiryForm extends sfForm {

	public function configure() {
		$this->setWidgets(array(
			'name' => new sfWidgetFormInputText(),
			'email' => new sfWidgetFormInputText(),
			'company' => new sfWidgetFormInputText(),
			'frequency' => new sfWidgetFormChoice(array(
					'choices' => array_keys(array(
						'Please Select' => 0,
						'One Off' => 'One Off',
						'Once A Month' => 'Once A Month',
						'Once A Year' => 'Once A Year'
						))),
					array('required' => 'Please choose something!'))
		));

		$this->setValidators(array(
			'name' => new sfValidatorString(),
			'email' => new sfValidatorEmail(),
			'company' => new sfValidatorString(),
			'frequency' => new sfValidatorString()
		));

		$this->getWidgetSchema()->setNameFormat('enquiry_form[%s]');
	}

}

?>