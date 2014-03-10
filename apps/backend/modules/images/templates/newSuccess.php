<?php slot('sidebar') ?>
<?php include_partial('pages/menu') ?>
<?php end_slot() ?>

<?php echo get_breadcrumb(array('@products_list' => __('Продукти'), '@products_edit?id=' . $product->getId() => $product->getTitle(), '' => $product->getTitle() . __(' - Изображения'), '' => __('Ново изображение'))) ?>

<?php include_partial('form', array('form' => $form, 'product' => $product)) ?>