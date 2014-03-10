<?php slot('sidebar') ?>
<?php include_partial('pages/menu') ?>
<?php end_slot() ?>
<?php echo get_breadcrumb(array('@categories_list' => __('Категории'))); ?>
<h1><?php echo __('Създаване на нова категория'); ?></h1>

<?php include_partial('form', array('form' => $form)) ?>
