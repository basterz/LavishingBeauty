<?php use_helper('Date') ?>

<?php slot('sidebar') ?>
<?php include_partial('menu') ?>
<?php end_slot() ?>

<?php echo get_breadcrumb(array('@pages_list' =>__( 'Страници'), '' => $types[$type])) ?>

<?php if ($sf_user->getFlash('success')): ?>
  <?php include_partial('common/message', array('type' => 'success', 'message' => __('Промените са нанесени успешно!'))) ?>
<?php endif ?>

<div class="fleft">
  <?php echo link_to(__('+ Нов запис'), '@pages_new?type=' . $type, array('class' => 'button')) ?>
</div>
<div class="fright">
  <?php include_partial('common/pager', array('pager' => $records)) ?>
</div>
<div class="clear"></div>

<form action="" method="post" id="grid_actions" data-delete="<?php echo url_for('@pages_delete_selected?type=' . $type) ?>">
  <table class="grid" width="100%">
    <thead>
      <tr>
        <th width="20"><input type="checkbox" class="checkall checkbox tooltip" title="Select/deselect all" /></th>
        <th>
          <?php if ($sort == 'title'): ?>
            <?php if ($sf_request->hasParameter('desc')): ?>
              <a href="<?php echo link_to_listing(null, array('sort' => 'title', 'desc' => null, 'page' => null)) ?>"><?php echo __('Заглавие'); ?> <?php echo image_tag('/images/admin/icons/arrow_down.gif') ?></a>
            <?php else: ?>
              <a href="<?php echo link_to_listing(null, array('sort' => 'title', 'desc' => 1, 'page' => null)) ?>"><?php echo __('Заглавие'); ?> <?php echo image_tag('/images/admin/icons/arrow_up.gif') ?></a>
            <?php endif ?>
          <?php else: ?>
            <a href="<?php echo link_to_listing(null, array('sort' => 'title', 'desc' => null, 'page' => null)) ?>"><?php echo __('Заглавие'); ?></a>
          <?php endif ?>
        </th>
        <th width="120">
          <?php if ($sort == 'position'): ?>
            <?php if ($sf_request->hasParameter('desc')): ?>
              <a href="<?php echo link_to_listing(null, array('sort' => 'position', 'desc' => null, 'page' => null)) ?>"><?php echo __('Позиция'); ?> <?php echo image_tag('/images/admin/icons/arrow_down.gif') ?></a>
            <?php else: ?>
              <a href="<?php echo link_to_listing(null, array('sort' => 'position', 'desc' => 1, 'page' => null)) ?>"><?php echo __('Позиция'); ?> <?php echo image_tag('/images/admin/icons/arrow_up.gif') ?></a>
            <?php endif ?>
          <?php else: ?>
            <a href="<?php echo link_to_listing(null, array('sort' => 'position', 'desc' => null, 'page' => null)) ?>"><?php echo __('Позиция'); ?></a>
          <?php endif ?>
        </th>
        <th width="150">
          <?php if ($sort == 'created_at'): ?>
            <?php if ($sf_request->hasParameter('desc')): ?>
              <a href="<?php echo link_to_listing(null, array('sort' => 'created_at', 'desc' => null, 'page' => null)) ?>"><?php echo __('Дата'); ?> <?php echo image_tag('/images/admin/icons/arrow_down.gif') ?></a>
            <?php else: ?>
              <a href="<?php echo link_to_listing(null, array('sort' => 'created_at', 'desc' => 1, 'page' => null)) ?>"><?php echo __('Дата'); ?> <?php echo image_tag('/images/admin/icons/arrow_up.gif') ?></a>
            <?php endif ?>
          <?php else: ?>
            <a href="<?php echo link_to_listing(null, array('sort' => 'created_at', 'desc' => null, 'page' => null)) ?>"><?php echo __('Дата'); ?></a>
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
              <a href="<?php echo url_for('@pages_edit?type=' . $type . '&id=' . $record->getId()) ?>"><?php echo $record->getTitle() ?></a>
            </td>
            <td class="center">
              <?php echo $record->getPosition() ?>
            </td>
            <td class="center"><?php echo format_date($record->getCreatedAt(), 'D') ?></td>
            <td class="center">
              <?php echo link_to(
                  ' ',
                  '@pages_edit?type=' . $type . '&id=' . $record->getId(),
                  array(
                      'class' => 'edit tooltip',
                      'title' => __('Редакция')
                  )) ?>
              <?php echo link_to(
                  ' ',
                  '@pages_delete?type=' . $type . '&id=' . $record->getId(),
                  array(
                      'method' => 'delete tooltip',
                      'confirm' => __('Потвърдете изтриването'),
                      'class' => 'delete tooltip',
                      'title' => __('Изтрий')
                  )) ?>
            </td>
          </tr>
          <?php $alt_class = $alt_class ? '' : 'alt'; ?>
        <?php endforeach ?>
      <?php else: ?>
        <tr><td colspan="5"><?php echo __('Не са намерени записи'); ?></td></tr>
      <?php endif ?>
    </tbody>
    <tfoot>
      <tr>
        <th colspan="5">
          <div class="fleft">
            <input type="hidden" name="action" id="grid_action" value="delete" />
            <input type="submit" class="button" value="Изпълни" />
          </div>
          <div class="fright"><strong><?php echo $records_count ?></strong> <?php echo $records_count == 1 ? __('запис е открит') : __('записа са открити') ?></div>
          <div class="clear"></div>
        </th>
      </tr>
    </tfoot>
  </table>
</form>

<?php include_partial('common/pager', array('pager' => $records)) ?>