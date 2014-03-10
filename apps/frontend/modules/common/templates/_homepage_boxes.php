<?php $counter = 0; ?>
<div class="homepage-boxes marginTop15">
    <?php foreach($boxes as $box): ?>
    <?php $counter++ ?>
    <div class="box left <?php echo $counter%4 == 0 ? 'last': ''  ?>">
        <div class="standart-dark-title marginBottom15 center"><?php echo $box->getTitle(); ?></div>
        <div class="center">
            <?php $source = '/uploads/banners/'.$box->getImage(); ?>
            <?php echo image_tag($source , array("class" => "marginBottom15 marginTop15")); ?>
        </div>
        <?php echo $box->getRaw('body'); ?>
        <div class="center">
            <a class="green_button" href="<?php echo $box->getLink(); ?>">LEARN MORE</a>
        </div>
    </div>
    <?php endforeach; ?>
    <span class="clear"></span>
</div>