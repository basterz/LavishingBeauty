<div class="booking-form left">
    <div class="white-border marginBottom12"></div>
    <form>
        <div class="form-item">
            <?php echo $form['category']->renderLabel("Choose cateogy:") ?>
            <div class="clear"></div>
            <?php echo $form['category']->render(array('class' => "" . ($form['category']->renderError() ? ' with-error' : ''))) ?>
        </div>
        <div class="form-item">
            <?php echo $form['product']->renderLabel("Choose product:") ?>
            <div class="clear"></div>
            <?php echo $form['product']->render(array('class' => "" . ($form['product']->renderError() ? ' with-error' : ''))) ?>
        </div>
        <div class="form-item">
            <?php echo $form['area']->renderLabel("Choose area:") ?>
            <div class="clear"></div>
            <?php echo $form['area']->render(array('class' => "" . ($form['area']->renderError() ? ' with-error' : ''))) ?>
        </div>
        <div class="form-item">
            <?php echo $form['date']->renderLabel("Choose date:") ?>
            <div class="clear"></div>
            <?php echo $form['date']->render(array('class' => "" . ($form['date']->renderError() ? ' with-error' : ''))) ?>
        </div>
        <input class="purlple_button marginTop15 marginBottom15" type="submit" value="BOOK NOW" name="submit"/>
    </form>
</div>