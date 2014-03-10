<?php use_helper('Date') ?>

<?php slot('sidebar') ?>
<?php include_partial('pages/menu') ?>
<?php end_slot() ?>

<?php echo get_breadcrumb(array('@products_list' => __('Продукти'), '@products_edit?id=' . $product->getId() => $product->getTitle(), '' => $product->getTitle() . __(' - Изображения'))) ?>

<?php if ($sf_user->getFlash('success')): ?>
  <?php include_partial('common/message', array('type' => 'success', 'message' => __('Промените са нанесени успешно!'))) ?>
<?php endif ?>

<div class="fleft">
  <?php echo link_to(__('+ Ново изображение'), '@images_new?product_id=' . $product->getId(), array('class' => 'button')) ?>
</div>
<div class="fright">
  <?php include_partial('common/pager', array('pager' => $records)) ?>
</div>
<div class="clear"></div>

<form action="" method="post" id="grid_actions" data-delete="<?php echo url_for('@images_delete_selected?product_id=' . $product->getId()) ?>">
  <table class="grid" width="100%">
    <thead>
      <tr>
        <th width="20"><input type="checkbox" class="checkall checkbox tooltip" title="Select/deselect all" /></th>
        <th>
          <?php if ($sort == 'title'): ?>
            <?php if ($sf_request->hasParameter('desc')): ?>
              <a href="<?php echo link_to_listing(null, array('sort' => 'title', 'desc' => null, 'page' => null)) ?>"><?php echo __('Заглавие'),' ',image_tag('/images/admin/icons/arrow_down.gif') ?></a>
            <?php else: ?>
              <a href="<?php echo link_to_listing(null, array('sort' => 'title', 'desc' => 1, 'page' => null)) ?>"><?php echo __('Заглавие'),' ',image_tag('/images/admin/icons/arrow_up.gif') ?></a>
            <?php endif ?>
          <?php else: ?>
            <a href="<?php echo link_to_listing(null, array('sort' => 'title', 'desc' => null, 'page' => null)) ?>"><?php echo __('Заглавие') ?></a>
          <?php endif ?>
        </th>
        <th width="150">
          <?php echo __('Изображение'); ?>
        </th>
        <th width="120">
          <?php if ($sort == 'position'): ?>
            <?php if ($sf_request->hasParameter('desc')): ?>
              <a href="<?php echo link_to_listing(null, array('sort' => 'position', 'desc' => null, 'page' => null)) ?>"><?php echo __('Позиция'), ' ', image_tag('/images/admin/icons/arrow_down.gif') ?></a>
            <?php else: ?>
              <a href="<?php echo link_to_listing(null, array('sort' => 'position', 'desc' => 1, 'page' => null)) ?>"><?php echo __('Позиция'), ' ', image_tag('/images/admin/icons/arrow_up.gif') ?></a>
            <?php endif ?>
          <?php else: ?>
            <a href="<?php echo link_to_listing(null, array('sort' => 'position', 'desc' => null, 'page' => null)) ?>"><?php echo __('Позиция') ?></a>
          <?php endif ?>
        </th>
        <th width="150">
          <?php if ($sort == 'created_at'): ?>
            <?php if ($sf_request->hasParameter('desc')): ?>
              <a href="<?php echo link_to_listing(null, array('sort' => 'created_at', 'desc' => null, 'page' => null)) ?>"><?php echo __('Дата'),' ', image_tag('/images/admin/icons/arrow_down.gif') ?></a>
            <?php else: ?>
              <a href="<?php echo link_to_listing(null, array('sort' => 'created_at', 'desc' => 1, 'page' => null)) ?>"><?php echo __('Дата'),' ', image_tag('/images/admin/icons/arrow_up.gif') ?></a>
            <?php endif ?>
          <?php else: ?>
            <a href="<?php echo link_to_listing(null, array('sort' => 'created_at', 'desc' => null, 'page' => null)) ?>"><?php echo __('Дата') ?></a>
          <?php endif ?>
        </th>
        <th width="80"><?php echo __('Действия'); ?></th>
      </tr>
    </thead>
    <tbody>
      <?php $records_count = count($records); ?>
      <?php if ($records_count > 0): ?>
        <?php $alt_class = ''; ?>
        <?php foreach ($records as $record): ?>
          <tr class="<?php echo $alt_class ?>">
            <td class="center"><input type="checkbox" name="record_id[]" class="checkbox" value="<?php echo $record->getId() ?>" /></td>
            <td>
              <a href="<?php echo url_for('@images_edit?product_id=' . $product->getId() . '&id=' . $record->getId()) ?>"><?php echo $record->getTitle() ?></a>
            </td>
            <td class="center"><?php echo image_tag('/uploads/images/' . $record->getFilename(), array('width' => 150)) ?></td>
            <td class="center">
              <?php echo $record->getPosition() ?>
            </td>
            <td class="center"><?php echo format_date($record->getCreatedAt(), 'D') ?></td>
            <td class="center">
              <?php echo link_to(
                  ' ',
                  '@images_edit?product_id=' . $product->getId() . '&id=' . $record->getId(),
                  array(
                      'class' => 'edit tooltip',
                      'title' => __('Редакция')
                  )) ?>
              <?php echo link_to(
                  ' ',
                  '@images_delete?product_id=' . $product->getId() . '&id=' . $record->getId(),
                  array(
                      'method' => 'delete',
                      'confirm' => __('Потвърдете изтриването'),
                      'class' => 'delete tooltip',
                      'title' => __('Изтрий')
                  )) ?>
            </td>
          </tr>
          <?php $alt_class = $alt_class ? '' : 'alt'; ?>
        <?php endforeach ?>
      <?php else: ?>
        <tr><td colspan="6"><?php echo __('Не са намерени записи') ?></td></tr>
      <?php endif ?>
    </tbody>
    <tfoot>
      <tr>
        <th colspan="6">
          <div class="fleft">
            <input type="hidden" name="action" id="grid_action" value="delete" />
            <input type="submit" class="button" value="<?php echo __('Изтрий') ?>" />
          </div>
          <div class="fright"><strong><?php echo $records_count ?></strong> <?php echo $records_count == 1 ? __('запис е открит') : __('записа са открити') ?></div>
          <div class="clear"></div>
        </th>
      </tr>
    </tfoot>
  </table>
</form>

<?php include_partial('common/pager', array('pager' => $records)) ?>