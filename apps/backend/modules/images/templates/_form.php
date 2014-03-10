<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<?php $languages = sfConfig::get('app_supported_languages') ?>

<?php if ($sf_user->getFlash('success')): ?>
  <?php include_partial('common/message', array('type' => 'success', 'message' => __('Промените са нанесени успешно!'))) ?>
<?php endif ?>

<form action="<?php echo url_for($form->getObject()->isNew() ? '@images_new?product_id=' . $product->getId() : '@images_edit?product_id=' . $product->getId() . '&id=' . $form->getObject()->getId()) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
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
        </div>
      <?php endforeach ?>
      
      <?php if ($form->getObject()->isNew()): ?>
      <div class="form-item">
        
        <?php echo $form['filename']->renderLabel(__('Изображение')) ?>
        <span class="description"> Recommended image size: width:200px height:200px</span><br />
        <?php echo $form['filename']->renderError() ?>
        <?php echo $form['filename'] ?>
      </div>
      <?php endif ?>
      
      <div class="form-item">
        <?php echo $form['position']->renderLabel(__('Позиция')) ?><br />
        <?php echo $form['position']->renderError() ?>
        <?php echo $form['position']->render(array('type' => 'number', 'min' => 1, 'step' => 1)) ?>
      </div>
      
      <?php echo $form->renderHiddenFields(false) ?>
      <?php if ($form->getObject()->isNew()): ?>
      <input type="hidden" name="sf_method" value="put" />
      <?php endif ?>
      <input type="submit" value="<?php echo __('Запиши'); ?>" class="button" />
      <a href="<?php echo url_for('@images_list?product_id=' . $product->getId()) ?>" class="button"><?php echo __('Отказ'); ?></a>
    </div>
  </div>
</form>