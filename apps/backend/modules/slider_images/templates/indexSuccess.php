<?php use_helper('Date') ?>

<?php slot('sidebar') ?>
<?php include_partial('pages/menu') ?>
<?php end_slot() ?>

<?php echo get_breadcrumb(array('@slider_images_list' => __('Изображения за слайдър'))); ?>
<h1><?php echo __('Списък на всички изображения за слайдър'); ?></h1>
<?php if ($sf_user->getFlash('success')): ?>
  <?php include_partial('common/message', array('type' => 'success', 'message' => __('Промените са нанесени успешно!'))) ?>
<?php endif ?>
<div class="fleft">
  <?php echo link_to(__('+ Ново изображение за слайдър'), '@slider_images_new', array('class' => 'button')) ?>
</div>
<div class="fright">
  <?php include_partial('common/pager', array('pager' => $slider_images)); ?>
</div>
<div class="clear"></div>
<table class="grid" width="100%">
  <thead>
    <tr>
      <th><?php echo __('Изображение'); ?></th>
      <th><?php echo __('Link'); ?></th>
      <th><?php echo __('Създадена на'); ?></th>
      <th><?php echo __('Опции'); ?></th>
    </tr>
  </thead>
  <tbody>
    <?php $records_count = count($slider_images); ?>
    <?php if ($records_count > 0): ?>
    <?php $alt_class = ''; ?>
    <?php foreach ($slider_images as $slider_image): ?>
    <tr>
      <td>
          <?php 
            $source = '/uploads/slider_images/'.$slider_image->getImage();
            echo image_tag($source, array('width'=>'300')); 
            ?>
      </td>
      <td><?php echo urldecode($slider_image->getLink()) ?></td>
      <td><?php echo $slider_image->getCreatedAt() ?></td>
      
      <td class="center">
              
              <?php echo link_to(
                  ' ',
                  '@slider_images_edit?id=' . $slider_image->getId(),
                  array(
                      'class' => 'edit tooltip',
                      'title' => __('Редакция')
                  )) ?>
              <?php echo link_to(
                  ' ',
                  '@slider_images_delete?id=' . $slider_image->getId(),
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


