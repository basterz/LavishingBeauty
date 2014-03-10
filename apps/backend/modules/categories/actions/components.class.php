<?php

class categoriesComponents extends sfComponents {

    public function executeCategory_list(sfWebRequest $request) {
        $parrent_id = $this->parrent_id;
        
        $this->categories = Doctrine_Core::getTable('category')
                ->createQuery('a')
                ->where('parrent_id =' . $parrent_id)
                ->execute();
       
    }
    public function executeCategory_list_edit(sfWebRequest $request) {
        $parrent_id = $this->parrent_id;
        
        $this->categories = Doctrine_Core::getTable('category')
                ->createQuery('a')
                ->where('parrent_id =' . $parrent_id)
                ->execute();
       
    }

    

}