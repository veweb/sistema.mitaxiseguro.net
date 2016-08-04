<?php

/**
 * piloto module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage piloto
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: configuration.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BasePilotoGeneratorConfiguration extends sfModelGeneratorConfiguration
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
    return '%%id%% - %%first_name%% - %%last_name%% - %%phone%% - %%direccion%% - %%email%% - %%licencia%% - %%dpi%% - %%cedula%% - %%fecha_nacimiento%% - %%created_at%% - %%updated_at%% - %%created_by%%';
  }

  public function getListLayout()
  {
    return 'tabular';
  }

  public function getListTitle()
  {
    return 'Lista de Pilotos';
  }

  public function getEditTitle()
  {
    return 'Modificar Piloto';
  }

  public function getNewTitle()
  {
    return 'Nuevo Piloto';
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
    return array(  0 => 'id',  1 => 'first_name',  2 => 'last_name',  3 => 'phone',  4 => 'direccion',  9 => 'fecha_nacimiento',);
  }

  public function getFieldsDefault()
  {
    return array(
      'id' => array(  'is_link' => true,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'first_name' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'last_name' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'phone' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'direccion' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'email' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'licencia' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'dpi' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'cedula' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'fecha_nacimiento' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'created_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'updated_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'created_by' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
    );
  }

  public function getFieldsList()
  {
    return array(
      'id' => array(),
      'first_name' => array(),
      'last_name' => array(),
      'phone' => array(),
      'direccion' => array(),
      'email' => array(),
      'licencia' => array(),
      'dpi' => array(),
      'cedula' => array(),
      'fecha_nacimiento' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'created_by' => array(),
    );
  }

  public function getFieldsFilter()
  {
    return array(
      'id' => array(),
      'first_name' => array(),
      'last_name' => array(),
      'phone' => array(),
      'direccion' => array(),
      'email' => array(),
      'licencia' => array(),
      'dpi' => array(),
      'cedula' => array(),
      'fecha_nacimiento' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'created_by' => array(),
    );
  }

  public function getFieldsForm()
  {
    return array(
      'id' => array(),
      'first_name' => array(),
      'last_name' => array(),
      'phone' => array(),
      'direccion' => array(),
      'email' => array(),
      'licencia' => array(),
      'dpi' => array(),
      'cedula' => array(),
      'fecha_nacimiento' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'created_by' => array(),
    );
  }

  public function getFieldsEdit()
  {
    return array(
      'id' => array(),
      'first_name' => array(),
      'last_name' => array(),
      'phone' => array(),
      'direccion' => array(),
      'email' => array(),
      'licencia' => array(),
      'dpi' => array(),
      'cedula' => array(),
      'fecha_nacimiento' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'created_by' => array(),
    );
  }

  public function getFieldsNew()
  {
    return array(
      'id' => array(),
      'first_name' => array(),
      'last_name' => array(),
      'phone' => array(),
      'direccion' => array(),
      'email' => array(),
      'licencia' => array(),
      'dpi' => array(),
      'cedula' => array(),
      'fecha_nacimiento' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'created_by' => array(),
    );
  }


  /**
   * Gets the form class name.
   *
   * @return string The form class name
   */
  public function getFormClass()
  {
    return 'pilotoForm';
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
    return 'pilotoFormFilter';
  }

  public function getPagerClass()
  {
    return 'sfDoctrinePager';
  }

  public function getPagerMaxPerPage()
  {
    return 10;
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
