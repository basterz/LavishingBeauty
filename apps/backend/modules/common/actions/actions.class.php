<?php

/**
 * common actions.
 *
 * @package    FancyFooter
 * @subpackage common
 * @author     Vertinity
 */
class commonActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->latest_users = Doctrine_Core::getTable('User')
            ->createQuery()
            ->orderBy('created_at DESC')
            ->limit(10)
            ->fetchArray();
  }
}
