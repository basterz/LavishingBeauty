<?php slot('sidebar') ?>
<?php include_partial('pages/menu') ?>
<?php end_slot() ?>
<?php echo get_breadcrumb(array('@articles_list' => __('Новини'))); ?>
<h1><?php echo __('Създаване на нова статия'); ?></h1>

<?php include_partial('form', array('form' => $form)) ?>
