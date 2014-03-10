<?php include_component('common', 'slider'); ?>
<div id="service-cont">
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
    <div class="left service-container">
        <div class="page-white-title">
            <img class="left" src="<?php echo url_for('/images/front/' . $category->getIcon()); ?>" />
            <span class="left"><?php echo $category->getTitle(); ?></span>
            <div class="clear"></div>
        </div>
        <div class="text-container">
            <?php echo $category->getRaw('big_body'); ?>
        </div>
    </div>

    <div class="small-box right">
        <div id="project-navigation">

            
            <a class="previous left" 
               href="
                    <?php if($previous_category != false): ?>
                    <?php echo url_for('@service?slug='. prepareSlugForUrl($previous_category->getTitle()).'&id='.$previous_category->getId()); ?>
                    <?php else: ?>
                       <?php echo url_for('@services'); ?>
                    <?php endif; ?>
               ">
                <?php echo __('предишна услуга'); ?>
            </a>
            
            <a class="next left" 
               href="
                    <?php if($next_category != false): ?>
                        <?php echo url_for('@service?slug='. prepareSlugForUrl($next_category->getTitle()).'&id='.$next_category->getId()); ?>
                    <?php else: ?>
                       <?php echo url_for('@services'); ?>
                    <?php endif; ?>
               ">
                <?php echo __('следваща услуга'); ?>
            </a>
            <div class="clear"></div>
        </div>
        <a href="<?php echo url_for('@services') ?>" class="service-button standart-button-grey">
            <?php echo __('Всички услуги'); ?>
        </a>

    </div>
    <div class="clear"></div>
</div>