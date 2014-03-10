<div class="category-list-view">
    
    <div class="category-list">
        <div class="button-close">X</div>
        <h1>Category list</h1>
        <ul>
            <li><div item-id="0">Root Category</div></li>
            <?php foreach ($categories as $category): ?>

                <li>
                    <div class="" item-id="<?php echo $category->getID(); ?>">
                        <?php echo $category->getTitle(); ?>
                    </div>
                    
                </li>
                <?php
                        include_component('categories', 'category_list', array('parrent_id' => $category->getID()));
                    ?>
                <?php endforeach; ?>
        </ul>
    </div>

</div>