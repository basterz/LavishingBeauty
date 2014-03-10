<?php use_helper('Date') ?>
<?php slot('body_class', 'one-column') ?>
<?php echo get_breadcrumb(array('' => 'Dashboard')) ?>
<div class="box">
  <div class="box-header">
    <ul>
      <li><span>Latest Users</span></li>
    </ul>
  </div>
  <div class="box-content">
    <table class="grid" width="100%">
      <thead>
        <tr>
          <th>Email</th>
          <th>Name</th>
          <th width="150">Date</th>
          <th width="40">&nbsp;</th>
        </tr>
      </thead>
      <tbody>
        <?php if (count($latest_users) > 0): ?>
          <?php $alt = ''; ?>
          <?php foreach ($latest_users as $record): ?>
            <tr class="<?php echo $alt ?>">
              <td><?php echo $record['email'] ?></td>
              <td><?php echo $record['name'] ?></td>
              <td class="center"><?php echo format_date($record['created_at'], 'D') ?></td>
              <td class="center">
                <?php echo link_to(' ', '@users_edit?id=' . $record['id'], array('class' => 'forward tooltip', 'title' => 'View')) ?>
              </td>
            </tr>
            <?php $alt = $alt ? '' : 'alt'; ?>
          <?php endforeach ?>
        <?php else: ?>
          <tr><td colspan="4">No records were found</td></tr>
        <?php endif ?>
      </tbody>
    </table>
  </div>
</div>