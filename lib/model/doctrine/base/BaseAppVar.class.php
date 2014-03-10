<?php

/**
 * BaseAppVar
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $var_key
 * @property string $var_value
 * 
 * @method integer getId()        Returns the current record's "id" value
 * @method string  getVarKey()    Returns the current record's "var_key" value
 * @method string  getVarValue()  Returns the current record's "var_value" value
 * @method AppVar  setId()        Sets the current record's "id" value
 * @method AppVar  setVarKey()    Sets the current record's "var_key" value
 * @method AppVar  setVarValue()  Sets the current record's "var_value" value
 * 
 * @package    LavishingBeaty
 * @subpackage model
 * @author     Tsvetan Himchev
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseAppVar extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('app_var');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('var_key', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('var_value', 'string', null, array(
             'type' => 'string',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}