<?php slot('sidebar') ?>
<?php include_partial('pages/menu') ?>
<?php end_slot() ?>
<?php echo get_breadcrumb(array('@products_list' => __('Продукти'))); ?>
<h1><?php echo __('Редактиране на продукт'); ?></h1>

<?php include_partial('form', array('form' => $form)) ?>
