<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('EmpleadoEmpresa', 'doctrine');

/**
 * BaseEmpleadoEmpresa
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $codigo
 * @property string $primer_nombre
 * @property string $segundo_nombre
 * @property string $primer_apellido
 * @property string $segundo_apellido
 * @property string $destino
 * @property string $inicio
 * @property string $comentarios
 * @property integer $hora_pico
 * @property integer $empresa
 * @property timestamp $created_at
 * @property timestamp $update_at
 * @property Empresa $Empresa
 * @property Empresa $Empresa_2
 * 
 * @method integer         getId()               Returns the current record's "id" value
 * @method string          getCodigo()           Returns the current record's "codigo" value
 * @method string          getPrimerNombre()     Returns the current record's "primer_nombre" value
 * @method string          getSegundoNombre()    Returns the current record's "segundo_nombre" value
 * @method string          getPrimerApellido()   Returns the current record's "primer_apellido" value
 * @method string          getSegundoApellido()  Returns the current record's "segundo_apellido" value
 * @method string          getDestino()          Returns the current record's "destino" value
 * @method string          getInicio()           Returns the current record's "inicio" value
 * @method string          getComentarios()      Returns the current record's "comentarios" value
 * @method integer         getHoraPico()         Returns the current record's "hora_pico" value
 * @method integer         getEmpresa()          Returns the current record's "empresa" value
 * @method timestamp       getCreatedAt()        Returns the current record's "created_at" value
 * @method timestamp       getUpdateAt()         Returns the current record's "update_at" value
 * @method Empresa         getEmpresa()          Returns the current record's "Empresa" value
 * @method Empresa         getEmpresa2()         Returns the current record's "Empresa_2" value
 * @method EmpleadoEmpresa setId()               Sets the current record's "id" value
 * @method EmpleadoEmpresa setCodigo()           Sets the current record's "codigo" value
 * @method EmpleadoEmpresa setPrimerNombre()     Sets the current record's "primer_nombre" value
 * @method EmpleadoEmpresa setSegundoNombre()    Sets the current record's "segundo_nombre" value
 * @method EmpleadoEmpresa setPrimerApellido()   Sets the current record's "primer_apellido" value
 * @method EmpleadoEmpresa setSegundoApellido()  Sets the current record's "segundo_apellido" value
 * @method EmpleadoEmpresa setDestino()          Sets the current record's "destino" value
 * @method EmpleadoEmpresa setInicio()           Sets the current record's "inicio" value
 * @method EmpleadoEmpresa setComentarios()      Sets the current record's "comentarios" value
 * @method EmpleadoEmpresa setHoraPico()         Sets the current record's "hora_pico" value
 * @method EmpleadoEmpresa setEmpresa()          Sets the current record's "empresa" value
 * @method EmpleadoEmpresa setCreatedAt()        Sets the current record's "created_at" value
 * @method EmpleadoEmpresa setUpdateAt()         Sets the current record's "update_at" value
 * @method EmpleadoEmpresa setEmpresa()          Sets the current record's "Empresa" value
 * @method EmpleadoEmpresa setEmpresa2()         Sets the current record's "Empresa_2" value
 * 
 * @package    sistem-taxi
 * @subpackage model
 * @author     Walter Rosales
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseEmpleadoEmpresa extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('empleado_empresa');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('codigo', 'string', 10, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 10,
             ));
        $this->hasColumn('primer_nombre', 'string', 25, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('segundo_nombre', 'string', 25, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('primer_apellido', 'string', 25, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('segundo_apellido', 'string', 25, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('destino', 'string', 100, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 100,
             ));
        $this->hasColumn('inicio', 'string', 100, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 100,
             ));
        $this->hasColumn('comentarios', 'string', 200, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 200,
             ));
        $this->hasColumn('hora_pico', 'string', 25, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('empresa', 'integer', 4, array(
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
        $this->hasColumn('update_at', 'timestamp', 25, array(
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
        $this->hasOne('Empresa', array(
             'local' => 'empresa',
             'foreign' => 'empresa'));

        $this->hasOne('Empresa as Empresa_2', array(
             'local' => 'id',
             'foreign' => 'empresa'));
    }
  
}