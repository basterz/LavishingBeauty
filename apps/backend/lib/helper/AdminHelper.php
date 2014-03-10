<?php

function get_breadcrumb(Array $routes) {
  $output = '<div id="breadcrumb"><ul><li class="home"><a href="' . url_for('@homepage') . '">&nbsp;</a></li>';
  foreach ($routes as $route => $label) {
    if ($route) {
      $output .= '<li><a href="' . url_for($route) . '">' . $label . '</a></li>';
    } else {
      $output .= '<li><span>' . $label . '</span></li>';
      break;
    }
  }
  $output .= '</ul></div>';
  return $output;
}

function get_current_user_ip() {
  return sfContext::getInstance()->getRequest()->getHttpHeader('addr', 'remote');
}

function get_previous_user_ip() {
  return Doctrine_Core::getTable('UserSession')
          ->createQuery()
          ->select('ip')
          ->orderBy('created_at DESC')
          ->offset(1)
          ->limit(1)
          ->fetchOne(array(), Doctrine_Core::HYDRATE_SINGLE_SCALAR);
}