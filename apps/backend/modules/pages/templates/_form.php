<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<?php $languages = sfConfig::get('app_supported_languages') ?>

<?php if ($sf_user->getFlash('success')): ?>
  <?php include_partial('common/message', array('type' => 'success', 'message' => __('Промените са нанесени успешно!'))) ?>
<?php endif ?>
<form action="<?php echo url_for($form->getObject()->isNew() ? '@pages_new?type=' . $type : '@pages_edit?type=' . $type . '&id=' . $form->getObject()->getId()) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
  <div class="box">
    <div class="box-header">
      <ul>
        <?php foreach ($languages as $culture => $language): ?>
        <li>
          <a href="#section_<?php echo $culture ?>"><?php echo $language ?></a>
        </li>
        <?php endforeach ?>
      </ul>
    </div>
    <div class="box-content">
       
      <?php foreach ($languages as $culture => $language): ?>
        <div class="box-section" id="section_<?php echo $culture ?>">
          <?php echo image_tag('/images/admin/flags/' . $culture . '_big.png', array('alt' => $language, 'class' => 'record-flag')) ?>
          
          <div class="form-item">
            <?php echo $form[$culture]['title']->renderLabel(__('Заглавие')) ?>
            <span class="description">/The field is required/</span><br />
            <?php echo $form[$culture]['title']->renderError() ?>
            <?php echo $form[$culture]['title']->render(array('class' => 'middle' . ($form[$culture]['title']->renderError() ? ' with-error' : ''))) ?>
          </div>
          
            <div class="form-item">
              <?php echo $form[$culture]['body']->renderLabel(__('Съдържание')) ?><br />
              <?php echo $form[$culture]['body']->renderError() ?>
              <?php echo $form[$culture]['body']->render(array('class' => 'editor')) ?>
            </div>
          <?php if($sf_request->getParameter('type') == null): ?>
            <div class="form-item">
              <?php echo $form[$culture]['links']->renderLabel(__('Връзки')) ?><br />
              <?php echo $form[$culture]['links']->renderError() ?>
              <?php echo $form[$culture]['links']->render(array('class' => 'editor')) ?>
            </div>
            <div class="form-item">
              <?php echo $form[$culture]['partners']->renderLabel(__('Партньори')) ?><br />
              <?php echo $form[$culture]['partners']->renderError() ?>
              <?php echo $form[$culture]['partners']->render(array('class' => 'editor')) ?>
            </div>
          <?php endif; ?>  
          <?php if($sf_request->getParameter('type') == null): ?>
              <?php echo $form[$culture]['partners']->renderLabel(__('Нашата цел')) ?><br />
              <?php echo $form[$culture]['partners']->renderError() ?>
              <?php echo $form[$culture]['partners']->render(array('class' => 'editor')) ?>
          <?php endif; ?>
          <div class="form-item">
            <?php echo $form[$culture]['is_published']->render(array('class' => 'checkbox')) ?>
            <?php echo $form[$culture]['is_published']->renderLabel(__('Публикувай?')) ?>
          </div>
          
          <h2>SEO</h2>
          
          <div class="form-item">
            <?php echo $form[$culture]['meta_title']->renderLabel(__('SEO Заглавие')) ?><br />
            <?php echo $form[$culture]['meta_title']->renderError() ?>
            <?php echo $form[$culture]['meta_title']->render(array('class' => 'middle')) ?>
          </div>
          
          <div class="form-item">
            <?php echo $form[$culture]['meta_keywords']->renderLabel(__('Ключови думи')) ?><br />
            <?php echo $form[$culture]['meta_keywords']->renderError() ?>
            <?php echo $form[$culture]['meta_keywords']->render(array('class' => 'middle')) ?>
          </div>
          
          <div class="form-item">
            <?php echo $form[$culture]['meta_description']->renderLabel(__('SEO Описание')) ?><br />
            <?php echo $form[$culture]['meta_description']->renderError() ?>
            <?php echo $form[$culture]['meta_description']->render(array('class' => 'middle')) ?>
          </div>
        </div>
      <?php endforeach ?>
      
      <?php echo $form->renderHiddenFields(false) ?>
      <?php if ($form->getObject()->isNew()): ?>
      <input type="hidden" name="sf_method" value="put" />
      <?php endif ?>
      <input type="submit" value="<?php echo __('Запиши'); ?>" class="button" />
      <a href="<?php //echo url_for('@pages_list?type=' . $type) ?>" class="button"><?php echo __("Отказ"); ?></a>
    </div>
  </div>
</form>