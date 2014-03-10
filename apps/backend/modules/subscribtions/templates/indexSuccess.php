<?php use_helper('Date') ?>

<?php slot('sidebar') ?>
<?php include_partial('pages/menu') ?>
<?php end_slot() ?>

<?php echo get_breadcrumb(array('@subscribtions_list' => __('Регистрирани потребители'))); ?>
<h1><?php echo __('Списък на всички регистрирали се потребители'); ?></h1>
<?php if ($sf_user->getFlash('success')): ?>
  <?php include_partial('common/message', array('type' => 'success', 'message' => __('Промените са нанесени успешно!'))) ?>
<?php endif ?>
<div class="fleft">
  <?php //echo link_to('+ Нов банер', '@banners_new', array('class' => 'button')) ?>
</div>
<div class="fright">
  <?php include_partial('common/pager', array('pager' => $subscribtions)) ?>
</div>
<div class="clear"></div>
<table class="grid" width="100%">
  <thead>
    <tr>
      <th><?php echo __('Име'); ?></th>
      <th><?php echo __('email'); ?></th>
      <th><?php echo __('Създадена на'); ?></th>
    </tr>
  </thead>
  <tbody>
    <?php $records_count = count($subscribtions); ?>
    <?php if ($records_count > 0): ?>
    <?php $alt_class = ''; ?>
    <?php foreach ($subscribtions as $subscribtion): ?>
    <tr>
      <td><?php echo $subscribtion->getName() ?></td>
      <td><?php echo $subscribtion->getEmail() ?></td>
      <td><?php echo $subscribtion->getCreatedAt() ?></td>
      
    </tr>
    <?php $alt_class = $alt_class ? '' : 'alt'; ?>
    <?php endforeach; ?>
    <?php else: ?>
        <tr><td colspan="6"><?php echo __('Не са намерени записи'); ?></td></tr>
    <?php endif ?>
  </tbody>

</table>


