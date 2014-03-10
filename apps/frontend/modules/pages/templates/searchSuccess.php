<?php include_component('common', 'slider'); ?>
<div class="search-results">
    <div class="results-found left">
        <center>
        <img class="" src="<?php echo url_for('/images/front/search-results-icon-.png'); ?>" />
        <div class="clear"></div>
        <?php $result_count = sizeof($products)+sizeof($services)+sizeof($articles); ?>
        <div style="" class="">
            <span class="color-dark-gray"><?php echo __('намерени резултати'); ?>:</span> 
            <span class="color-white"><?php echo $result_count; ?></span>
        </div>
        </center>
    </div>
   
    <div class="results-container left">
        <div class="page-white-title">
            <?php echo __('РЕЗУЛТАТИ ЗА'); ?> “<?php echo $sf_request->getParameter('search_word'); ?>”
        </div>
         <?php if($result_count > 0): ?>
        <div id="projects">
        <?php foreach($products as $row): ?>
        <a href="<?php echo url_for('@project?slug='.  prepareSlugForUrl($row->getTitle()).'&id='.$row->getID()); ?>" 
           class="search-result animate">
            <div style="margin-bottom: 12px;" class="page-white-title"><?php echo $row->getTitle(); ?></div>
            <?php echo substringTextByLenght(strip_tags($row->getRaw('body')), 30); ?>
            <span class="color-white"><?php echo __('още...'); ?></span>
        </a>
        <?php endforeach; ?>
        </div>
        <div id="services">
        <?php foreach($services as $row): ?>
        <a href="<?php echo url_for('@service?slug='.  prepareSlugForUrl($row->getTitle()).'&id='.$row->getID()); ?>" 
           class="search-result animate">
            <div style="margin-bottom: 12px;" class="page-white-title"><?php echo $row->getTitle(); ?></div>
            <?php echo substringTextByLenght(strip_tags($row->getRaw('big_body')), 30); ?>
            <span class="color-white"><?php echo __('още...'); ?></span>
        </a>
        <?php endforeach; ?>
        </div>
        <div id="articles">
        <?php foreach($articles as $row): ?>
        <a href="<?php echo url_for('@article?slug='.  prepareSlugForUrl($row->getTitle()).'&id='.$row->getID()); ?>" 
           class="search-result animate">
            <div style="margin-bottom: 12px;" class="page-white-title"><?php echo $row->getTitle(); ?></div>
            <?php echo substringTextByLenght(strip_tags($row->getRaw('body')), 30); ?>
            <span class="color-white"><?php echo __('още...'); ?></span>
        </a>
        <?php endforeach; ?>
        </div>
          <?php else: ?>

        <?php echo __('Няма намерени резултати.'); ?>

    <?php endif; ?>
    </div>
  
    <div id="filter-results" class="results-filter right">
        <form>
            <input type="checkbox" name="check[services]" value="services" />
            <label><?php echo __('Услуги'); ?></label>
            <div class="clear"></div>
            <input type="checkbox" name="check[projects]" value="projects" />
            <label><?php echo __('Проекти'); ?></label>
            <div class="clear"></div>
            <input type="checkbox" name="check[articles]" value="articles" />
            <label><?php echo __('Статии'); ?></label>
            <div class="clear"></div>
            <input class="filter-button standart-button-grey" type="submit" value="<?php echo __('Филтрирай'); ?>" />
        </form>
    </div>
    <div class="clear"></div>
</div>
