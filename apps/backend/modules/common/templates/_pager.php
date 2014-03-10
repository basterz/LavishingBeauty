<?php use_helper('SmartLinks') ?>
<?php if ($pager->haveToPaginate()): ?>
<!-- Paging -->
  <div class="pager">
    <?php $params['page'] = 1; ?>
    <a href="<?php echo link_to_listing(null, $params) ?>">First</a>
    <?php $params['page'] = $pager->getPreviousPage(); ?>
    <a href="<?php echo link_to_listing(null, $params) ?>">&#171;</a>
    <?php foreach($pager->getLinks() as $page): ?>
      <?php if ($page == $pager->getPage()): ?>
        <span><?php echo $page ?></span>
      <?php else: ?>
        <?php $params['page'] = $page; ?>
        <a href="<?php echo link_to_listing(null, $params) ?>"><?php echo $page ?></a>
      <?php endif ?>
    <?php endforeach ?>
        <?php $params['page'] = $pager->getNextPage(); ?>
    <a href="<?php echo link_to_listing(null, $params) ?>">&#187;</a>
    <?php $params['page'] = $pager->getLastPage(); ?>
    <a href="<?php echo link_to_listing(null, $params) ?>">Last</a>
  </div>
  <!-- End of Paging -->
<?php endif ?>