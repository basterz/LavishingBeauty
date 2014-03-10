<?php
function link_to_listing(sfWebRequest $request = null, $params = null, $exclude = null)
{
  if (!$request) {
    $request = sfContext::getInstance()->getRequest();
  }
  $controller = sfContext::getInstance()->getController();
  $route_params = $request->getParameterHolder()->getAll();
  if ($params) {
    $route_params = array_merge($route_params, $params);
  }
  if ($exclude) {
    $route_params = array_diff_key($route_params, $exclude);
  }

  return $controller->genUrl($route_params);
}