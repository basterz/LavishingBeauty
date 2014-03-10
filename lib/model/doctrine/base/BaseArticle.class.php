<?php

/**
 * BaseArticle
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $title
 * @property string $short_body
 * @property string $body
 * @property string $author
 * @property string $source
 * @property string $image
 * @property string $big_image
 * @property boolean $popular
 * @property boolean $is_published
 * @property integer $position
 * @property integer $viewed
 * 
 * @method integer getId()           Returns the current record's "id" value
 * @method string  getTitle()        Returns the current record's "title" value
 * @method string  getShortBody()    Returns the current record's "short_body" value
 * @method string  getBody()         Returns the current record's "body" value
 * @method string  getAuthor()       Returns the current record's "author" value
 * @method string  getSource()       Returns the current record's "source" value
 * @method string  getImage()        Returns the current record's "image" value
 * @method string  getBigImage()     Returns the current record's "big_image" value
 * @method boolean getPopular()      Returns the current record's "popular" value
 * @method boolean getIsPublished()  Returns the current record's "is_published" value
 * @method integer getPosition()     Returns the current record's "position" value
 * @method integer getViewed()       Returns the current record's "viewed" value
 * @method Article setId()           Sets the current record's "id" value
 * @method Article setTitle()        Sets the current record's "title" value
 * @method Article setShortBody()    Sets the current record's "short_body" value
 * @method Article setBody()         Sets the current record's "body" value
 * @method Article setAuthor()       Sets the current record's "author" value
 * @method Article setSource()       Sets the current record's "source" value
 * @method Article setImage()        Sets the current record's "image" value
 * @method Article setBigImage()     Sets the current record's "big_image" value
 * @method Article setPopular()      Sets the current record's "popular" value
 * @method Article setIsPublished()  Sets the current record's "is_published" value
 * @method Article setPosition()     Sets the current record's "position" value
 * @method Article setViewed()       Sets the current record's "viewed" value
 * 
 * @package    LavishingBeaty
 * @subpackage model
 * @author     Tsvetan Himchev
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseArticle extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('article');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('title', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('short_body', 'string', null, array(
             'type' => 'string',
             ));
        $this->hasColumn('body', 'string', null, array(
             'type' => 'string',
             ));
        $this->hasColumn('author', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('source', 'string', null, array(
             'type' => 'string',
             ));
        $this->hasColumn('image', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('big_image', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('popular', 'boolean', null, array(
             'type' => 'boolean',
             ));
        $this->hasColumn('is_published', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             'default' => true,
             ));
        $this->hasColumn('position', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             ));
        $this->hasColumn('viewed', 'integer', 5, array(
             'type' => 'integer',
             'length' => 5,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $timestampable0 = new Doctrine_Template_Timestampable();
        $i18n0 = new Doctrine_Template_I18n(array(
             'fields' => 
             array(
              0 => 'title',
              1 => 'short_body',
              2 => 'author',
              3 => 'source',
              4 => 'body',
              5 => 'image',
              6 => 'big_image',
              7 => 'is_published',
             ),
             ));
        $this->actAs($timestampable0);
        $this->actAs($i18n0);
    }
}