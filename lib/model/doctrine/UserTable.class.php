<?php

/**
 * UserTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class UserTable extends Doctrine_Table
{
  /**
   * Returns an instance of this class.
   *
   * @return object UserTable
   */
  public static function getInstance()
  {
    return Doctrine_Core::getTable('User');
  }
  
  public function createUser($data)
  {
    $user = new User();
    
    $user->setName($data['name']);
    $user->setEmail($data['email']);
    
    $hashedPassword = sfContext::getInstance()->getUser()->getHashedPassword($data['password']);
    $user->setPassword($hashedPassword);
    
    $user->setIsActive(false);
    $user->setRole($data['role']);
    $user->Save();
    
    return $user;
  }
  
  public function getUserByCredentials($credentials)
  {
    $user = Doctrine_Core::getTable('User')
            ->createQuery('a')
            ->where('is_active = ?', true)
            ->andWhere('a.email = ?', $credentials['email'])
			->andWhere('a.role = ?', 'admin')
            ->limit(1)
            ->fetchOne(array(), Doctrine_Core::HYDRATE_RECORD);

    if ($user)
    {
      $hashedPassword = sfContext::getInstance()->getUser()->getHashedPassword($credentials['password']);
      if ($hashedPassword == $user->getPassword())
      {
        
        $this->accessLog(array('email' => $credentials['email'], 'user_id' => $user->getId()));
        return $user;
      }
    }
    $this->accessLog(array('email' => $credentials['email'], 'user_id' => null));
    return null;
  }
  
  public function accessLog (Array $data) {
    $request = sfContext::getInstance()->getRequest();
    $ipAddress = $request->getHttpHeader('addr', 'remote');
    $browserInfo = $request->getHttpHeader('User-Agent');
    
    $userSession = new UserSession();
    $userSession->setName($data['email']);
    $userSession->setUserId($data['user_id']);
    $userSession->setIp($ipAddress);
    $userSession->setBrowserInfo($browserInfo);
    $userSession->save();
  }
  
  public function getActiveUserById($id)
  {
    return $this->createQuery()
                ->where('is_active = ?', true)
                ->andWhere('id = ?', $id)
                ->limit(1)
                ->fetchOne();
  }
  
  public function getActiveUserByEmail($email)
  {
    return $this->createQuery()
                ->where('is_active = ?', true)
                ->andWhere('email = ?', $email)
                ->limit(1)
                ->fetchOne();
  }
  
  public function getUserByHashedKey($hashed_id, $is_active)
  {
    return $this->createQuery('a')
            ->where('a.is_active = ?', $is_active)
            ->andWhere('MD5(a.id) = ?', $hashed_id)
            ->limit(1)
            ->fetchOne();
  }
  
  public function getConfirmKey($user_id)
  {
    return base64_encode(md5($user_id).','.time());
  }
  
  /**
   * Return codes:
   * 
   * 0: success
   * 1: invalid key
   * 2: expired
   * 3: user not found
   *
   * @param string $key
   * @param User|null &$user
   * @return int
   */
  public function processConfirmKey($key, &$user = null)
  {
    if (!$key) {
      return 1;
    }
    
    $data = explode(',', base64_decode($key));
    if (count($data) != 2) {
      return 1;
    }
    
    $days = (time() - $data[1]) / (7 * 24 * 60 * 60);
    if ($days > 7) { // TODO: use a config var
      return 2;
    }
    
    $user = $this->getUserByHashedKey($data[0], false);
    if (!$user) {
      return 3;
    }
    $user->setIsApproved(true);
    $user->save();
    return 0;
  }
  
  public function generatePassword(User $user)
  {
    if ($user) {
      $password = substr(md5(time()), 0, 10);
      $hashedPassword = sfContext::getInstance()->getUser()->getHashedPassword($data['password']);
      $user->setPassword($hashedPassword);
      $user->save();
      return $password;
    }
    return null;
  }
  
  public function getListingQuery($filters, $orderBy)
  {
    $query = $this->createQuery();
    if (isset($filters['search_text']) && $filters['search_text']) {
      $search = '%' . $filters['search_text'] . '%';
      $query->where('email LIKE ? OR name LIKE ?', array($search, $search));
    }
    if (isset($filters['role']) && $filters['role']) {
      $query->where('role = ?', $filters['role']);
    }
    if (isset($filters['date']) && $filters['date']) {
      if (isset($filters['date']['from']) && is_array($filters['date']['from'])) {
        $from = array_filter($filters['date']['from']);
        if (count($from) == 3) {
          $from_date = $from['year'] . '-' . $from['month'] . '-' . $from['day'] . ' 00:00:01';
          $query->andWhere('created_at >= ?', $from_date);
        }
      }
      if (isset($filters['date']['to']) && is_array($filters['date']['to'])) {
        $to = array_filter($filters['date']['to']);
        if (count($to) == 3) {
          $to_date = $to['year'] . '-' . $to['month'] . '-' . $to['day'] . ' 23:59:59';
          $query->andWhere('created_at <= ?', $to_date);
        }
      }
    }
    $query->orderBy($orderBy);
    return $query;
  }
}