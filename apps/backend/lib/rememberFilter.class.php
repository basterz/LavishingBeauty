<?php
class rememberFilter extends sfFilter
{
  public function execute ($filterChain)
  {
    $sfUser = sfContext::getInstance()->getUser();
    if ($this->isFirstCall() && !$sfUser->isAuthenticated()) {
      $cookieSettings = sfConfig::get('app_cookie_settings');
      $cookie = $this->getContext()->getRequest()->getCookie($cookieSettings['name']);
      if ($cookie) {
        $data = unserialize(base64_decode($cookie));
        $user = Doctrine_Core::getTable('User')->getUserByHashedKey($data['hashed_id'], true);
        if ($user) {
          $sfUser->signIn($user, true);
        }
      }
    }
    $filterChain->execute($filterChain);
  }
}