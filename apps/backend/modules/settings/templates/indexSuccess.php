<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<?php slot('body_class', 'one-column') ?>
<?php echo get_breadcrumb(array('' => __('Настройки'))) ?>

<?php if ($sf_user->getFlash('success')): ?>
    <?php include_partial('common/message', array('type' => 'success', 'message' => 'The changes you made were saved successfully!')) ?>
<?php endif ?>

<form action="<?php echo url_for('@settings') ?>" method="post">
    <?php echo $form->renderGlobalErrors() ?>

    <?php for ($i = 1; $i <= $form->getOption('count'); $i++): ?>
        <div class="form-item">
            <?php echo $form[$i]['var_value']->renderLabel($form->getEmbeddedForm($i)->getObject()->getVarKey()) ?><br />
            <?php echo $form[$i]['var_value']->renderError() ?>
            <?php echo $form[$i]['var_value']->render(array('class' => 'middle')) ?>
        </div>
    <?php endfor ?>

    <?php echo $form->renderHiddenFields() ?>
    <br />
    <div class="form-item">
    <input type="submit" value="Save" class="button" />
    </div>
</form>