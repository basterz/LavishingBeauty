<?php slot('sidebar') ?>
<?php include_partial('menu') ?>
<?php end_slot() ?>

<?php echo get_breadcrumb(array('@users_list' => 'Users', '' => __('Нов потребител'))) ?>

<?php include_partial('form', array('form' => $form)) ?>