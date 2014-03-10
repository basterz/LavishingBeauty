<div class="<?php echo $type . (isset($class) ? ' ' . $class : '') ?>"<?php echo isset($style) ? ' style="' . $style . '"' : '' ?><?php echo isset($id) ? ' id="' . $id . '"' : '' ?>>
  <div class="<?php echo $type ?>-content"><?php echo $message ?></div>
  <a href="#" class="msg-close"></a>
</div>