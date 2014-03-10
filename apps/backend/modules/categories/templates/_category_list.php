<?php if($categories[0]->getID()): ?>
    <ul class="sub">    
    <?php foreach ($categories as $category): ?>
            
        <li>
            <div class="" item-id="<?php echo $category->getID(); ?>">
                <?php echo $category->getTitle(); ?>
            </div>
            
        </li>
        <?php 
                include_component('categories', 
                                  'category_list', 
                                  array('parrent_id' => $category->getID())
                                 ); 
                ?>
    <?php endforeach; ?>     
   </ul>
<?php endif; ?>