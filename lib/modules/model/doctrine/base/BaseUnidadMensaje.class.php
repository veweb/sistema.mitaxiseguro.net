<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('UnidadMensaje', 'doctrine');

/**
 * BaseUnidadMensaje
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $id_unidad
 * @property integer $id_tarifa
 * @property string $texto
 * @property string $client_name
 * @property string $client_origen
 * @property string $client_destino
 * @property string $client_telefono
 * @property integer $estado
 * @property integer $notificacion
 * @property timestamp $created_at
 * @property timestamp $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 * @property Unidad $Unidad
 * @property Tarifa $Tarifa
 * @property Doctrine_Collection $Viaje
 * 
 * @method integer             getId()              Returns the current record's "id" value
 * @method integer             getIdUnidad()        Returns the current record's "id_unidad" value
 * @method integer             getIdTarifa()        Returns the current record's "id_tarifa" value
 * @method string              getTexto()           Returns the current record's "texto" value
 * @method string              getClientName()      Returns the current record's "client_name" value
 * @method string              getClientOrigen()    Returns the current record's "client_origen" value
 * @method string              getClientDestino()   Returns the current record's "client_destino" value
 * @method string              getClientTelefono()  Returns the current record's "client_telefono" value
 * @method integer             getEstado()          Returns the current record's "estado" value
 * @method integer             getNotificacion()    Returns the current record's "notificacion" value
 * @method timestamp           getCreatedAt()       Returns the current record's "created_at" value
 * @method timestamp           getUpdatedAt()       Returns the current record's "updated_at" value
 * @method integer             getCreatedBy()       Returns the current record's "created_by" value
 * @method integer             getUpdatedBy()       Returns the current record's "updated_by" value
 * @method Unidad              getUnidad()          Returns the current record's "Unidad" value
 * @method Tarifa              getTarifa()          Returns the current record's "Tarifa" value
 * @method Doctrine_Collection getViaje()           Returns the current record's "Viaje" collection
 * @method UnidadMensaje       setId()              Sets the current record's "id" value
 * @method UnidadMensaje       setIdUnidad()        Sets the current record's "id_unidad" value
 * @method UnidadMensaje       setIdTarifa()        Sets the current record's "id_tarifa" value
 * @method UnidadMensaje       setTexto()           Sets the current record's "texto" value
 * @method UnidadMensaje       setClientName()      Sets the current record's "client_name" value
 * @method UnidadMensaje       setClientOrigen()    Sets the current record's "client_origen" value
 * @method UnidadMensaje       setClientDestino()   Sets the current record's "client_destino" value
 * @method UnidadMensaje       setClientTelefono()  Sets the current record's "client_telefono" value
 * @method UnidadMensaje       setEstado()          Sets the current record's "estado" value
 * @method UnidadMensaje       setNotificacion()    Sets the current record's "notificacion" value
 * @method UnidadMensaje       setCreatedAt()       Sets the current record's "created_at" value
 * @method UnidadMensaje       setUpdatedAt()       Sets the current record's "updated_at" value
 * @method UnidadMensaje       setCreatedBy()       Sets the current record's "created_by" value
 * @method UnidadMensaje       setUpdatedBy()       Sets the current record's "updated_by" value
 * @method UnidadMensaje       setUnidad()          Sets the current record's "Unidad" value
 * @method UnidadMensaje       setTarifa()          Sets the current record's "Tarifa" value
 * @method UnidadMensaje       setViaje()           Sets the current record's "Viaje" collection
 * 
 * @package    sistem-taxi
 * @subpackage model
 * @author     Walter Rosales
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseUnidadMensaje extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('unidad_mensaje');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => true,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('id_unidad', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => true,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('id_tarifa', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => true,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('texto', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 255,
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
        $this->hasColumn('client_telefono', 'string', 11, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 11,
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
        $this->hasOne('Unidad', array(
             'local' => 'id_unidad',
             'foreign' => 'id'));

        $this->hasOne('Tarifa', array(
             'local' => 'id_tarifa',
             'foreign' => 'id'));

        $this->hasMany('Viaje', array(
             'local' => 'id',
             'foreign' => 'mensaje_unidad_id'));
    }
}