<?php

/**
 * BaseUser
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $parent_id
 * @property string $email
 * @property string $password
 * @property string $remember_key
 * @property string $name
 * @property string $role
 * @property boolean $is_active
 * @property User $Parent
 * @property Doctrine_Collection $Users
 * 
 * @method integer             getId()           Returns the current record's "id" value
 * @method integer             getParentId()     Returns the current record's "parent_id" value
 * @method string              getEmail()        Returns the current record's "email" value
 * @method string              getPassword()     Returns the current record's "password" value
 * @method string              getRememberKey()  Returns the current record's "remember_key" value
 * @method string              getName()         Returns the current record's "name" value
 * @method string              getRole()         Returns the current record's "role" value
 * @method boolean             getIsActive()     Returns the current record's "is_active" value
 * @method User                getParent()       Returns the current record's "Parent" value
 * @method Doctrine_Collection getUsers()        Returns the current record's "Users" collection
 * @method User                setId()           Sets the current record's "id" value
 * @method User                setParentId()     Sets the current record's "parent_id" value
 * @method User                setEmail()        Sets the current record's "email" value
 * @method User                setPassword()     Sets the current record's "password" value
 * @method User                setRememberKey()  Sets the current record's "remember_key" value
 * @method User                setName()         Sets the current record's "name" value
 * @method User                setRole()         Sets the current record's "role" value
 * @method User                setIsActive()     Sets the current record's "is_active" value
 * @method User                setParent()       Sets the current record's "Parent" value
 * @method User                setUsers()        Sets the current record's "Users" collection
 * 
 * @package    LavishingBeaty
 * @subpackage model
 * @author     Tsvetan Himchev
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseUser extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('user');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('parent_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             ));
        $this->hasColumn('email', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'unique' => true,
             'length' => 255,
             ));
        $this->hasColumn('password', 'string', 40, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 40,
             ));
        $this->hasColumn('remember_key', 'string', 32, array(
             'type' => 'string',
             'length' => 32,
             ));
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('role', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'default' => 'user',
             'length' => 255,
             ));
        $this->hasColumn('is_active', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             'default' => false,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('User as Parent', array(
             'local' => 'parent_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasMany('User as Users', array(
             'local' => 'id',
             'foreign' => 'parent_id'));

        $timestampable0 = new Doctrine_Template_Timestampable(array(
             ));
        $this->actAs($timestampable0);
    }
}