<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('ContactCall', 'doctrine');

/**
 * BaseContactCall
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $construction_order_id
 * @property integer $constructor_order_id
 * @property string $description
 * @property timestamp $created_at
 * @property timestamp $updated_at
 * @property integer $status
 * @property integer $is_paymet
 * @property integer $is_credit
 * @property integer $is_contact
 * @property ConstructionOrder $ConstructionOrder
 * @property ConstructorOrder $ConstructorOrder
 * 
 * @method integer           getId()                    Returns the current record's "id" value
 * @method integer           getConstructionOrderId()   Returns the current record's "construction_order_id" value
 * @method integer           getConstructorOrderId()    Returns the current record's "constructor_order_id" value
 * @method string            getDescription()           Returns the current record's "description" value
 * @method timestamp         getCreatedAt()             Returns the current record's "created_at" value
 * @method timestamp         getUpdatedAt()             Returns the current record's "updated_at" value
 * @method integer           getStatus()                Returns the current record's "status" value
 * @method integer           getIsPaymet()              Returns the current record's "is_paymet" value
 * @method integer           getIsCredit()              Returns the current record's "is_credit" value
 * @method integer           getIsContact()             Returns the current record's "is_contact" value
 * @method ConstructionOrder getConstructionOrder()     Returns the current record's "ConstructionOrder" value
 * @method ConstructorOrder  getConstructorOrder()      Returns the current record's "ConstructorOrder" value
 * @method ContactCall       setId()                    Sets the current record's "id" value
 * @method ContactCall       setConstructionOrderId()   Sets the current record's "construction_order_id" value
 * @method ContactCall       setConstructorOrderId()    Sets the current record's "constructor_order_id" value
 * @method ContactCall       setDescription()           Sets the current record's "description" value
 * @method ContactCall       setCreatedAt()             Sets the current record's "created_at" value
 * @method ContactCall       setUpdatedAt()             Sets the current record's "updated_at" value
 * @method ContactCall       setStatus()                Sets the current record's "status" value
 * @method ContactCall       setIsPaymet()              Sets the current record's "is_paymet" value
 * @method ContactCall       setIsCredit()              Sets the current record's "is_credit" value
 * @method ContactCall       setIsContact()             Sets the current record's "is_contact" value
 * @method ContactCall       setConstructionOrder()     Sets the current record's "ConstructionOrder" value
 * @method ContactCall       setConstructorOrder()      Sets the current record's "ConstructorOrder" value
 * 
 * @package    sistem-taxi
 * @subpackage model
 * @author     Walter Rosales
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseContactCall extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('contact_call');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('construction_order_id', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 8,
             ));
        $this->hasColumn('constructor_order_id', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 8,
             ));
        $this->hasColumn('description', 'string', 200, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 200,
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
        $this->hasColumn('status', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('is_paymet', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('is_credit', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('is_contact', 'integer', 4, array(
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
        $this->hasOne('ConstructionOrder', array(
             'local' => 'construction_order_id',
             'foreign' => 'id'));

        $this->hasOne('ConstructorOrder', array(
             'local' => 'constructor_order_id',
             'foreign' => 'id'));
    }
}