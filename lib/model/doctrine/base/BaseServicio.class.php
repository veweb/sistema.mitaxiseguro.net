<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Servicio', 'doctrine');

/**
 * BaseServicio
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $unidad_id
 * @property integer $tarifa_id
 * @property string $client_name
 * @property string $client_phone
 * @property string $client_origen
 * @property string $client_destino
 * @property string $description
 * @property integer $estado
 * @property integer $notificacion
 * @property timestamp $created_at
 * @property timestamp $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 * 
 * @method integer   getId()             Returns the current record's "id" value
 * @method integer   getUnidadId()       Returns the current record's "unidad_id" value
 * @method integer   getTarifaId()       Returns the current record's "tarifa_id" value
 * @method string    getClientName()     Returns the current record's "client_name" value
 * @method string    getClientPhone()    Returns the current record's "client_phone" value
 * @method string    getClientOrigen()   Returns the current record's "client_origen" value
 * @method string    getClientDestino()  Returns the current record's "client_destino" value
 * @method string    getDescription()    Returns the current record's "description" value
 * @method integer   getEstado()         Returns the current record's "estado" value
 * @method integer   getNotificacion()   Returns the current record's "notificacion" value
 * @method timestamp getCreatedAt()      Returns the current record's "created_at" value
 * @method timestamp getUpdatedAt()      Returns the current record's "updated_at" value
 * @method integer   getCreatedBy()      Returns the current record's "created_by" value
 * @method integer   getUpdatedBy()      Returns the current record's "updated_by" value
 * @method Servicio  setId()             Sets the current record's "id" value
 * @method Servicio  setUnidadId()       Sets the current record's "unidad_id" value
 * @method Servicio  setTarifaId()       Sets the current record's "tarifa_id" value
 * @method Servicio  setClientName()     Sets the current record's "client_name" value
 * @method Servicio  setClientPhone()    Sets the current record's "client_phone" value
 * @method Servicio  setClientOrigen()   Sets the current record's "client_origen" value
 * @method Servicio  setClientDestino()  Sets the current record's "client_destino" value
 * @method Servicio  setDescription()    Sets the current record's "description" value
 * @method Servicio  setEstado()         Sets the current record's "estado" value
 * @method Servicio  setNotificacion()   Sets the current record's "notificacion" value
 * @method Servicio  setCreatedAt()      Sets the current record's "created_at" value
 * @method Servicio  setUpdatedAt()      Sets the current record's "updated_at" value
 * @method Servicio  setCreatedBy()      Sets the current record's "created_by" value
 * @method Servicio  setUpdatedBy()      Sets the current record's "updated_by" value
 * 
 * @package    sistem-taxi
 * @subpackage model
 * @author     Walter Rosales
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseServicio extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('servicio');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('unidad_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('tarifa_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('client_name', 'string', 100, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 100,
             ));
        $this->hasColumn('client_phone', 'string', 100, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 100,
             ));
        $this->hasColumn('client_origen', 'string', 100, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 100,
             ));
        $this->hasColumn('client_destino', 'string', 100, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 100,
             ));
        $this->hasColumn('description', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('estado', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('notificacion', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
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
        $this->hasColumn('created_by', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('updated_by', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}