<?php use_helper('Date') ?>

<?php slot('sidebar') ?>
<?php include_partial('pages/menu') ?>
<?php end_slot() ?>

<?php echo get_breadcrumb(array('@publications_list' => __('Публикации'))); ?>
<h1><?php echo __('Списък на всички публикации'); ?></h1>
<?php if ($sf_user->getFlash('success')): ?>
  <?php include_partial('common/message', array('type' => 'success', 'message' => __('Промените са нанесени успешно!'))) ?>
<?php endif ?>
<div class="fleft">
  <?php echo link_to('+ Нова публикация', '@publications_new', array('class' => 'button')) ?>
</div>
<div class="fright">
  <?php include_partial('common/pager', array('pager' => $publications)) ?>
</div>
<div class="clear"></div>
<table class="grid" width="100%">
  <thead>
    <tr>
      <th><?php echo __('Изображение на публикация'); ?></th>
      <th><?php echo __('Заглавие'); ?></th>
      <th><?php echo __('Създадена на'); ?></th>
      <th><?php echo __('Опции'); ?></th>
    </tr>
  </thead>
  <tbody>
    <?php $records_count = count($publications); ?>
    <?php if ($records_count > 0): ?>
    <?php $alt_class = ''; ?>
    <?php foreach ($publications as $publication): ?>
    <tr>
      <td><?php echo image_tag('/uploads/publications/'.$publication->getImage()); ?></td>
      <td><?php echo $publication->getTitle() ?></td>
      <td><?php echo $publication->getCreatedAt() ?></td>
      <td class="center">
              
              <?php echo link_to(
                  ' ',
                  '@publications_edit?id=' . $publication->getId(),
                  array(
                      'class' => 'edit tooltip',
                      'title' => __('Редакция')
                  )) ?>
              <?php echo link_to(
                  ' ',
                  '@publications_delete?id=' . $publication->getId(),
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


