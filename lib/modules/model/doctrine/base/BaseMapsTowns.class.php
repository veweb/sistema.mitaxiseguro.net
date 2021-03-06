<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('MapsTowns', 'doctrine');

/**
 * BaseMapsTowns
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $code
 * @property string $name
 * @property integer $state_id
 * @property string $location
 * @property integer $zip
 * @property integer $published
 * @property integer $sync
 * @property integer $version
 * @property MapsStates $MapsStates
 * 
 * @method integer    getId()         Returns the current record's "id" value
 * @method integer    getCode()       Returns the current record's "code" value
 * @method string     getName()       Returns the current record's "name" value
 * @method integer    getStateId()    Returns the current record's "state_id" value
 * @method string     getLocation()   Returns the current record's "location" value
 * @method integer    getZip()        Returns the current record's "zip" value
 * @method integer    getPublished()  Returns the current record's "published" value
 * @method integer    getSync()       Returns the current record's "sync" value
 * @method integer    getVersion()    Returns the current record's "version" value
 * @method MapsStates getMapsStates() Returns the current record's "MapsStates" value
 * @method MapsTowns  setId()         Sets the current record's "id" value
 * @method MapsTowns  setCode()       Sets the current record's "code" value
 * @method MapsTowns  setName()       Sets the current record's "name" value
 * @method MapsTowns  setStateId()    Sets the current record's "state_id" value
 * @method MapsTowns  setLocation()   Sets the current record's "location" value
 * @method MapsTowns  setZip()        Sets the current record's "zip" value
 * @method MapsTowns  setPublished()  Sets the current record's "published" value
 * @method MapsTowns  setSync()       Sets the current record's "sync" value
 * @method MapsTowns  setVersion()    Sets the current record's "version" value
 * @method MapsTowns  setMapsStates() Sets the current record's "MapsStates" value
 * 
 * @package    sistem-taxi
 * @subpackage model
 * @author     Walter Rosales
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseMapsTowns extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('maps_towns');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('code', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('name', 'string', 128, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 128,
             ));
        $this->hasColumn('state_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('location', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('zip', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('published', 'integer', 1, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '1',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 1,
             ));
        $this->hasColumn('sync', 'integer', 1, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 1,
             ));
        $this->hasColumn('version', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('MapsStates', array(
             'local' => 'state_id',
             'foreign' => 'id'));
    }
}