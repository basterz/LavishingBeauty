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

<div class="left project">
    <?php if($product->getBigImage()): ?>
                <?php $image = url_for('/uploads/projects/'.$product->getBigImage()); ?>
    <?php else: ?>
                <?php $image = url_for('/images/front/virtual-studio.png'); ?>
    <?php endif; ?>
    <img id="main-image" 
             src="<?php echo url_for($image) ?>" />
    <div class="page-white-title"><?php echo $product->getTitle() ?> <?php echo $product->getCity(); ?></div>
    <div class="text-container">
        <?php echo $product->getRaw('body') ?>
    </div>

    <div class="authors"><?php echo $product->getAuthor() ?></div>

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
</div>

<div class="small-box left">
    <div id="project-navigation">
    <a class="previous left" 
               href="
                    <?php if($previous_product != false): ?>
                    <?php echo url_for('@project?slug='. prepareSlugForUrl($previous_product->getTitle()).'&id='.$previous_product->getId()); ?>
                    <?php else: ?>
                       <?php echo url_for('@projects'); ?>
                    <?php endif; ?>
               ">
                <?php echo __('предишен проект'); ?>
            </a>
            
            <a class="next left" 
               href="
                    <?php if($next_product != false): ?>
                        <?php echo url_for('@project?slug='. prepareSlugForUrl($next_product->getTitle()).'&id='.$next_product->getId()); ?>
                    <?php else: ?>
                       <?php echo url_for('@projects'); ?>
                    <?php endif; ?>
               ">
                <?php echo __('следващ проект'); ?>
            </a>
        <div class="clear"></div>
    </div>
    <div class="project-details">
        <div class="field-content">
            <div class="field-title"><?php echo __('категория'); ?>:</div>
            <div class="field-description" style="">
                <?php
                    $categories = $product->getCategories();
                    $counter = 1;
                    $last = sizeof($categories);
                ?>
                <?php foreach ($categories as $category): ?>
                    <?php 
                        echo $category->getTitle();
                        $counter++; ?>
                    <?php if ($counter - 1 != $last) {
                        echo '/';
                    } ?>
                <?php endforeach; ?>

            </div>
        </div>
        <div class="clear"></div>
        <div class="field-content">
            <div class="field-title"><?php echo __('вид'); ?>:</div>
            <div class="field-description"><?php echo __($product->getProjectType()); ?></div>
        </div>
        <div class="field-content">
            <div class="field-title"><?php echo __('фаза'); ?>:</div>
            <div class="field-description"><?php echo $product->getPhase(); ?></div>
        </div>
        <div class="field-content">
            <div class="field-title"><?php echo __($product->getAreaLabel()); ?>:</div>
            <div class="field-description"><?php echo $product->getArea(); ?></div>
        </div>

    </div>

</div>
<div class="clear"></div>