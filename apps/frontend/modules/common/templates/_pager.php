<?php use_helper('SmartLinks') ?>
<?php if ($pager->haveToPaginate()): ?>
    <!-- Paging -->
    <div class="pager">
   
        <div class="page-links right">
            <?php $params['page'] = 1; ?>
            <?php $params['page'] = $pager->getPreviousPage(); ?>
            <a href="<?php echo link_to_listing(null, $params) ?>"><<</a>
            <?php foreach ($pager->getLinks() as $page): ?> 
                <?php if ($page == $pager->getPage()): ?>
                    <span class=""><?php echo $page ?></span>
                    <?php
                        if($page != $pager->getLastPage()){
                            echo '|';
                        }
                    ?>
                <?php else: ?>
                    <?php $params['page'] = $page; ?>
                    <a class="" href="<?php echo link_to_listing(null, $params) ?>"><?php echo $page ?></a> 
                    <?php
                        if($page != $pager->getLastPage()){
                            echo '|';
                        }
                    ?>
                <?php endif ?>
            <?php endforeach ?>
            <?php $params['page'] = $pager->getNextPage(); ?>
             <a href="<?php echo link_to_listing(null, $params) ?>">>></a>
            <?php $params['page'] = $pager->getLastPage(); ?>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>
    <!-- End of Paging -->
    <?php
 endif ?>