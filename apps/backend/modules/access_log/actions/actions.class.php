<?php

/**
 * access_log actions.
 *
 * @package    FancyFooter
 * @subpackage access_log
 * @author     Vertinity
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class access_logActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $filters = array(
        'email' => $request->getParameter('email'),
        'ip' => $request->getParameter('ip'),
        'browser_info' => $request->getParameter('browser_info'),
        'date' => $request->getParameter('date'),
    );
    $this->filters = new AccessLogFilter($filters);
    $page = (int)$request->getParameter('page', 1);
    $this->records = new sfDoctrinePager('UserSession', 100);
    $query = Doctrine_Core::getTable('UserSession')->getListingQuery(is_array($filters) ? $filters : array());
    $this->records->setQuery($query);
    $this->records->setPage($page);
    $this->records->init();
  }
}
