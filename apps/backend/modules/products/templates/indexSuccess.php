<?php use_helper('Date') ?>

<?php slot('sidebar') ?>
<?php include_partial('pages/menu') ?>
<?php end_slot() ?>

<?php echo get_breadcrumb(array('@products_list' => __('Проекти'))); ?>

<div class="filters">
  <form method="post" action="<?php echo url_for('@products_list') ?>">
    <table>
      <tr>
        <td>
          <?php echo $filters['search_text']->renderLabel(image_tag('/images/admin/icons/search.png', array('alt' => 'search'))) ?>
          <?php echo $filters['search_text'] ?>
        </td>
        <td style="padding-left: 20px;">
            <label>
                <div id="fake-button" style="width: 150px; overflow: hidden" class="middle float-left <?php echo $filters['category']->renderError() ? ' with-error' : ''; ?>"></div>
                <?php echo $filters['category']->render(array("id" => "category_parrent_id",'class' => 'hidden left' . ($filters['category']->renderError() ? ' with-error' : ''))) ?>
                <div id="category-button" data-url="<?php echo url_for('@choose_category') ?>" class="float-left  button"><?php echo __('Избери категория'); ?></div>
                <div class="clear"></div> 
            </label>
        </td>
        <td style="padding-left: 20px;">
          <input type="submit" value="<?php echo __('Филтрирай'); ?>" class="button" />
          <?php echo link_to(__('Изчисти филтъра'), '@products_list', array('class' => 'button', 'confirm' => 'Сигурни ли сте?')) ?>
        </td>
      </tr>
    </table>
  </form>
</div>

<h1><?php echo __('Списък на всички проекти'); ?></h1>
<?php if ($sf_user->getFlash('success')): ?>
  <?php include_partial('common/message', array('type' => 'success', 'message' => __('Промените са нанесени успешно!'))) ?>
<?php endif ?>
<div class="fleft">
  <?php echo link_to(__('+ Нов проект'), '@products_new', array('class' => 'button')) ?>
</div>
<div class="fright">
  <?php include_partial('common/pager', array('pager' => $products)) ?>
</div>
<div class="clear"></div>
<table class="grid" width="100%">
  <thead>
    <tr>
      <th><?php echo __('Име на проекта'); ?></th>
      <th><?php echo __('Популярен'); ?></th>
      <th><?php echo __(''); ?></th> 
      <th><?php echo __('Позиция'); ?></th> 
      <th><?php echo __('Създаден на'); ?></th>
      <th><?php echo __('Опции'); ?></th>
    </tr>
  </thead>
  <tbody>
    <?php $records_count = count($products); ?>
    <?php if ($records_count > 0): ?>
    <?php $alt_class = ''; ?>
    <?php foreach ($products as $product): ?>
    <tr>
      <td><?php echo $product->getTitle() ?></td>
      <td><?php echo $product->getPopular() == 1 ? 'да' : 'не'; ?></td>
      <td><?php echo $product->getPosition() ?></td>
      <td>
          <a href="<?php echo link_to_listing(null, array('action' => 'position', 'id' => $product->getID(), 'operation' => 'down')) ?>" class="tooltip" title="Премести нагоре"><?php echo image_tag('/images/admin/icons/arrow_up.gif', array('alt' => 'move')) ?></a>
          <a href="<?php echo link_to_listing(null, array('action' => 'position', 'id' => $product->getID(), 'operation' => 'up')) ?>" class="tooltip" title="Премести надолу"><?php echo image_tag('/images/admin/icons/arrow_down.gif', array('alt' => 'move')) ?></a>
      </td>
      <td><?php echo $product->getCreatedAt() ?></td>
      <td class="center">
              
              <?php echo link_to(
                  ' ',
                  '@products_edit?id=' . $product->getId(),
                  array(
                      'class' => 'edit tooltip',
                      'title' => __('Редакция')
                  )) ?>
              <?php echo link_to(
                  ' ',
                  '@products_delete?id=' . $product->getId(),
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


