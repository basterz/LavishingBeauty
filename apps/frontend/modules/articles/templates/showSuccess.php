<div id="article-cont">
    <div id="social-navigation" class="small-box left">
        <div class="social-nav-button">
            <div id="fb-root"></div>
            <script>(function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=401484143245971";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
            <div class="fb-like" data-href="http://www.example.com" data-send="true" data-layout="box_count" data-width="58" data-show-faces="false"></div>
        </div>
        <div class="social-nav-button">
            <!-- Поставете този маркер там, където искате да се изобразява бутонът +1 -->
            <g:plusone size="tall"></g:plusone>

            <!-- Поставете това извикване за изобразяване, където е подходящо -->
            <script type="text/javascript">
            (function() {
                var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                po.src = 'https://apis.google.com/js/plusone.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
            })();
            </script>
        </div>
        <div style="margin-left: 94px;" class="social-nav-button">
            <a href="https://twitter.com/share" class="twitter-share-button" data-size="small" data-count="vertical">Tweet</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
        </div>

    </div>

    <div class="left article-container">
        <?php if($article->getBigImage()): ?>
                <?php $image = url_for('/uploads/articles/'.$article->getBigImage()); ?>
    <?php else: ?>
                <?php $image = url_for('/images/front/virtual-studio.png'); ?>
    <?php endif; ?>
    <img id="main-image" 
             src="<?php echo url_for($image) ?>" />
        <div class="page-white-title">
            <?php echo $article->getTitle(); ?>
            <div class="clear"></div>
        </div>
    </div>

    <div class="small-box left">
        <div id="project-navigation">
    <a class="previous left" 
               href="
                    <?php if($next_article != false): ?>
                        <?php echo url_for('@article?slug='. prepareSlugForUrl($next_article->getTitle()).'&id='.$next_article->getId()); ?>
                    <?php else: ?>
                       <?php echo url_for('@articles'); ?>
                    <?php endif; ?>
               ">
                <?php echo __('предишна статия'); ?>
            </a>
                
            <a class="next left" 
               href="
                    <?php if($previous_article != false): ?>
                    <?php echo url_for('@article?slug='. prepareSlugForUrl($previous_article->getTitle()).'&id='.$previous_article->getId()); ?>
                    <?php else: ?>
                       <?php echo url_for('@articles'); ?>
                    <?php endif; ?>
               ">
               
                <?php echo __('следваща статия'); ?>
            </a>
        <div class="clear"></div>
    </div>
        <a href="<?php echo url_for('@articles'); ?>" class="article-button standart-button-grey">
            <?php echo __('Всички статии'); ?>
        </a>
        <div id="counter" class="project-details">
            <div class="field-content">
                <div class="field-title"><?php echo __('Статията е разгледана'); ?></div>
                <div class="field-description"><?php echo $article->getViewed() . ' ' . __('пъти'); ?></div>
            </div>
        </div>


    </div>
    <div class="clear"></div>
    <div class="small-box left">&nbsp;</div>
    <div class="left article-container" style="margin-top: 0">
        <div class="text-container">
            <?php echo $article->getRaw('body'); ?>
        </div>
    </div>
    <!--<div class="recomended-article-cont right">
        <?php //include_component('common', 'articles'); ?>
        <div class="clear"></div>
    </div>-->
    <div class="clear"></div>
    <div class="article-bottom-elements">
        <div class="created left">
            <span class="field-title"><?php echo __('публикувана'); ?>:</span>
            <span class="field-description"><?php echo date("m.Y", strtotime($article->getCreatedAt())); ?></span>
        </div>
        <div class="author right">
            <?php if ($article->getAuthor()): ?>
                <div class="field-title"><?php echo __('автор'); ?>:</div>
                <div class="field-description"><?php echo $article->getAuthor(); ?></div>
            <?php else: ?>
                <div class="field-title"><?php echo __('източник'); ?>:</div>
                <div class="field-description"><?php echo $article->getSource(); ?></div>
            <?php endif; ?>

        </div>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
    
</div>
<br clear="all" />
<center>
    <div class="activity-feed">

        <div id="fb-root"></div>
        <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

        <div class="fb-comments" data-href="http://www.velosipedite.eu" data-num-posts="2" data-width="580" data-colorscheme="dark"></div>    
    </div>
    </center>
