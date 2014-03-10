<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <?php include_http_metas() ?>
        <?php include_metas() ?>
        <?php include_title() ?>

       <link href='http://fonts.googleapis.com/css?family=Comfortaa:300' rel='stylesheet' type='text/css'>
        <link href="/browse_logo.png" type="image/gif" rel="shortcut icon" />
        <?php use_stylesheet('front/reset.css') ?>
        <?php use_stylesheet('nivo_slider/nivo-slider.css') ?>
        <?php use_stylesheet('nivo_slider/themes/default/default.css') ?>
        <?php use_stylesheet('front/main.css','last') ?>


        <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
        <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <?php use_javascript('nivo_slider/jquery.nivo.slider.pack.js'); ?>
        <?php use_javascript('jcarousel/jcarousel.min.js'); ?>
        <?php use_javascript('front/common.js', 'last'); ?>

        <?php include_stylesheets() ?>
        <?php include_javascripts() ?>
    </head>
    <body id="body_home">
   
            <?php include_component('common', 'header'); ?>
            <div class="clear"></div>
            <div id="content">
                <?php echo $sf_content ?>
            </div>
            <?php include_component('common', 'footer'); ?>

    </body>
</html>
