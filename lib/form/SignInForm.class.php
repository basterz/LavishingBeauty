<?php

/**
 * Login form.
 *
 * @package    mmm
 * @subpackage form
 * @author     st2
 */
class SignInForm extends sfForm
{
  public function configure()
  {
    // Set windgets
    $this->setWidgets(array(
        'email'     => new sfWidgetFormInputText(),
        'password'  => new sfWidgetFormInputPassword(),
        'remember_me' => new sfWidgetFormInputCheckbox()
    ));
    // Set validators
    $this->setValidators(array(
        'email' => new sfValidatorEmail(array(), array('invalid' => 'Inavalid email')),
        'password' => new sfValidatorAnd(array(
            new sfValidatorString(array('min_length' => 4, 'max_length'  => 20), array(
                'min_length' => 'The password must be between 4 and 20 characters',
                'max_length' => 'The password must be between 4 and 20 characters')),
            new sfValidatorRegex(array('pattern' => '/^[A-z0-9_\-\.]*$/i'),array(
                'invalid' => 'Allowed characters are latin letters, 0-9, ".", "-" and "_"')))),
        'remember_me' => new sfValidatorPass()
    ));

    $this->widgetSchema->setNameFormat('sign_in[%s]');
    $this->disableLocalCSRFProtection();
  }
}