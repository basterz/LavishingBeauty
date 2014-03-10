<?php
/**
 * Check if the cached version exists, otherwise create one
 *
 * @param <string> $image
 * @param <int> $width
 * @param <int> $height
 * @param <boolean> $use_adaptive_resize = false
 */
function get_cached_image($image, $width, $height, $use_adaptive_resize = false) {
  $image_data = pathinfo($image);
  $cached_version = $image_data['filename'] . '_' . $width . '_' . $height . '.' . $image_data['extension'];
  $cached_version_path = sfConfig::get('sf_upload_dir') . '/cache/' . $cached_version;
  if (file_exists($cached_version_path)) {
    return sfContext::getInstance()->getRequest()->getRelativeUrlRoot() . '/uploads/cache/' . $cached_version;
  }
  try {
    $image = PhpThumbFactory::create($image);
    if ($use_adaptive_resize) {
      $image->adaptiveResize($width, $height);
    } else {
      $image->resize($width, $height);
    }
    $image->save($cached_version_path);
    return sfContext::getInstance()->getRequest()->getRelativeUrlRoot() . '/uploads/cache/' . $cached_version;
  } catch (Exception $e) {
    return '';
  }
}

function unlink_cached_image($image) {
  $image_data = pathinfo($image);
  $search_pattern = sfConfig::get('sf_upload_dir') . '/cache/' . $image_data['filename'] . '*';
  $matched_files = glob($search_pattern);
  foreach ($matched_files as $file) {
    @unlink($file);
  }
}