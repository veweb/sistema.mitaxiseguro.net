<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('ConstructorOrder', 'doctrine');

/**
 * BaseConstructorOrder
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $constructor_township_id
 * @property integer $construction_order_id
 * @property integer $is_accepted
 * @property integer $was_declined
 * @property timestamp $created_at
 * @property timestamp $updated_at
 * @property integer $is_accepted_terms
 * @property integer $is_payment
 * @property integer $is_contact
 * @property ConstructorTownship $ConstructorTownship
 * @property ConstructionOrder $ConstructionOrder
 * @property Doctrine_Collection $ContactCall
 * @property Doctrine_Collection $CtrlCredit
 * 
 * @method integer             getId()                      Returns the current record's "id" value
 * @method integer             getConstructorTownshipId()   Returns the current record's "constructor_township_id" value
 * @method integer             getConstructionOrderId()     Returns the current record's "construction_order_id" value
 * @method integer             getIsAccepted()              Returns the current record's "is_accepted" value
 * @method integer             getWasDeclined()             Returns the current record's "was_declined" value
 * @method timestamp           getCreatedAt()               Returns the current record's "created_at" value
 * @method timestamp           getUpdatedAt()               Returns the current record's "updated_at" value
 * @method integer             getIsAcceptedTerms()         Returns the current record's "is_accepted_terms" value
 * @method integer             getIsPayment()               Returns the current record's "is_payment" value
 * @method integer             getIsContact()               Returns the current record's "is_contact" value
 * @method ConstructorTownship getConstructorTownship()     Returns the current record's "ConstructorTownship" value
 * @method ConstructionOrder   getConstructionOrder()       Returns the current record's "ConstructionOrder" value
 * @method Doctrine_Collection getContactCall()             Returns the current record's "ContactCall" collection
 * @method Doctrine_Collection getCtrlCredit()              Returns the current record's "CtrlCredit" collection
 * @method ConstructorOrder    setId()                      Sets the current record's "id" value
 * @method ConstructorOrder    setConstructorTownshipId()   Sets the current record's "constructor_township_id" value
 * @method ConstructorOrder    setConstructionOrderId()     Sets the current record's "construction_order_id" value
 * @method ConstructorOrder    setIsAccepted()              Sets the current record's "is_accepted" value
 * @method ConstructorOrder    setWasDeclined()             Sets the current record's "was_declined" value
 * @method ConstructorOrder    setCreatedAt()               Sets the current record's "created_at" value
 * @method ConstructorOrder    setUpdatedAt()               Sets the current record's "updated_at" value
 * @method ConstructorOrder    setIsAcceptedTerms()         Sets the current record's "is_accepted_terms" value
 * @method ConstructorOrder    setIsPayment()               Sets the current record's "is_payment" value
 * @method ConstructorOrder    setIsContact()               Sets the current record's "is_contact" value
 * @method ConstructorOrder    setConstructorTownship()     Sets the current record's "ConstructorTownship" value
 * @method ConstructorOrder    setConstructionOrder()       Sets the current record's "ConstructionOrder" value
 * @method ConstructorOrder    setContactCall()             Sets the current record's "ContactCall" collection
 * @method ConstructorOrder    setCtrlCredit()              Sets the current record's "CtrlCredit" collection
 * 
 * @package    sistem-taxi
 * @subpackage model
 * @author     Walter Rosales
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseConstructorOrder extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('constructor_order');
        $this->hasColumn('id', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 8,
             ));
        $this->hasColumn('constructor_township_id', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 8,
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
        $this->hasColumn('is_accepted', 'integer', 1, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => false,
             'autoincrement' => false,
             'length' => 1,
             ));
        $this->hasColumn('was_declined', 'integer', 1, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => false,
             'autoincrement' => false,
             'length' => 1,
             ));
        $this->hasColumn('created_at', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('updated_at', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('is_accepted_terms', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('is_payment', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('is_contact', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('ConstructorTownship', array(
             'local' => 'constructor_township_id',
             'foreign' => 'id'));

        $this->hasOne('ConstructionOrder', array(
             'local' => 'construction_order_id',
             'foreign' => 'id'));

        $this->hasMany('ContactCall', array(
             'local' => 'id',
             'foreign' => 'constructor_order_id'));

        $this->hasMany('CtrlCredit', array(
             'local' => 'id',
             'foreign' => 'constructor_order_id'));
    }
}