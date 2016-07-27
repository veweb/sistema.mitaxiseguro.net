<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Tarifa', 'doctrine');

/**
 * BaseTarifa
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $name
 * @property float $monto
 * @property timestamp $created_at
 * @property timestamp $updated_at
 * @property integer $created_by
 * @property integer $update_by
 * @property Doctrine_Collection $UnidadMensaje
 * 
 * @method integer             getId()            Returns the current record's "id" value
 * @method string              getName()          Returns the current record's "name" value
 * @method float               getMonto()         Returns the current record's "monto" value
 * @method timestamp           getCreatedAt()     Returns the current record's "created_at" value
 * @method timestamp           getUpdatedAt()     Returns the current record's "updated_at" value
 * @method integer             getCreatedBy()     Returns the current record's "created_by" value
 * @method integer             getUpdateBy()      Returns the current record's "update_by" value
 * @method Doctrine_Collection getUnidadMensaje() Returns the current record's "UnidadMensaje" collection
 * @method Tarifa              setId()            Sets the current record's "id" value
 * @method Tarifa              setName()          Sets the current record's "name" value
 * @method Tarifa              setMonto()         Sets the current record's "monto" value
 * @method Tarifa              setCreatedAt()     Sets the current record's "created_at" value
 * @method Tarifa              setUpdatedAt()     Sets the current record's "updated_at" value
 * @method Tarifa              setCreatedBy()     Sets the current record's "created_by" value
 * @method Tarifa              setUpdateBy()      Sets the current record's "update_by" value
 * @method Tarifa              setUnidadMensaje() Sets the current record's "UnidadMensaje" collection
 * 
 * @package    sistem-taxi
 * @subpackage model
 * @author     Walter Rosales
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseTarifa extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('tarifa');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => true,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('name', 'string', 50, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 50,
             ));
        $this->hasColumn('monto', 'float', null, array(
             'type' => 'float',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('created_at', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('updated_at', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('created_by', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('update_by', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('UnidadMensaje', array(
             'local' => 'id',
             'foreign' => 'id_tarifa'));
    }
}