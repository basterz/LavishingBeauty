
<div class="project-list-content">
    <div class="thick-border"></div>
    <div class="paging">
        <?php include_partial('common/pager', array('pager' => $products)) ?>
    </div>
    <div class="project-list left">
        <?php foreach ($products as $product): ?>
        <a class="single-project animate" 
           href="<?php echo url_for('@project?slug=' . prepareSlugForUrl($product->getTitle()) . '&id='.$product->getID()); ?>">
            <?php if($product->getImage()): ?>
                <?php $image = url_for('/uploads/projects/'.$product->getImage()); ?>
            <?php else: ?>
                <?php $image = url_for('/images/front/default-image-.png'); ?>
            <?php endif; ?>
            <img class="thumb left" src="<?php echo $image; ?>" />
            <div class="project-content left">
                <div class="page-white-title bold">
                    <?php echo $product->getTitle(); ?> <?php echo $product->getCity(); ?>
                </div>
                <div class="project-specifications">
                    <div class="field-content">
                        <div class="field-title"><?php echo __('категория'); ?>:</div>
                        <div class="field-description" style="">
                            <?php 
                                $categories = $product->getCategories(); 
                                $counter=1; 
                                $last = sizeof($categories);
                                ?>
                            <?php foreach ($categories as $category): ?>
                                <?php echo $category->getTitle(); $counter++; ?>
                                <?php if($counter-1 != $last){echo '/';} ?>
                            <?php endforeach; ?>
                            <div class="clear"></div>    
                        </div>
                    </div>
                    <div class="clear"></div>
                    <div class="field-content">
                        <div class="field-title"><?php echo __('вид'); ?>:</div>
                        <div class="field-description"><?php echo $product->getProjectType(); ?></div>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                    <div class="field-content">
                        <div class="field-title"><?php echo __('фаза'); ?>:</div>
                        <div class="field-description"><?php echo $product->getPhase(); ?></div>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                    <div class="field-content">
                        <div class="field-title"><?php echo __($product->getAreaLabel()); ?>:</div>
                        <div class="field-description"><?php echo $product->getArea(); ?></div>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                    <div class="field-content">
                        <div class="field-title"><?php echo __($product->getAuthorLabel()); ?>:</div>
                        <div class="field-description"><?php echo $product->getAuthor(); ?></div>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="clear"></div>
        </a>
        <?php endforeach; ?>
    </div>
    <div class="small-box right">
        <?php include_component('common', 'filter', array('filter'=>$filter_values)); ?>
        <?php include_component('common', 'popular_projects'); ?>
    </div>
    <div class="clear"></div>
    <div style="margin-top: 0px" class="paging">
        <?php include_partial('common/pager', array('pager' => $products)) ?>
    </div>
</div>