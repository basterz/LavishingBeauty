<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<?php $languages = sfConfig::get('app_supported_languages') ?>

<?php slot('sidebar') ?>
<?php include_partial('menu') ?>
<?php end_slot() ?>

<?php echo get_breadcrumb(array('@pages_home' =>__('Страници'), '' => $types[$type])) ?>

<?php if ($sf_user->getFlash('success')): ?>
  <?php include_partial('common/message', array('type' => 'success', 'message' => __('Промените са нанесени успешно!'))) ?>
<?php endif ?>

<?php include_partial('form', array('form' => $form, 'type' => $type)) ?>