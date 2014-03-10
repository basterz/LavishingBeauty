<?php slot('body_class', 'one-column') ?>
<?php echo get_breadcrumb(array('' => 'Логове')) ?>

<div class="filters">
  <form method="post" action="<?php echo url_for('@access_log') ?>">
    <table>
      <tr>
        <td>
          <?php echo $filters['email']->renderLabel(image_tag('/images/admin/icons/search.png', array('alt' => 'search'))) ?>
          <?php echo $filters['email'] ?>
        </td>
        <td style="padding-left: 20px;">
          <?php echo $filters['ip']->renderLabel(image_tag('/images/admin/icons/marker.png', array('alt' => 'marker'))) ?>
          <?php echo $filters['ip'] ?>
        </td>
        <td style="padding-left: 20px;">
          <?php echo $filters['browser_info']->renderLabel(image_tag('/images/admin/icons/globe.png', array('alt' => 'globe'))) ?>
          <?php echo $filters['browser_info'] ?>
        </td>
        <td style="padding-left: 20px;">
          <?php echo $filters['date']->renderLabel(image_tag('/images/admin/icons/date.png', array('alt' => 'date'))) ?>
          <?php echo $filters['date'] ?>
        </td>
        <td style="padding-left: 20px;">
          <input type="submit" value="Filter" class="button" />
          <?php echo link_to('Clear filters', '@access_log', array('class' => 'button', 'confirm' => 'Are you sure?')) ?>
        </td>
      </tr>
    </table>
  </form>
</div>

<div class="fright">
  <?php include_partial('common/pager', array('pager' => $records)) ?>
</div>
<div class="clear"></div>
<table class="grid" width="100%">
  <thead>
    <tr>
      <th width="200">Email</th>
      <th width="80">User ID</th>
      <th width="120">IP</th>
      <th>Browser Info</th>
      <th width="160">Date</th>
    </tr>
  </thead>
  <tbody>
    <?php $records_count = count($records); ?>
    <?php if ($records_count > 0): ?>
      <?php $alt_class = ''; ?>
      <?php foreach ($records as $record): ?>
        <tr class="<?php echo $alt_class ?>">
          <td><?php echo $record->getName() ?></td>
          <td class="center"><?php echo $record->getUserId() ?></td>
          <td class="center"><?php echo $record->getIp() ?></td>
          <td><?php echo $record->getBrowserInfo() ?></td>
          <td class="center"><?php echo $record->getCreatedAt() ?></td>
        </tr>
        <?php $alt_class = $alt_class ? '' : 'alt'; ?>
      <?php endforeach ?>
    <?php else: ?>
      <tr><td colspan="5">No records were found!</td></tr>
    <?php endif ?>
  </tbody>
  <tfoot>
    <tr>
      <th colspan="5">
        <div class="fright"><strong><?php echo $records_count ?></strong> <?php echo $records_count == 1 ? 'record was' : 'records were' ?> found</div>
        <div class="clear"></div>
      </th>
    </tr>
  </tfoot>
</table>
<?php include_partial('common/pager', array('pager' => $records)) ?>