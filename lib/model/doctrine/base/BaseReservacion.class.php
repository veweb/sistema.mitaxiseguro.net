<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Reservacion', 'doctrine');

/**
 * BaseReservacion
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $client_id
 * @property string $direccion_origen
 * @property string $nombre
 * @property string $email
 * @property string $celular
 * @property string $direccion_destino
 * @property string $phone
 * @property string  $fecha_servicio
 * @property string  $hora
 * @property integer $no_pasajeros
 * @property integer $tarifa_id
 * @property integer $unidad_id
 * @property integer $estado
 * @property string  $detalle
 * @property Cliente $Cliente
 * 
 * @method integer     getId()                Returns the current record's "id" value
 * @method integer     getClientId()          Returns the current record's "client_id" value
 * @method string      getDireccionOrigen()   Returns the current record's "direccion_origen" value
 * @method string      getNombre()            Returns the current record's "nombre" value
 * @method string      getEmail()             Returns the current record's "email" value
 * @method string      getCelular()           Returns the current record's "celular" value
 * @method string      getDireccionDestino()  Returns the current record's "direccion_destino" value
 * @method string      getPhone()             Returns the current record's "phone" value
 * @method string      getFechaServicio()     Returns the current record's "fecha_servicio" value
 * @method string      getHora()              Returns the current record's "hora" value
 * @method integer     getNoPasajeros()       Returns the current record's "no_pasajeros" value
 * @method integer     getTarifaId()          Returns the current record's "tarifa_id" value
 * @method integer     getUnidadId()          Returns the current record's "unidad_id" value
 * @method integer     getEstado()            Returns the current record's "estado" value
 * @method String      getDetalle()           Returns the current record's "Detalle" value
 * @method Cliente     getCliente()           Returns the current record's "Cliente" value
 * @method Reservacion setId()                Sets the current record's "id" value
 * @method Reservacion setClientId()          Sets the current record's "client_id" value
 * @method Reservacion setDireccionOrigen()   Sets the current record's "direccion_origen" value
 * @method Reservacion setNombre()            Sets the current record's "nombre" value
 * @method Reservacion setEmail()             Sets the current record's "email" value
 * @method Reservacion setCelular()           Sets the current record's "celular" value
 * @method Reservacion setDireccionDestino()  Sets the current record's "direccion_destino" value
 * @method Reservacion setPhone()             Sets the current record's "phone" value
 * @method Reservacion setFechaServicio()     Sets the current record's "fecha_servicio" value
 * @method Reservacion setHora()              Sets the current record's "hora" value
 * @method Reservacion setNoPasajeros()       Sets the current record's "no_pasajeros" value
 * @method Reservacion setTarifaId()          Sets the current record's "tarifa_id" value
 * @method Reservacion setUnidadId()          Sets the current record's "unidad_id" value
 * @method Reservacion setEstado()            Sets the current record's "estado" value
 * @method Reservacion setDetalle()            Sets the current record's "detalle" value
 * @method Reservacion setCliente()           Sets the current record's "Cliente" value
 * 
 * @package    sistem-taxi
 * @subpackage model
 * @author     Walter Rosales
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseReservacion extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('reservacion');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => true,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('client_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => true,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('direccion_origen', 'string', 100, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 100,
             ));
        $this->hasColumn('nombre', 'string', 100, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 100,
             ));
        $this->hasColumn('email', 'string', 50, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 50,
             ));
        $this->hasColumn('celular', 'string', 11, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 11,
             ));
        $this->hasColumn('direccion_destino', 'string', 100, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 100,
             ));
        $this->hasColumn('phone', 'string', 11, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 11,
             ));
        $this->hasColumn('fecha_servicio', 'string', 25, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('hora', 'string', 25, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('no_pasajeros', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('tarifa_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('unidad_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('estado', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
		 $this->hasColumn('detalle', 'string', 500, array(
             'type' => 'string',
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
        $this->hasOne('Cliente', array(
             'local' => 'client_id',
             'foreign' => 'id'));
    }
}