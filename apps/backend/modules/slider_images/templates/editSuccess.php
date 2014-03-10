<?php slot('sidebar') ?>
<?php include_partial('pages/menu') ?>
<?php end_slot() ?>

<?php echo get_breadcrumb(array('@slider_images_list' => __('Изображения за слайдър'))); ?>
<h1><?php echo __('Редактиране на изображение за слайдър'); ?></h1>

<?php include_partial('form', array('form' => $form)) ?>
