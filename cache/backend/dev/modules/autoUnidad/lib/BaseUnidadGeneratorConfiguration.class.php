<?php

/**
 * unidad module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage unidad
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: configuration.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseUnidadGeneratorConfiguration extends sfModelGeneratorConfiguration
{
  public function getActionsDefault()
  {
    return array();
  }

  public function getFormActions()
  {
    return array(  '_delete' => NULL,  '_list' => NULL,  '_save' => NULL,  '_save_and_add' => NULL,);
  }

  public function getNewActions()
  {
    return array();
  }

  public function getEditActions()
  {
    return array();
  }

  public function getListObjectActions()
  {
    return array(  '_edit' => NULL,  '_delete' => NULL,);
  }

  public function getListActions()
  {
    return array(  '_new' => NULL,);
  }

  public function getListBatchActions()
  {
    return array(  '_delete' => NULL,);
  }

  public function getListParams()
  {
    return '%%id%% - %%id_device%% - %%codigo%% - %%id_marca%% - %%lat%% - %%longi%% - %%created_at%% - %%updated_at%% - %%tipo_id%% - %%placa%% - %%anio_id%% - %%linea_id%% - %%estado%% - %%telefono%%';
  }

  public function getListLayout()
  {
    return 'tabular';
  }

  public function getListTitle()
  {
    return 'Lista de Unidades';
  }

  public function getEditTitle()
  {
    return 'Modificacion de unidad';
  }

  public function getNewTitle()
  {
    return 'Agregar nueva unidad';
  }

  public function getFilterDisplay()
  {
    return array();
  }

  public function getFormDisplay()
  {
    return array();
  }

  public function getEditDisplay()
  {
    return array();
  }

  public function getNewDisplay()
  {
    return array();
  }

  public function getListDisplay()
  {
    return array(  0 => 'id',  1 => 'id_device',  2 => 'codigo',  4 => 'lat',  5 => 'longi',  7 => 'updated_at',  12 => 'estado',);
  }

  public function getFieldsDefault()
  {
    return array(
      'id' => array(  'is_link' => true,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'id_device' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'codigo' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'id_marca' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',),
      'lat' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'longi' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'created_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'updated_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'tipo_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',),
      'placa' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'anio_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',),
      'linea_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',),
      'estado' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'telefono' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
    );
  }

  public function getFieldsList()
  {
    return array(
      'id' => array(),
      'id_device' => array(),
      'codigo' => array(),
      'id_marca' => array(),
      'lat' => array(),
      'longi' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'tipo_id' => array(),
      'placa' => array(),
      'anio_id' => array(),
      'linea_id' => array(),
      'estado' => array(),
      'telefono' => array(),
    );
  }

  public function getFieldsFilter()
  {
    return array(
      'id' => array(),
      'id_device' => array(),
      'codigo' => array(),
      'id_marca' => array(),
      'lat' => array(),
      'longi' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'tipo_id' => array(),
      'placa' => array(),
      'anio_id' => array(),
      'linea_id' => array(),
      'estado' => array(),
      'telefono' => array(),
    );
  }

  public function getFieldsForm()
  {
    return array(
      'id' => array(),
      'id_device' => array(),
      'codigo' => array(),
      'id_marca' => array(),
      'lat' => array(),
      'longi' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'tipo_id' => array(),
      'placa' => array(),
      'anio_id' => array(),
      'linea_id' => array(),
      'estado' => array(),
      'telefono' => array(),
    );
  }

  public function getFieldsEdit()
  {
    return array(
      'id' => array(),
      'id_device' => array(),
      'codigo' => array(),
      'id_marca' => array(),
      'lat' => array(),
      'longi' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'tipo_id' => array(),
      'placa' => array(),
      'anio_id' => array(),
      'linea_id' => array(),
      'estado' => array(),
      'telefono' => array(),
    );
  }

  public function getFieldsNew()
  {
    return array(
      'id' => array(),
      'id_device' => array(),
      'codigo' => array(),
      'id_marca' => array(),
      'lat' => array(),
      'longi' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'tipo_id' => array(),
      'placa' => array(),
      'anio_id' => array(),
      'linea_id' => array(),
      'estado' => array(),
      'telefono' => array(),
    );
  }


  /**
   * Gets the form class name.
   *
   * @return string The form class name
   */
  public function getFormClass()
  {
    return 'unidadForm';
  }

  public function hasFilterForm()
  {
    return false;
  }

  /**
   * Gets the filter form class name
   *
   * @return string The filter form class name associated with this generator
   */
  public function getFilterFormClass()
  {
    return 'unidadFormFilter';
  }

  public function getPagerClass()
  {
    return 'sfDoctrinePager';
  }

  public function getPagerMaxPerPage()
  {
    return 20;
  }

  public function getDefaultSort()
  {
    return array(null, null);
  }

  public function getTableMethod()
  {
    return '';
  }

  public function getTableCountMethod()
  {
    return '';
  }
}
