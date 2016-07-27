<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Unidad', 'doctrine');

/**
 * BaseUnidad
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $id_device
 * @property string $codigo
 * @property integer $id_marca
 * @property string $lat
 * @property string $longi
 * @property timestamp $created_at
 * @property timestamp $updated_at
 * @property integer $tipo_id
 * @property string $placa
 * @property integer $anio_id
 * @property integer $linea_id
 * @property integer $estado
 * @property Anio $Anio
 * @property Linea $Linea
 * @property Marca $Marca
 * @property Tipo $Tipo
 * @property Doctrine_Collection $AsignacionUnidadPiloto
 * @property Doctrine_Collection $UnidadMensaje
 * 
 * @method integer             getId()                     Returns the current record's "id" value
 * @method string              getIdDevice()               Returns the current record's "id_device" value
 * @method string              getCodigo()                 Returns the current record's "codigo" value
 * @method integer             getIdMarca()                Returns the current record's "id_marca" value
 * @method string              getLat()                    Returns the current record's "lat" value
 * @method string              getLongi()                  Returns the current record's "longi" value
 * @method timestamp           getCreatedAt()              Returns the current record's "created_at" value
 * @method timestamp           getUpdatedAt()              Returns the current record's "updated_at" value
 * @method integer             getTipoId()                 Returns the current record's "tipo_id" value
 * @method string              getPlaca()                  Returns the current record's "placa" value
 * @method integer             getAnioId()                 Returns the current record's "anio_id" value
 * @method integer             getLineaId()                Returns the current record's "linea_id" value
 * @method integer             getEstado()                 Returns the current record's "estado" value
 * @method Anio                getAnio()                   Returns the current record's "Anio" value
 * @method Linea               getLinea()                  Returns the current record's "Linea" value
 * @method Marca               getMarca()                  Returns the current record's "Marca" value
 * @method Tipo                getTipo()                   Returns the current record's "Tipo" value
 * @method Doctrine_Collection getAsignacionUnidadPiloto() Returns the current record's "AsignacionUnidadPiloto" collection
 * @method Doctrine_Collection getUnidadMensaje()          Returns the current record's "UnidadMensaje" collection
 * @method Unidad              setId()                     Sets the current record's "id" value
 * @method Unidad              setIdDevice()               Sets the current record's "id_device" value
 * @method Unidad              setCodigo()                 Sets the current record's "codigo" value
 * @method Unidad              setIdMarca()                Sets the current record's "id_marca" value
 * @method Unidad              setLat()                    Sets the current record's "lat" value
 * @method Unidad              setLongi()                  Sets the current record's "longi" value
 * @method Unidad              setCreatedAt()              Sets the current record's "created_at" value
 * @method Unidad              setUpdatedAt()              Sets the current record's "updated_at" value
 * @method Unidad              setTipoId()                 Sets the current record's "tipo_id" value
 * @method Unidad              setPlaca()                  Sets the current record's "placa" value
 * @method Unidad              setAnioId()                 Sets the current record's "anio_id" value
 * @method Unidad              setLineaId()                Sets the current record's "linea_id" value
 * @method Unidad              setEstado()                 Sets the current record's "estado" value
 * @method Unidad              setAnio()                   Sets the current record's "Anio" value
 * @method Unidad              setLinea()                  Sets the current record's "Linea" value
 * @method Unidad              setMarca()                  Sets the current record's "Marca" value
 * @method Unidad              setTipo()                   Sets the current record's "Tipo" value
 * @method Unidad              setAsignacionUnidadPiloto() Sets the current record's "AsignacionUnidadPiloto" collection
 * @method Unidad              setUnidadMensaje()          Sets the current record's "UnidadMensaje" collection
 * 
 * @package    sistem-taxi
 * @subpackage model
 * @author     Walter Rosales
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseUnidad extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('unidad');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => true,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('id_device', 'string', 50, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 50,
             ));
        $this->hasColumn('codigo', 'string', 40, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => 'none',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 40,
             ));
        $this->hasColumn('id_marca', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => true,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('lat', 'string', 50, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '',
             'notnull' => false,
             'autoincrement' => false,
             'length' => 50,
             ));
        $this->hasColumn('longi', 'string', 50, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '',
             'notnull' => false,
             'autoincrement' => false,
             'length' => 50,
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
        $this->hasColumn('tipo_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => true,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('placa', 'string', 25, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('anio_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => true,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('linea_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => true,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
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
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Anio', array(
             'local' => 'anio_id',
             'foreign' => 'id'));

        $this->hasOne('Linea', array(
             'local' => 'linea_id',
             'foreign' => 'id'));

        $this->hasOne('Marca', array(
             'local' => 'id_marca',
             'foreign' => 'id'));

        $this->hasOne('Tipo', array(
             'local' => 'tipo_id',
             'foreign' => 'id'));

        $this->hasMany('AsignacionUnidadPiloto', array(
             'local' => 'id',
             'foreign' => 'unidad_id'));

        $this->hasMany('UnidadMensaje', array(
             'local' => 'id',
             'foreign' => 'id_unidad'));
    }
}