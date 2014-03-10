<?php
function url_exists($url) {
  $url = @parse_url($url);
  if (!$url) {
    return false;
  }
  
  $url = array_map('trim', $url);
  $url['port'] = (!isset($url['port'])) ? 80 : (int)$url['port'];
  
  $path = isset($url['path']) ? $url['path'] : '/';
  $path .= isset($url['query']) ? '?' . $url[query] : ''; 
  
  if (isset($url['host']) && $url['host'] != gethostbyname($url['host'])) {
    $fp = fsockopen($url['host'], $url['port'], $errno, $errstr, 30);
    if (!$fp) {
      return false;
    }
    fputs($fp, "HEAD $path HTTP/1.1\r\nHost: $url[host]\r\n\r\n");
    $headers = fread($fp, 4096);
    fclose($fp);
    if(preg_match('#^HTTP/.*\s+[(200|301|302)]+\s#i', $headers)) {
      return true;
    }
    return false;
  }
  return false;
}