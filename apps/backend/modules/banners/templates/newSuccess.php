<?php slot('sidebar') ?>
<?php include_partial('pages/menu') ?>
<?php end_slot() ?>
<?php echo get_breadcrumb(array('@banners_list' => __('Банери'))); ?>
<h1><?php echo __('Създаване на нова връзка'); ?></h1>

<?php include_partial('form', array('form' => $form)) ?>
