<?php use_helper('Date') ?>

<?php slot('sidebar') ?>
<?php include_partial('pages/menu') ?>
<?php end_slot() ?>

<?php echo get_breadcrumb(array('@articles_list' => __('Новини'))); ?>
<h1><?php echo __('Списък на всички новини'); ?></h1>
<?php if ($sf_user->getFlash('success')): ?>
  <?php include_partial('common/message', array('type' => 'success', 'message' => __('Промените са нанесени успешно!'))) ?>
<?php endif ?>
<div class="fleft">
  <?php echo link_to(__('+ Нова статия'), '@articles_new', array('class' => 'button')) ?>
</div>
<div class="fright">
  <?php include_partial('common/pager', array('pager' => $articles)) ?>
</div>
<div class="clear"></div>
<table class="grid" width="100%">
  <thead>
    <tr>
      <th><?php echo __('Заглавие на статия'); ?></th>
      <th><?php echo __("Публикувана"); ?></th>
      <th><?php echo __("Популярна"); ?></th>
      <th><?php echo __("Създаден на"); ?></th>
      <th><?php echo __('Опции'); ?></th>
    </tr>
  </thead>
  <tbody>
    <?php $records_count = count($articles); ?>
    <?php if ($records_count > 0): ?>
    <?php $alt_class = ''; ?>
    <?php foreach ($articles as $article): ?>
    <tr>
      <td><?php echo $article->getTitle() ?></td>
      <td><?php echo $article->getIsPublished() == 1 ? 'да' : 'не'; ?></td>
      <td><?php echo $article->getPopular() == 1 ? 'да' : 'не'; ?></td>
      <td><?php echo $article->getCreatedAt() ?></td>
      <td class="center">
              
              <?php echo link_to(
                  ' ',
                  '@articles_edit?id=' . $article->getId(),
                  array(
                      'class' => 'edit tooltip',
                      'title' => __('Редакция')
                  )) ?>
              <?php echo link_to(
                  ' ',
                  '@articles_delete?id=' . $article->getId(),
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


