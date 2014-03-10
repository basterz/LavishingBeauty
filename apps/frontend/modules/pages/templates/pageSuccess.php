<?php $page_type = $sf_request->getParameter('type'); ?>
<?php include_component('common', 'slider'); ?>
<?php if($page_type==2): ?>
    <div class="homepage-bottom-container">
        <div class="left-container left">
            <div class="latest-projects">

                    <div class="page-white-title">
                        <?php echo __('ПОСЛЕДНИ ПРОЕКТИ'); ?>
                    </div>
                    <?php include_component('common','latest_projects'); ?>

            </div>
        </div>
        <div class="main-container left">
            <div class="about-us-container">
                <div class="page-white-title">
                    <?php echo $page['Translation'][$sf_user->getCulture()]['title'] ?>
                </div>
                <div class="text-container">
                    <?php echo $page['Translation'][$sf_user->getCulture()]->getRaw('body')?>
                </div>
            </div>
        </div>
        <div class="right-container partners-container right">
            <div class="page-white-title">
                <?php echo __('НАШАТА ЦЕЛ'); ?>
            </div>
            <div class="text-container">
                <?php echo html_entity_decode($page['Translation'][$sf_user->getCulture()]['partners']) ?>
            </div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="thick-border"></div>
    <?php include_component('common', 'news'); ?>
<?php endif; ?>
<?php if($page_type==3): ?>
    <div class="contacts-container">
    <div style="" class="contacts left">
        <div style="text-align: left" class="page-white-title">
            <?php echo $page['Translation'][$sf_user->getCulture()]['title'] ?>
        </div>      
        <div class="text-container">
            <?php echo $page['Translation'][$sf_user->getCulture()]->getRaw('body')?>
        </div>
    </div>
    <div class="virtual-studio right">
        <div class="page-white-title">
            <span class="gray-fix"><?php echo __('Посетете нашия'); ?></span> 
            <div class="clear"></div>
            <a href="<?php echo url_for('@virtual'); ?>">
                <?php echo __('ВИРТУАЛЕН ОФИС'); ?>
            </a>
        </div>
        <img width="105" class="right" src="<?php echo url_for('/images/front/qr-code.png'); ?>" />
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
</div>
<?php endif; ?>
