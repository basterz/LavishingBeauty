<?php $action = $sf_context->getActionName(); ?>
<div id="sidebar">
  <ul class="v-nav">
    <li><a href="<?php echo url_for('@users_list') ?>"<?php echo $action == 'index' ? ' class="selected"' : '' ?>><?php echo __('Потребители'); ?></a></li>
    <li><a href="<?php echo url_for('@users_new') ?>"<?php echo $action == 'new' ? ' class="selected"' : '' ?>><?php echo __('Нов Потребител'); ?></a></li>
  </ul>
</div>