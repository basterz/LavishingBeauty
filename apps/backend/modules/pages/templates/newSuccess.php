<?php slot('sidebar') ?>
<?php include_partial('menu') ?>
<?php end_slot() ?>

<?php echo get_breadcrumb(array('@pages_home' =>__( 'Страници'), '@pages_list?type=' . $type => $types[$type], '' => __('Нов запис'))) ?>

<?php include_partial('form', array('form' => $form, 'type' => $type)) ?>