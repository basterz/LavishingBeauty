<?php slot('sidebar') ?>
<?php include_partial('pages/menu') ?>
<?php end_slot() ?>

<?php echo get_breadcrumb(array('@publications_list' => __('Публикации'))); ?>
<h1><?php echo __('Редактиране на публикация'); ?></h1>

<?php include_partial('form', array('form' => $form)) ?>
