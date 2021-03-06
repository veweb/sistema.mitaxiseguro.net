<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Bank', 'doctrine');

/**
 * BaseBank
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $name
 * @property Doctrine_Collection $CtrlCredit
 * 
 * @method integer             getId()         Returns the current record's "id" value
 * @method string              getName()       Returns the current record's "name" value
 * @method Doctrine_Collection getCtrlCredit() Returns the current record's "CtrlCredit" collection
 * @method Bank                setId()         Sets the current record's "id" value
 * @method Bank                setName()       Sets the current record's "name" value
 * @method Bank                setCtrlCredit() Sets the current record's "CtrlCredit" collection
 * 
 * @package    sistem-taxi
 * @subpackage model
 * @author     Walter Rosales
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseBank extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('bank');
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
        $this->hasMany('CtrlCredit', array(
             'local' => 'id',
             'foreign' => 'bank_id'));
    }
}