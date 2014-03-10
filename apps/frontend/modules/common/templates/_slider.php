<div class="slider-wrapper slider-content right theme-default">
    <div id="slider" class="nivoSlider">
        <?php foreach($slider_images as $record): ?>
            <a href="<?php echo $record->getLink(); ?>">
                <?php
                    echo image_tag( '/uploads/slider_images/' . $record->getImage());
                ?>
            </a>
        <?php endforeach; ?>
    </div> 
</div>