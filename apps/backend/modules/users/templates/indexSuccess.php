<?php
use_helper('Date');
$roles = sfConfig::get('app_roles');
?>

<?php slot('sidebar') ?>
<?php include_partial('menu') ?>
<?php end_slot() ?>

<?php echo get_breadcrumb(array('' => __('Потребители'))) ?>

<div class="filters">
  <form method="post" action="<?php echo url_for('@users_list') ?>">
    <table>
      <tr>
        <td>
          <?php echo $filters['search_text']->renderLabel(image_tag('/images/admin/icons/search.png', array('alt' => 'search'))) ?>
          <?php echo $filters['search_text'] ?>
        </td>
        <td style="padding-left: 20px;">
          <?php echo $filters['role']->renderLabel(image_tag('/images/admin/icons/user.png', array('alt' => 'user'))) ?>
          <?php echo $filters['role'] ?>
        </td>
        <td style="padding-left: 20px;">
          <?php echo $filters['date']->renderLabel(image_tag('/images/admin/icons/date.png', array('alt' => 'date'))) ?>
          <?php echo $filters['date'] ?>
        </td>
        <td style="padding-left: 20px;">
          <input type="submit" value="Filter" class="button" />
          <?php echo link_to('Clear filters', '@users_list', array('class' => 'button', 'confirm' => 'Are you sure?')) ?>
        </td>
      </tr>
    </table>
  </form>
</div>

<?php if ($sf_user->getFlash('success')): ?>
  <?php include_partial('common/message', array('type' => 'success', 'message' => __('Промените са нанесени успешно'))) ?>
<?php endif ?>

<?php if ($sf_user->getFlash('mail_success')): ?>
  <?php include_partial('common/message', array('type' => 'success', 'message' => __('Съобщението е изпратено успешно.'))) ?>
<?php endif ?>

<?php if ($sf_user->getFlash('mail_error')): ?>
  <?php include_partial('common/message', array('type' => 'error', 'message' => __('Грешка! Съобщението не е изпратено.'))) ?>
<?php endif ?>

<div class="fleft">
  <?php echo link_to(__('+ Нов потребител'), '@users_new', array('class' => 'button')) ?>
</div>
<div class="fright">
  <?php include_partial('common/pager', array('pager' => $records)) ?>
</div>
<div class="clear"></div>

<form action="" method="post" id="grid_actions" data-delete="<?php echo url_for('@users_delete_selected') ?>" data-email-selectes="<?php echo url_for('@emails_selected') ?>" data-email-all="<?php echo url_for('@emails_all') ?>">
  <table class="grid" width="100%">
    <thead>
      <tr>
        <th width="20"><input type="checkbox" class="checkall checkbox tooltip" title="Select/deselect all" /></th>
        <th>
          <?php if ($sort == 'email'): ?>
            <?php if ($sf_request->hasParameter('desc')): ?>
              <a href="<?php echo link_to_listing(null, array('sort' => 'email', 'desc' => null, 'page' => null)) ?>">Email <?php echo image_tag('/images/admin/icons/arrow_down.gif') ?></a>
            <?php else: ?>
              <a href="<?php echo link_to_listing(null, array('sort' => 'email', 'desc' => 1, 'page' => null)) ?>">Email <?php echo image_tag('/images/admin/icons/arrow_up.gif') ?></a>
            <?php endif ?>
          <?php else: ?>
            <a href="<?php echo link_to_listing(null, array('sort' => 'email', 'desc' => null, 'page' => null)) ?>">Email</a>
          <?php endif ?>
        </th>
        <th>
          <?php if ($sort == 'name'): ?>
            <?php if ($sf_request->hasParameter('desc')): ?>
              <a href="<?php echo link_to_listing(null, array('sort' => 'name', 'desc' => null, 'page' => null)) ?>"><?php echo __('Име'); ?> <?php echo image_tag('/images/admin/icons/arrow_down.gif') ?></a>
            <?php else: ?>
              <a href="<?php echo link_to_listing(null, array('sort' => 'name', 'desc' => 1, 'page' => null)) ?>"><?php echo __('Име'); ?> <?php echo image_tag('/images/admin/icons/arrow_up.gif') ?></a>
            <?php endif ?>
          <?php else: ?>
            <a href="<?php echo link_to_listing(null, array('sort' => 'name', 'desc' => null, 'page' => null)) ?>"><?php echo __('Име'); ?></a>
          <?php endif ?>
        </th>
        <th width="120">
          <?php if ($sort == 'role'): ?>
            <?php if ($sf_request->hasParameter('desc')): ?>
              <a href="<?php echo link_to_listing(null, array('sort' => 'role', 'desc' => null, 'page' => null)) ?>"><?php echo __('Роля'); ?> <?php echo image_tag('/images/admin/icons/arrow_down.gif') ?></a>
            <?php else: ?>
              <a href="<?php echo link_to_listing(null, array('sort' => 'role', 'desc' => 1, 'page' => null)) ?>"><?php echo __('Роля'); ?> <?php echo image_tag('/images/admin/icons/arrow_up.gif') ?></a>
            <?php endif ?>
          <?php else: ?>
            <a href="<?php echo link_to_listing(null, array('sort' => 'role', 'desc' => null, 'page' => null)) ?>"><?php echo __('Роля'); ?></a>
          <?php endif ?>
        </th>
        <th width="100">
          <?php if ($sort == 'is_active'): ?>
            <?php if ($sf_request->hasParameter('desc')): ?>
              <a href="<?php echo link_to_listing(null, array('sort' => 'is_active', 'desc' => null, 'page' => null)) ?>"><?php echo __('Активиран?'); ?> <?php echo image_tag('/images/admin/icons/arrow_down.gif') ?></a>
            <?php else: ?>
              <a href="<?php echo link_to_listing(null, array('sort' => 'is_active', 'desc' => 1, 'page' => null)) ?>"><?php echo __('Активиран?'); ?> <?php echo image_tag('/images/admin/icons/arrow_up.gif') ?></a>
            <?php endif ?>
          <?php else: ?>
            <a href="<?php echo link_to_listing(null, array('sort' => 'is_active', 'desc' => null, 'page' => null)) ?>"><?php echo __('Активиран?'); ?></a>
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
        <th width="120">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php $records_count = count($records); ?>
      <?php if ($records_count > 0): ?>
        <?php $alt_class = ''; ?>
        <?php foreach ($records as $record): ?>
          <tr class="<?php echo $alt_class ?>">
            <td class="center"><input type="checkbox" name="record_id[]" class="checkbox" value="<?php echo $record->getId() ?>" /></td>
            <td><?php echo $record->getEmail() ?></td>
            <td><?php echo $record->getName() ?></td>
            <td class="center"><?php echo $roles[$record->getRole()] ?></td>
            <td class="center">
              <a href="#" class="fancy_check<?php echo $record->getIsActive() ? ' checked' : '' ?>" data-url="<?php echo url_for('@users_state?id=' . $record->getId()) ?>"><span><span></span></span></a>
            </td>
            <td class="center"><?php echo format_date($record->getCreatedAt(), 'D') ?></td>
            <td class="center">
              <a href="#" class="mail tooltip" title="Send message" data-id="<?php echo $record->getId() ?>" data-url="<?php echo url_for('@emails_private?id=' . $record->getId()) ?>"></a>
              <?php echo link_to(
                  ' ',
                  '@users_edit?id=' . $record->getId(),
                  array(
                      'class' => 'edit tooltip',
                      'title' => __('Редакция')
                  )) ?>
              <?php echo link_to(
                  ' ',
                  '@users_delete?id=' . $record->getId(),
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
        <tr><td colspan="7"><?php echo __('Не са намерени потребители'); ?></td></tr>
      <?php endif ?>
    </tbody>
    <tfoot>
      <tr>
        <th colspan="7">
          <div class="fleft">
            <select name="action" id="grid_action">
              <option value="send"><?php echo __('Изпрати до избраните'); ?><</option>
              <option value="send_all"><?php echo __('Изпрати до всички'); ?><</option>
              <option value="delete"><?php echo __('Изтрий избраните'); ?><</option>
            </select>
            <input type="submit" class="button" value="Execute" />
          </div>
          <div class="fright"><strong><?php echo $records_count ?></strong> <?php echo $records_count == 1 ? __('потребител е намерен') : __('потребители са намерени') ?></div>
          <div class="clear"></div>
        </th>
      </tr>
    </tfoot>
  </table>
</form>

<?php include_partial('common/pager', array('pager' => $records)) ?>

<?php slot('modal') ?>
<div id="modal-mask"></div>
<div class="box modal" id="mail_window">
  <div class="box-header">
    <ul>
      <li><span><?php echo __('Съобщение'); ?><</span></li>
    </ul>
    <a href="#" class="box-close">X</a>
  </div>
  <div class="box-content">
    <form action="" method="post">
      <div class="form-item">
        <?php echo $mail_form['subject']->renderLabel(__('Относно')) ?><br />
        <?php echo $mail_form['subject']->render(array('class' => 'middle')) ?>
      </div>
      <div class="form-item">
        <?php echo $mail_form['body']->renderLabel(__('Съобщение')) ?><br />
        <?php echo $mail_form['body']->render(array('class' => 'mail_editor')) ?>
      </div>
      <?php echo $mail_form->renderHiddenFields() ?>
      <input type="hidden" name="return_url" value="<?php echo link_to_listing() ?>" />
      <div id="selected_users"></div>
      <input type="submit" class="button" value="Send" />
    </form>
  </div>
</div>
<?php end_slot() ?>