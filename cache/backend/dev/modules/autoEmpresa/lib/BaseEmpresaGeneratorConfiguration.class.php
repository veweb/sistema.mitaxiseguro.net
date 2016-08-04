<?php

/**
 * empresa module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage empresa
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: configuration.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseEmpresaGeneratorConfiguration extends sfModelGeneratorConfiguration
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
    return '%%id%% - %%nombre%% - %%direccion%% - %%telefono%% - %%email%% - %%contacto%% - %%created_at%% - %%updated_at%% - %%codigo%%';
  }

  public function getListLayout()
  {
    return 'tabular';
  }

  public function getListTitle()
  {
    return 'Empresa List';
  }

  public function getEditTitle()
  {
    return 'Edit Empresa';
  }

  public function getNewTitle()
  {
    return 'New Empresa';
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
    return array(  0 => 'id',  1 => 'nombre',  2 => 'direccion',  3 => 'telefono',  4 => 'email',  5 => 'contacto',  6 => 'created_at',  7 => 'updated_at',  8 => 'codigo',);
  }

  public function getFieldsDefault()
  {
    return array(
      'id' => array(  'is_link' => true,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'nombre' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'direccion' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'telefono' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'email' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'contacto' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'created_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'updated_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'codigo' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
    );
  }

  public function getFieldsList()
  {
    return array(
      'id' => array(),
      'nombre' => array(),
      'direccion' => array(),
      'telefono' => array(),
      'email' => array(),
      'contacto' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'codigo' => array(),
    );
  }

  public function getFieldsFilter()
  {
    return array(
      'id' => array(),
      'nombre' => array(),
      'direccion' => array(),
      'telefono' => array(),
      'email' => array(),
      'contacto' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'codigo' => array(),
    );
  }

  public function getFieldsForm()
  {
    return array(
      'id' => array(),
      'nombre' => array(),
      'direccion' => array(),
      'telefono' => array(),
      'email' => array(),
      'contacto' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'codigo' => array(),
    );
  }

  public function getFieldsEdit()
  {
    return array(
      'id' => array(),
      'nombre' => array(),
      'direccion' => array(),
      'telefono' => array(),
      'email' => array(),
      'contacto' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'codigo' => array(),
    );
  }

  public function getFieldsNew()
  {
    return array(
      'id' => array(),
      'nombre' => array(),
      'direccion' => array(),
      'telefono' => array(),
      'email' => array(),
      'contacto' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'codigo' => array(),
    );
  }


  /**
   * Gets the form class name.
   *
   * @return string The form class name
   */
  public function getFormClass()
  {
    return 'empresaForm';
  }

  public function hasFilterForm()
  {
    return true;
  }

  /**
   * Gets the filter form class name
   *
   * @return string The filter form class name associated with this generator
   */
  public function getFilterFormClass()
  {
    return 'empresaFormFilter';
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
