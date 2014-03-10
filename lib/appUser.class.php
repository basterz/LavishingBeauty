<?php

class appUser extends sfBasicSecurityUser
{

  public function signIn($user, $remember_me = false)
  {
    $this->setAuthenticated(true);
    $this->addCredential($user->getRole());
    if ($user->getRole() == 'admin')
    {
      $_SESSION['authenticated_user'] = true;
    }
    
    // remember me?
    if ($remember_me) {
    $data = array(
        'hashed_id' => md5($user->getId())
    );
    $cookieSettings = sfConfig::get('app_cookie_settings');
    sfContext::getInstance()->getResponse()->setCookie(
            $cookieSettings['name'],
            base64_encode(serialize($data)),
            time() + 60 * 60 * 24 * $cookieSettings['days'],
            '/');
    }
    $this->setUserData($user);
  }
  
  public function signOut()
  {
    $this->clearCredentials();
    $this->setAuthenticated(false);
    $this->getAttributeHolder()->remove('user_data');
    unset ($_SESSION['authenticated_user']);
    // Remove the cookies
    $cookieSettings = sfConfig::get('app_cookie_settings');
    sfContext::getInstance()->getResponse()->setCookie(
            $cookieSettings['name'],
            '',
            time() - 3600,
            '/');
  }
  
  public function setUserData($user)
  {
    $userData = array(
        'email' => $user->getEmail(),
        'role' => $user->getRole(),
        'name' => $user->getName()
    );
    
    $this->setAttribute('user_data', $userData);
  }
  
  public function getHashedPassword($password)
  {
    return sha1($password . sfConfig::get('app_salt'));
  }
}