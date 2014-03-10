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
  <body class="login">
    <div id="container">
      <div id="header">
        <div id="header-top">
          <div class="fright">
            <a href="<?php echo url_for('/') ?>" class="button">Back</a>
          </div>
        </div>
        
      </div>
      <?php echo $sf_content ?>
      <div id="footer">
        <div class="fleft">
          <?php echo __('&copy; Vertinity ltd. 2012'); ?>
        </div>
        <div class="fright">
          Designed by
          <a href="http://www.vertinity.com" target="_blank" class="vertinity"></a>
        </div>
      </div>
    </div>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
    <?php use_javascript('jquery.cookie.js') ?>
    <?php use_javascript('jquery.tooltip.js') ?>
    <?php use_javascript('tiny_mce/jquery.tinymce.js') ?>
    <?php use_javascript('tiny_mce/plugins/tinybrowser/tb_tinymce.js.php') ?>
    <?php use_javascript('admin/common.js') ?>
    <?php include_javascripts() ?>
  </body>
</html>
