<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<?php if ($sf_user->getFlash('success')): ?>
  <?php include_partial('common/message', array('type' => 'success', 'message' => __('Changes applied successfully'))) ?>
<?php endif ?>

<form action="<?php echo url_for($form->getObject()->isNew() ? '@users_new' : '@users_edit?id=' . $form->getObject()->getId()) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
  <div class="box">
    <div class="box-header">
      <ul>
        <li>
          <a href="#section1" class="active">
            <?php echo __('Вход'); ?>
            <?php if ($form['email']->renderError() || ($form->getObject()->isNew() && $form['password']->renderError())): ?>
              <span class="with-error">*</span>
            <?php endif ?>
          </a>
        </li>
        <li>
          <a href="#section2">
            <?php echo __('Информация'); ?>
            <?php if ($form['name']->renderError()): ?>
              <span class="with-error">*</span>
            <?php endif ?>
          </a>
        </li>
        <li><a href="#section3"><?php echo __('Настройки'); ?></a></li>
      </ul>
    </div>
    <div class="box-content">
      <div class="box-section" id="section1">
        <div class="form-item">
          <?php echo $form['email']->renderLabel() ?>
          <span class="description">/The field is required/</span><br />
          <?php echo $form['email']->renderError() ?>
          <?php echo $form['email']->render(array('class' => 'middle' . ($form['email']->renderError() ? ' with-error' : ''), 'autocomplete' => 'off')) ?>
        </div>
        
        <div class="form-item">
          <?php if ($form->getObject()->isNew()): ?>
            <?php echo $form['password']->renderLabel(__('Парола')) ?>
            <span class="description">/The field is required/</span><br />
            <?php echo $form['password']->renderError() ?>
            <?php echo $form['password']->render(array('class' => 'middle' . ($form['password']->renderError() ? ' with-error' : ''), 'autocomplete' => 'off')) ?>
          <?php else: ?>
            <?php echo $form['new_password']->renderLabel(__('Парола')) ?>
            <span class="description">/The field is required/</span><br />
            <?php echo $form['new_password']->renderError() ?>
            <?php echo $form['new_password']->render(array('class' => 'middle' . ($form['new_password']->renderError() ? ' with-error' : ''))) ?>
          <?php endif ?>
        </div>
      </div>
      
      <div class="box-section" id="section2">
        <div class="form-item">
          <?php echo $form['name']->renderLabel(__('Име')) ?>
          <span class="description">/The field is required/</span><br />
          <?php echo $form['name']->renderError() ?>
          <?php echo $form['name']->render(array('class' => 'middle' . ($form['name']->renderError() ? ' with-error' : ''))) ?>
        </div>
      </div>
      
      <div class="box-section" id="section3">
        <div class="form-item">
          <?php echo $form['role']->renderLabel(__('Роля')) ?><br />
          <?php echo $form['role']->renderError() ?>
          <?php echo $form['role'] ?>
        </div>
        <div class="form-item">
          <?php echo $form['is_active'] ?>
          <?php echo $form['is_active']->renderLabel(__('Активен?')) ?>
        </div>
      </div>
      <?php echo $form->renderHiddenFields(false) ?>
      <?php if ($form->getObject()->isNew()): ?>
      <input type="hidden" name="sf_method" value="put" />
      <?php endif ?>
      <input type="submit" value="<?php echo __('Запиши'); ?>" class="button" />
      <a href="<?php echo url_for('@users_list') ?>" class="button"><?php echo __("Отказ"); ?></a>
    </div>
  </div>
</form>