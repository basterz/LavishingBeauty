<?php
function get_embedded_video($url, $width = null, $height = null) {
  $video_key = get_video_key($url);
  if (!$width)
    $width = 600;
  if (!$height)
    $height = 490;
  return '<iframe width="'.$width.'" height="'.$height.'" src="http://www.youtube.com/embed/'.$video_key.'" frameborder="0" allowfullscreen></iframe>';
}

function get_video_key($url) {
  $query_string = parse_url($url, PHP_URL_QUERY);
  $vars = array();
  parse_str($query_string, $vars);
  return $vars['v'];
}

function get_video_image($url, $type) {
  return VideoModel::getOne($url, 'small', $type);
}