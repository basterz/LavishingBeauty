<?php slot('sidebar') ?>
<?php include_partial('pages/menu') ?>
<?php end_slot() ?>
<?php echo get_breadcrumb(array('@categories_list' => __('Categories'))); ?>
<h1><?php echo __('Edit category'); ?></h1>

<?php include_partial('form', array('form' => $form, 'categoryParrentName' => $categoryParrentName)) ?>
