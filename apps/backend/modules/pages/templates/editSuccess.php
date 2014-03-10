<?php slot('sidebar') ?>
<?php include_partial('menu') ?>
<?php end_slot() ?>
<?php echo get_breadcrumb(array('@pages_list?type=' . $type =>__( 'Страници'), '@pages_list?type=' . $type => $types[$type], '' => __('Редакция на запис'))) ?>

<?php include_partial('form', array('form' => $form, 'type' => $type)) ?>