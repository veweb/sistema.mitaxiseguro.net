<?php use_helper('I18N', 'Date') ?>
<?php include_partial('asignacion/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Agregar nueva asigancion', array(), 'messages') ?></h1>

  <?php include_partial('asignacion/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('asignacion/form_header', array('asignacion_unidad_piloto' => $asignacion_unidad_piloto, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('asignacion/form', array('asignacion_unidad_piloto' => $asignacion_unidad_piloto, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('asignacion/form_footer', array('asignacion_unidad_piloto' => $asignacion_unidad_piloto, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
