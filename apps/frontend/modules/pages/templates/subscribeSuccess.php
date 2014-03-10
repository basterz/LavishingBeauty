<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<div class="products-container">
    <div class="products-navigation left">
        <ul class="product-navigation">
            <div class="page_title">

                <?php echo __('Контакти'); ?>
            </div>
            <li>
                <h2>
                    <?php echo link_to(__('Контакти'), '@contacts'); ?>
                </h2>
            </li> 
            <li>
                <h2>
                    <?php echo link_to(__('Регистрирай се'), '@subscribe', array('class' => 'product-navigation-acitve')); ?>
                </h2>
            </li> 
        </ul>

    </div>
    <div class="product-container left">
        <div class="bread-crumb">
            <div id="page-path" class="left">
                <?php echo link_to(__('Начало'), '@homepage') ?> &#9679;
                <?php echo $page->getTitle(); ?>
            </div>
            <div class="right">
                <a class="page_link" 
                   href="<?php echo $_SERVER['HTTP_REFERER']; ?>">
                    &raquo; <?php echo __('Към предната страница'); ?>
                </a>
            </div>
            <div class="clear"></div>
        </div>
        <div id="main-content-top"><h1><?php echo $page->getTitle(); ?></h1></div>

        <div class="contact-container"><?php echo $page->getRaw('body'); ?></div>
        <div class="form">
            <div class="page_title">
                <?php echo __('Регистрирай се'); ?>
            </div>
            <?php if ($sf_user->getFlash('success')): ?>
                <div class="success">
                    <?php echo __("Вие се регистрирахте успешно"); ?>
                </div>
            <?php endif ?>
            <form action="<?php echo url_for('@subscribe') ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data"' ?>>
                <div class="form-row left">
                    <?php echo $form['name']->renderLabel('Име'); ?>
                    <div class="clear"></div>
                    <?php echo $form['name']->renderError() ?>
                    <?php echo $form['name']->render(array('class' => 'middle')) ?>
                </div>
                <div class="form-row right">
                    <?php echo $form['email']->renderLabel('Email'); ?>
                    <div class="clear"></div>
                    <?php echo $form['email']->renderError() ?>
                    <?php echo $form['email']->render(array('class' => 'middle')) ?>
                </div>
                    <?php echo $form->renderHiddenFields(true) ?>
                <div class="clear"></div>
                <input type="submit" value="<?php echo __('Регистрирай се') ?>" class="button right" />
                <div class="clear"></div>
                <div class="legend">
                    <div class="dark-blue">Забележка:</div>
                    <div class="blue">Всички полета са задължителни. Моля, попълнете всички полета преди да изпратите Вашето съобщение. Благодарим Ви.</div>
                </div>
            </form>
        </div>
    </div>
    <div class="clear"></div>
</div>