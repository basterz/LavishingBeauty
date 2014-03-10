<div class="container">
    <?php include_component("common", "booking_form"); ?>
    <?php include_component("common", "slider"); ?>
    <div class="clear"></div>
    <div class="description-container left marginTop15">
        <h1 class="standart-pink-title padding15">
            <?php echo $page->getTitle(); ?>
        </h1>
        <div>
            <?php echo $page->getRaw('body'); ?>
        </div>
    </div>
    <div class="booking-banner right marginTop15">
        <div class="standart-white-title">BOOK NOW!</div>
        <div class="padding15">
            <p>Lorem Ipsum is simply dummy 
                text of the printing and typesetting 
                industry. 
            </p>
            <a href="" class="purlple_button marginTop15 marginTop15 left">BOOK NOW</a>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
    <?php include_component("common", "homepage_boxes"); ?>
</div>
<?php include_component("common", "homepage_users"); ?>