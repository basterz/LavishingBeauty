<?php include_component('common', 'slider'); ?>
<div id="services" class="serv-cont">
    <?php $counter = 1; ?>
    <?php foreach ($records as $service): ?>
    <a href="<?php echo url_for('@service?slug='.  prepareSlugForUrl($service->getTitle()) . '&id=' . $service->getID()); ?>" 
       class="<?php echo (($counter%3) == 0) ? 'service right third' : 'service first left' ?>">
        <img class="service-left" src="<?php echo url_for('/images/front/'.$service->getIcon()); ?>" />
        <div class="service-cont right">
            <h2 class="page-white-title"><?php echo $service->getTitle(); ?></h2>
            <div class="text-container">
                <?php echo $service->getRaw('body'); ?>
            </div>
        </div>
        <div class="clear"></div>
    </a>
    <?php if($counter%3 == 0): ?>
    <div class="clear"></div>
    <?php endif; ?>
    <?php
        $counter++;
        endforeach; 
        ?>
    
    <div class="clear"></div>

</div>
<div class="thick-border"></div>
<?php include_component('common', 'news'); ?>