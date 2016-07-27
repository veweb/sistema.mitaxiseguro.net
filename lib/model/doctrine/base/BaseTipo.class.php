<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Tipo', 'doctrine');

/**
 * BaseTipo
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $description
 * @property timestamp $created_at
 * @property timestamp $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 * @property Doctrine_Collection $Unidad
 * 
 * @method integer             getId()          Returns the current record's "id" value
 * @method string              getDescription() Returns the current record's "description" value
 * @method timestamp           getCreatedAt()   Returns the current record's "created_at" value
 * @method timestamp           getUpdatedAt()   Returns the current record's "updated_at" value
 * @method integer             getCreatedBy()   Returns the current record's "created_by" value
 * @method integer             getUpdatedBy()   Returns the current record's "updated_by" value
 * @method Doctrine_Collection getUnidad()      Returns the current record's "Unidad" collection
 * @method Tipo                setId()          Sets the current record's "id" value
 * @method Tipo                setDescription() Sets the current record's "description" value
 * @method Tipo                setCreatedAt()   Sets the current record's "created_at" value
 * @method Tipo                setUpdatedAt()   Sets the current record's "updated_at" value
 * @method Tipo                setCreatedBy()   Sets the current record's "created_by" value
 * @method Tipo                setUpdatedBy()   Sets the current record's "updated_by" value
 * @method Tipo                setUnidad()      Sets the current record's "Unidad" collection
 * 
 * @package    sistem-taxi
 * @subpackage model
 * @author     Walter Rosales
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseTipo extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('tipo');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => true,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('description', 'string', 85, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 85,
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
        $this->hasColumn('updated_by', 'integer', 4, array(
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
        $this->hasMany('Unidad', array(
             'local' => 'id',
             'foreign' => 'tipo_id'));
    }
}