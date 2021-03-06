<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('ConstructionOrder', 'doctrine');

/**
 * BaseConstructionOrder
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $phone
 * @property string $address
 * @property integer $township_id
 * @property integer $age
 * @property string $client_id
 * @property string $type
 * @property string $comments
 * @property string $event
 * @property string $order_address
 * @property string $payment_type
 * @property timestamp $created_at
 * @property timestamp $updated_at
 * @property Township $Township
 * @property Doctrine_Collection $ConstructorOrder
 * @property Doctrine_Collection $ContactCall
 * 
 * @method integer             getId()               Returns the current record's "id" value
 * @method string              getFirstName()        Returns the current record's "first_name" value
 * @method string              getLastName()         Returns the current record's "last_name" value
 * @method string              getEmail()            Returns the current record's "email" value
 * @method string              getPhone()            Returns the current record's "phone" value
 * @method string              getAddress()          Returns the current record's "address" value
 * @method integer             getTownshipId()       Returns the current record's "township_id" value
 * @method integer             getAge()              Returns the current record's "age" value
 * @method string              getClientId()         Returns the current record's "client_id" value
 * @method string              getType()             Returns the current record's "type" value
 * @method string              getComments()         Returns the current record's "comments" value
 * @method string              getEvent()            Returns the current record's "event" value
 * @method string              getOrderAddress()     Returns the current record's "order_address" value
 * @method string              getPaymentType()      Returns the current record's "payment_type" value
 * @method timestamp           getCreatedAt()        Returns the current record's "created_at" value
 * @method timestamp           getUpdatedAt()        Returns the current record's "updated_at" value
 * @method Township            getTownship()         Returns the current record's "Township" value
 * @method Doctrine_Collection getConstructorOrder() Returns the current record's "ConstructorOrder" collection
 * @method Doctrine_Collection getContactCall()      Returns the current record's "ContactCall" collection
 * @method ConstructionOrder   setId()               Sets the current record's "id" value
 * @method ConstructionOrder   setFirstName()        Sets the current record's "first_name" value
 * @method ConstructionOrder   setLastName()         Sets the current record's "last_name" value
 * @method ConstructionOrder   setEmail()            Sets the current record's "email" value
 * @method ConstructionOrder   setPhone()            Sets the current record's "phone" value
 * @method ConstructionOrder   setAddress()          Sets the current record's "address" value
 * @method ConstructionOrder   setTownshipId()       Sets the current record's "township_id" value
 * @method ConstructionOrder   setAge()              Sets the current record's "age" value
 * @method ConstructionOrder   setClientId()         Sets the current record's "client_id" value
 * @method ConstructionOrder   setType()             Sets the current record's "type" value
 * @method ConstructionOrder   setComments()         Sets the current record's "comments" value
 * @method ConstructionOrder   setEvent()            Sets the current record's "event" value
 * @method ConstructionOrder   setOrderAddress()     Sets the current record's "order_address" value
 * @method ConstructionOrder   setPaymentType()      Sets the current record's "payment_type" value
 * @method ConstructionOrder   setCreatedAt()        Sets the current record's "created_at" value
 * @method ConstructionOrder   setUpdatedAt()        Sets the current record's "updated_at" value
 * @method ConstructionOrder   setTownship()         Sets the current record's "Township" value
 * @method ConstructionOrder   setConstructorOrder() Sets the current record's "ConstructorOrder" collection
 * @method ConstructionOrder   setContactCall()      Sets the current record's "ContactCall" collection
 * 
 * @package    sistem-taxi
 * @subpackage model
 * @author     Walter Rosales
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseConstructionOrder extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('construction_order');
        $this->hasColumn('id', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 8,
             ));
        $this->hasColumn('first_name', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('last_name', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('email', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('phone', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('address', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('township_id', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 8,
             ));
        $this->hasColumn('age', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 8,
             ));
        $this->hasColumn('client_id', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('type', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('comments', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('event', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('order_address', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('payment_type', 'string', null, array(
             'type' => 'string',
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
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Township', array(
             'local' => 'township_id',
             'foreign' => 'id'));

        $this->hasMany('ConstructorOrder', array(
             'local' => 'id',
             'foreign' => 'construction_order_id'));

        $this->hasMany('ContactCall', array(
             'local' => 'id',
             'foreign' => 'construction_order_id'));
    }
}