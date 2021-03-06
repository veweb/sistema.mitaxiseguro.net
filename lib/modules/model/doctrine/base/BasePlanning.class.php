<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Planning', 'doctrine');

/**
 * BasePlanning
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $name
 * 
 * @method integer  getId()   Returns the current record's "id" value
 * @method string   getName() Returns the current record's "name" value
 * @method Planning setId()   Sets the current record's "id" value
 * @method Planning setName() Sets the current record's "name" value
 * 
 * @package    sistem-taxi
 * @subpackage model
 * @author     Walter Rosales
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePlanning extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('planning');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('name', 'string', 75, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 75,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}