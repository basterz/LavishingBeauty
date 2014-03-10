<?php
/*
  1: Начална страница
  2: За нас
  3: Услуги
  4: Проекти
  5: Статии
  6: Контакти
 */
?>

<?php $type = $sf_request->getParameter('type'); ?>
<?php $module = $sf_request->getParameter('module'); ?>
<div id="sidebar">
    <ul class="v-nav">
        <li><a href="<?php echo url_for('@slider_images_list') ?>"<?php echo $module == 'slider_images' ? ' class="selected"' : '' ?>><?php echo __("Изображения за слайдър"); ?></a></li>
        <li><a href="<?php echo url_for('@pages_home') ?>"<?php echo $type == 1 ? ' class="selected"' : '' ?>><?php echo __("Начало"); ?></a></li>
        <li><a href="<?php echo url_for('@pages_about') ?>"<?php echo $type == 2 ? ' class="selected"' : '' ?>><?php echo __("За нас"); ?></a></li>
        <li><a href="<?php echo url_for('@pages_faq') ?>"<?php echo $type == 7 ? ' class="selected"' : '' ?>><?php echo __("FAQ"); ?></a></li>
        <li><a href="<?php echo url_for('@pages_terms_and_conditions') ?>"<?php echo $type == 8 ? ' class="selected"' : '' ?>><?php echo __("Terms and conditions"); ?></a></li>
        <li><a href="<?php echo url_for('@categories_list') ?>"<?php echo $module == 'categories' ? ' class="selected"' : '' ?>><?php echo __("Услуги"); ?></a></li>
        <li><a href="<?php echo url_for('@products_list') ?>"<?php echo $module == 'products' ? ' class="selected"' : '' ?>><?php echo __("Продукти"); ?></a></li>
        <li><a href="<?php echo url_for('@articles_list') ?>"<?php echo $module == 'articles' ? ' class="selected"' : '' ?>><?php echo __("Статии"); ?></a></li>
        <li><a href="<?php echo url_for('@pages_contacts') ?>"<?php echo $type == 3 ? ' class="selected"' : '' ?>><?php echo __("Контакти"); ?></a></li>
        <li><a href="<?php echo url_for('@banners_list') ?>"<?php echo $module == 'banners' ? 'class="selected"' : '' ?>>Banners</a></li>
    </ul>
</div>