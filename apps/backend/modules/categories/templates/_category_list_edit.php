<?php if($categories[0]->getID()): ?>
    <ul class="sub">    
    <?php foreach ($categories as $category): ?>
            
        <li>
            <div class="float-left" item-id="<?php echo $category->getID(); ?>">
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
<?php endif; ?>