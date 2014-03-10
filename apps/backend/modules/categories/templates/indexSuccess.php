<?php use_helper('Date') ?>

<?php slot('sidebar') ?>
<?php include_partial('pages/menu') ?>
<?php end_slot() ?>

<?php echo get_breadcrumb(array('@categories_list' => __('Категории'))); ?>
<h1><?php echo __('Списък на всички категории'); ?></h1>
<?php if ($sf_user->getFlash('success')): ?>
  <?php include_partial('common/message', array('type' => 'success', 'message' => __('Промените са нанесени успешно!'))) ?>
<?php endif ?>

   <a class="button" href="<?php echo url_for('@categories_new') ?>"><?php echo __('Нова категория'); ?></a>   
   <br />
   <h1 class="category-title"><?php echo __('Списък с категории'); ?></h1>
   <ul class="root-categories">
    
    <?php foreach ($categories as $category): ?>
            
        <li>
            <div class="float-left" style="width: 600px" item-id="<?php echo $category->getID(); ?>">
                <?php echo $category->getTitle(); ?>
            </div>
            <div class="float-right">
                <?php echo link_to(
                  ' ',
                  '@categories_edit?id=' . $category->getID(),
                  array(
                      'class' => 'edit tooltip',
                      'title' => __('Редакция')
                  )) ?>
              <?php echo link_to(
                  ' ',
                  '@categories_delete?id=' . $category->getID(),
                  array(
                      'method' => 'delete',
                      'confirm' => __('Потвърдете изтриването'),
                      'class' => 'delete tooltip',
                      'title' => __('Изтрий')
                  )) ?>
            </div>
            <div class="clear"></div>
        </li>
        <?php 
                include_component('categories', 
                                  'category_list_edit', 
                                  array('parrent_id' => $category->getID())
                                 ); 
                ?>  
    <?php endforeach; ?>
   </ul>

