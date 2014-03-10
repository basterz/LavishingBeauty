<?php
function hex_darker($hex, $factor = 30, $add_hash = true) {
  $new_hex = '';

  $base['R'] = hexdec($hex{1} . $hex{2});
  $base['G'] = hexdec($hex{3} . $hex{4});
  $base['B'] = hexdec($hex{5} . $hex{6});

  foreach ($base as $k => $v) {
    $amount = $v / 100;
    $amount = round($amount * $factor);
    $new_decimal = $v - $amount;

    $new_hex_component = dechex($new_decimal);
    if (strlen($new_hex_component) < 2) {
      $new_hex_component = "0" . $new_hex_component;
    }
    $new_hex .= $new_hex_component;
  }
  
  return ($add_hash ? '#' : '') . $new_hex;
}