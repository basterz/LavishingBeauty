<?php slot('sidebar') ?>
<?php include_partial('pages/menu') ?>
<?php end_slot() ?>
<?php echo get_breadcrumb(array('@products_list' => __('Проекти'))); ?>
<h1><?php echo __('Създаване на нов проект'); ?></h1>

<?php include_partial('form', array('form' => $form)) ?>
