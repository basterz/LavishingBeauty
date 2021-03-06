<?php

/**
 * BaseLinkingProductCategory
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $product_id
 * @property integer $category_id
 * @property Product $Products
 * @property Category $Categories
 * 
 * @method integer                getProductId()   Returns the current record's "product_id" value
 * @method integer                getCategoryId()  Returns the current record's "category_id" value
 * @method Product                getProducts()    Returns the current record's "Products" value
 * @method Category               getCategories()  Returns the current record's "Categories" value
 * @method LinkingProductCategory setProductId()   Sets the current record's "product_id" value
 * @method LinkingProductCategory setCategoryId()  Sets the current record's "category_id" value
 * @method LinkingProductCategory setProducts()    Sets the current record's "Products" value
 * @method LinkingProductCategory setCategories()  Sets the current record's "Categories" value
 * 
 * @package    LavishingBeaty
 * @subpackage model
 * @author     Tsvetan Himchev
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseLinkingProductCategory extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('linking_product_category');
        $this->hasColumn('product_id', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 4,
             ));
        $this->hasColumn('category_id', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 4,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Product as Products', array(
             'local' => 'product_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE',
             'onUpdate' => 'CASCADE'));

        $this->hasOne('Category as Categories', array(
             'local' => 'category_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE',
             'onUpdate' => 'CASCADE'));
    }
}