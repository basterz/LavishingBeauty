<?php

/**
 * App configs cached in the session.
 *
 * @author stef
 */
class AppConfigs
{
  public static function getVar($key) {
    $vars = sfContext::getInstance()->getUser()->getAttribute('app_vars');
    if (isset($vars[$key])) {
      return $vars[$key];
    }
    return null;
  }
}