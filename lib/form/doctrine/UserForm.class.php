<?php

/**
 * User form.
 *
 * @package    cmp
 * @subpackage form
 * @author     St2
 */
class UserForm extends BaseUserForm
{
  public function configure() 
  {
      
    $roles = sfConfig::get('app_roles');
    unset($this['remember_key'], $this['created_at'], $this['updated_at']);
    
    // Role
    $this->widgetSchema['role'] = new sfWidgetFormChoice(array('choices' => $roles));
    $this->validatorSchema['role'] = new sfValidatorChoice(array('choices' => array_keys($roles)));
    $this->setDefault('role', 'user');

    // Email
    $this->validatorSchema['email'] = new sfValidatorEmail(array(), array('invalid' => 'Invalid email'));
    
    // Password
    if ($this->isNew()) {
      $this->widgetSchema['password'] = new sfWidgetFormInputPassword();
      $this->validatorSchema['password'] = new sfValidatorAnd(array(
          new sfValidatorString(array('min_length' => 4, 'max_length'  => 20), array(
              'min_length' => 'Password must be between 4 and 20 characters',
              'max_length' => 'Password must be between 4 and 20 characters')),
          new sfValidatorRegex(array('pattern' => '/^[A-z0-9_\-\.]*$/i'),array(
              'invalid' => 'Allowed characters are latin letters, 0-9, ".", "-" and "_"'))));
    } else {
      unset($this['password']);
      $this->validatorSchema['password'] = new sfValidatorPass();
      
      $this->widgetSchema['new_password'] = new sfWidgetFormInputPassword();
      $this->validatorSchema['new_password'] = new sfValidatorAnd(array(
          new sfValidatorString(array('min_length' => 4, 'max_length'  => 20), array(
              'min_length' => 'Password must be between 4 and 20 characters',
              'max_length' => 'Password must be between 4 and 20 characters')),
          new sfValidatorRegex(array('pattern' => '/^[A-z0-9_\-\.]*$/i'),array(
              'invalid' => 'Allowed characters are latin letters, 0-9, ".", "-" and "_"'))),
        array('required' => false));
    }
    
    // Is active
    $this->setDefault('is_active', false);
  }
  
  public function doSave($con = null) {
    // Password hashing
    $appUser = sfContext::getInstance()->getUser();
    if ($this->isNew()) {
      $this->values['password'] = $appUser->getHashedPassword($this->values['password']);
    } else {
      if (!empty($this->values['new_password'])) {
        $this->values['password'] = $appUser->getHashedPassword($this->values['new_password']);
      } else {
        $this->values['password'] = $this->getObject()->getPassword();
      }
    }
    
    return parent::doSave($con);
  }
}