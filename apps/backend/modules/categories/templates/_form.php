<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<?php $languages = sfConfig::get('app_supported_languages') ?>

<?php if ($sf_user->getFlash('success')): ?>
    <?php include_partial('common/message', array('type' => 'success', 'message' => __('Промените са нанесени успешно!'))) ?>
<?php endif ?>

<form action="<?php echo url_for(($form->getObject()->isNew() ? '@categories_new' : '@categories_edit') . (!$form->getObject()->isNew() ? '?id=' . $form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
    <div class="box">
        <div class="box-header">
            <ul>
                <?php foreach ($languages as $culture => $language): ?>
                    <li>
                        <a href="#section_<?php echo $culture ?>"><?php echo $language ?></a>
                    </li>
                <?php endforeach ?>
                    <li>
                        <a href="#section_settings"><?php echo __('Настройки'); ?></a>
                    </li>
            </ul>
        </div>
        <div class="box-content">

            <?php foreach ($languages as $culture => $language): ?>
                <div class="box-section" id="section_<?php echo $culture ?>">
                    <?php echo image_tag('/images/admin/flags/' . $culture . '_big.png', array('alt' => $language, 'class' => 'record-flag')) ?>

                    <h2><?php echo __('Съдържание'); ?></h2>

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
                    <div class="form-item">
                        <?php echo $form[$culture]['big_body']->renderLabel(__('Разширено съдържание')) ?><br />
                        <?php echo $form[$culture]['big_body']->renderError() ?>
                        <?php echo $form[$culture]['big_body']->render(array('class' => 'editor')) ?>
                    </div>

                    <div class="form-item">
                        <?php echo $form[$culture]['is_published']->render(array('class' => 'checkbox')) ?>
                        <?php echo $form[$culture]['is_published']->renderLabel(__('Публикувай?')) ?>
                    </div>

                </div>
            <?php endforeach ?>
            
            <div class="box-section" id="section_settings">
                <div class="form-item">
                    <?php echo $form['position']->renderLabel(__('Позиция')) ?><br />
                    <?php echo $form['position']->renderError() ?>
                    <?php echo $form['position']->render(array('class' => 'small')) ?>
                </div>
           
                <div class="form-item">
                    <?php echo $form['parrent_id']->renderLabel(__('Parent category')) ?><br />

                    <?php echo $form['parrent_id']->renderError() ?>
                      <span class="description">/The field is required/</span><br />
                    <div id="fake-button" class="middle float-left <?php echo $form['parrent_id']->renderError() ? ' with-error' : ''; ?>">
                        <?php  if(!$form->getObject()->isNew()){
                                if($categoryParrentName['parrent_id'] == 0){
                                    echo __('Root Category');
                                }
                                else{
                                    echo $categoryParrentName['title'];
                                }

                            } ?>
                    </div>
                    <?php echo $form['parrent_id']->render(array('class' => 'hidden left' . ($form['parrent_id']->renderError() ? ' with-error' : ''))) ?>
                    <div id="category-button" data-url="<?php echo url_for('@choose_category') ?>" class="float-left  button">Choose category</div>
                    <div class="clear"></div>
                </div>
                
            </div>

            <?php echo $form->renderHiddenFields(false) ?>
            <?php if ($form->getObject()->isNew()): ?>
                <input type="hidden" name="sf_method" value="put" />
            <?php endif ?>
            <input type="submit" value="<?php echo __('Запиши'); ?>" class="button" />
            <a href="<?php echo url_for('@categories_list') ?>" class="button"><?php echo __("Отказ"); ?></a>
        </div>
    </div>
</form>
