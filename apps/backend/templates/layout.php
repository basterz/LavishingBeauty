<?php $module = $sf_context->getModuleName(); ?>
<!DOCTYPE html>
<html>
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="<?php echo public_path('/images/admin/favicon.ico') ?>" />
    <?php use_stylesheet('admin/main.css') ?>
    <?php include_stylesheets() ?>
  </head>
  <body class="<?php include_slot('body_class') ?>">
    <div id="container">
      <div id="header">
        <div id="header-top">
          <div class="fleft"><?php echo __('Здравейте'); ?> <strong> (admin - <?php echo get_current_user_ip() ?>)</strong> | <?php echo __('Последно посещение от:'); ?> <?php echo get_previous_user_ip() ?></div>
          <div class="fright">
            <a href="#" class="button"><?php echo __('Начална стрница'); ?></a>
            <a href="<?php echo url_for('@sign_out') ?>" class="button"><?php echo __('Изход'); ?></a>
          </div>
        </div>
        
        <div id="main-nav">
          <ul>
            <li><a href="<?php echo url_for('@homepage') ?>"><?php echo image_tag('/images/admin/icons/clipboard_big.png', array('alt' => 'users')) ?><?php echo __('Начало'); ?></a></li>
            <li><a href="<?php echo url_for('@slider_images_list') ?>"<?php echo $module == 'pages' ? ' class="selected"' : '' ?>><?php echo image_tag('/images/admin/icons/cms_big.png', array('alt' => 'pages')) ?><?php echo __('Съдържание'); ?></a></li>
            <!--<li><a href="<?php //echo url_for('@subscribtions_list') ?>"<?php //echo $module == 'subscribtions' ? ' class="selected"' : '' ?>><?php //echo image_tag('/images/admin/icons/cms_big.png', array('alt' => 'pages')) ?><?php //echo __('Регистрации'); ?></a></li>-->
            <li><a href="<?php echo url_for('@users_list') ?>"<?php echo $module == 'users' ? ' class="selected"' : '' ?>><?php echo image_tag('/images/admin/icons/users_big.png', array('alt' => 'users')) ?><?php echo __('Потребители'); ?></a></li>
            <li><a href="<?php echo url_for('@access_log') ?>"<?php echo $module == 'access_log' ? ' class="selected"' : '' ?>><?php echo image_tag('/images/admin/icons/log_big.png', array('alt' => 'settings')) ?><?php echo __('Логове'); ?></a></li>
            <li><a href="<?php echo url_for('@settings') ?>"<?php echo $module == 'settings' ? ' class="selected"' : '' ?>><?php echo image_tag('/images/admin/icons/settings_big.png', array('alt' => 'settings')) ?><?php echo __('Настройки'); ?></a></li>
          </ul>
        </div>
      </div>
      <div id="content">
        <div id="main-content">
          <?php echo $sf_content ?>
        </div>
        <a href="#" id="sidebar-toggle"></a>
      </div>
      <?php include_slot('sidebar') ?>
      <div class="clear"></div>
      <div id="footer">
        <div class="fleft">
          <?php echo __('&copy; Вертинити ООД. 2012. Всички права запазени'); ?>
        </div>
        <div class="fright">
          <?php echo __('Създадено от'); ?>
          <a href="http://www.vertinity.com" target="_blank" class="vertinity"></a>
        </div>
      </div>
      <div class="clear"></div>
    </div>
    <?php include_slot('modal') ?>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
    <?php use_javascript('jquery.cookie.js') ?>
    <?php use_javascript('jquery.tooltip.js') ?>
    <?php use_javascript('tiny_mce/jquery.tinymce.js') ?>
    <?php use_javascript('tiny_mce/plugins/tinybrowser/tb_tinymce.js.php') ?>
    <?php use_javascript('admin/common.js') ?>
    <?php include_javascripts() ?>
  </body>
</html>