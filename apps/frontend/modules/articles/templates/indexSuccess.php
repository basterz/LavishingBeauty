<div class="article-list-content">
    <div class="thick-border"></div>
    <div class="paging">
        <?php include_partial('common/pager', array('pager' => $records)) ?>
    </div>
    <div class="project-list left">
        <?php foreach($records as $record): ?>
        <a class="single-article animate" href="<?php echo url_for('@article?slug='.prepareSlugForUrl($record->getTitle()).'&id='.$record->getID()); ?>">
            <?php if($record->getImage()): ?>
                <?php $image = url_for('/uploads/articles/'.$record->getImage()); ?>
            <?php else: ?>
                <?php $image = url_for('/images/front/default-image-.png'); ?>
            <?php endif; ?>
            <img class="thumb left" src="<?php echo $image; ?>" />
            <div class="article-content left">
                <div class="page-white-title">
                    <?php echo $record->getTitle(); ?>
                </div>
                <div class="article-info">
                    <div class="field left">
                        <span class="color-dark-gray"><?php echo __('публикувана'); ?>:</span>
                        <span><?php echo date("m.Y",strtotime($record->getCreatedAt())); ?></span>
                    </div>
                    <?php if($record->getAuthor()): ?>
                    <div class="field left">
                        <span class="color-dark-gray"><?php echo __('автор'); ?>:</span>
                        <span><?php echo $record->getAuthor(); ?></span>
                    </div>
                    <?php else: ?>
                    <div class="field left">
                        <span class="color-dark-gray"><?php echo __('източник'); ?>:</span>
                        <span><?php echo $record->getSource(); ?></span>
                    </div>
                    <?php endif; ?>
                    <div class="clear"></div>
                    <div class="text-container article-text-container">
                        <?php echo $record->getRaw('short_body'); ?>
                    </div>
                    <div class="read-more color-white-gray"><?php echo __('прочети повече'); ?> ...</div>
                </div>
            </div>
            <div class="clear"></div>
        </a>
        <?php endforeach; ?>
        
    </div>
    <div class="small-box right">
        <div class="popular-articles right">
        <?php include_component('common', 'articles'); ?>
        </div>
        <div id="activity-feed" class="right">
            <div id="fb-root"></div>
            <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=401484143245971";
            fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
            <div class="fb-activity" data-href="http://www.example.com" data-width="204" data-height="350" data-header="true" data-colorscheme="dark" data-recommendations="false"></div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
    <div style="margin-top: 0px" class="paging">
        <?php include_partial('common/pager', array('pager' => $records)) ?>
    </div>
</div>