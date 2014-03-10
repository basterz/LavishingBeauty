<?php use_helper('Date') ?>

<?php slot('sidebar') ?>
<?php include_partial('pages/menu') ?>
<?php end_slot() ?>

<?php echo get_breadcrumb(array('@banners_list' => __('Банери'))); ?>
<h1><?php echo __('Списък на всички банери'); ?></h1>
<?php if ($sf_user->getFlash('success')): ?>
  <?php include_partial('common/message', array('type' => 'success', 'message' => __('Промените са нанесени успешно!'))) ?>
<?php endif ?>
<div class="fleft">
  <?php echo link_to(__('+ Нов банер'), '@banners_new', array('class' => 'button')) ?>
</div>
<div class="fright">
  <?php include_partial('common/pager', array('pager' => $banners)) ?>
</div>
<div class="clear"></div>
<table class="grid" width="100%">
  <thead>
    <tr>
      <th><?php echo __('Изображение на връзката'); ?></th>
      <th><?php echo __('Линк'); ?></th>
      <th><?php echo __('Създадена на'); ?></th>
      <th><?php echo __('Position'); ?></th>
      <th><?php echo __('Опции'); ?></th>
    </tr>
  </thead>
  <tbody>
    <?php $records_count = count($banners); ?>
    <?php if ($records_count > 0): ?>
    <?php $alt_class = ''; ?>
    <?php foreach ($banners as $banner): ?>
    <tr>
      <td><?php echo image_tag('/uploads/banners/'.$banner->getImage()); ?></td>
      <td><?php echo $banner->getLink() ?></td>
      <td><?php echo $banner->getCreatedAt() ?></td>
      <td><?php echo $banner->getPosition() ?></td>
      <td class="center">
              
              <?php echo link_to(
                  ' ',
                  '@banners_edit?id=' . $banner->getId(),
                  array(
                      'class' => 'edit tooltip',
                      'title' => __('Редакция')
                  )) ?>
              <?php echo link_to(
                  ' ',
                  '@banners_delete?id=' . $banner->getId(),
                  array(
                      'method' => 'delete',
                      'confirm' => __('Потвърдете изтриването'),
                      'class' => 'delete tooltip',
                      'title' => __('Изтрий')
                  )) ?>
      </td>
    </tr>
    <?php $alt_class = $alt_class ? '' : 'alt'; ?>
    <?php endforeach; ?>
    <?php else: ?>
        <tr><td colspan="6"><?php echo __('Не са намерени записи'); ?></td></tr>
    <?php endif ?>
  </tbody>

</table>


