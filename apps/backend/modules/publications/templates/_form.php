<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<?php $languages = sfConfig::get('app_supported_languages') ?>

<?php if ($sf_user->getFlash('success')): ?>
  <?php include_partial('common/message', array('type' => 'success', 'message' => __('Промените са нанесени успешно!'))) ?>
<?php endif ?>

<form action="<?php echo url_for(($form->getObject()->isNew() ? '@publications_new' : '@publications_edit').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
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
          
          <h2><?php echo __('Съдържание'); ?></h2>
          <div class="form-item">
                <?php echo $form[$culture]['title']->renderLabel(__('Заглавие')); ?>
                <span class="description">/The field is required</span><br />
                <?php echo $form[$culture]['title']->renderError() ?>
                <?php echo $form[$culture]['title']->render(array('class' => 'middle')) ?>
          </div>
          <div class="form-item">
                <?php 
                    $source = '/uploads/publications/'.$form->getObject()->getImage();
                    echo image_tag($source); 
                    ?>
                <br />
                <?php echo $form[$culture]['image']->renderLabel(__('Изображение')) ?>
                <span class="description">/The field is required/</span><br />
                <?php echo $form[$culture]['image']->renderError() ?>
                <?php echo $form[$culture]['image']->render(array('class' => 'middle')) ?>
          </div>
          <div class="form-item">
                <?php echo $form[$culture]['file']->renderLabel(__('PDF файл')) ?>
                <span class="description">/The field is required</span><br />
                <?php echo $form[$culture]['file']->renderError() ?>
                <?php echo $form[$culture]['file']->render(array('class' => 'middle')) ?>
          </div>
          
          <div class="form-item">
            <?php echo $form[$culture]['is_published']->render(array('class' => 'checkbox')) ?>
            <?php echo $form[$culture]['is_published']->renderLabel(__('Публикувай?')) ?>
          </div>
          
        </div>
      <?php endforeach ?>

      
      <?php echo $form->renderHiddenFields(false) ?>
      <?php if ($form->getObject()->isNew()): ?>
      <input type="hidden" name="sf_method" value="put" />
      <?php endif ?>
      <input type="submit" value="<?php echo __('Запиши'); ?>" class="button" />
      <a href="<?php echo url_for('@publications_list') ?>" class="button"><?php echo __("Отказ"); ?></a>
    </div>
  </div>
</form>
