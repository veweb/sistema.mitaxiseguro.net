<?php use_helper('I18N', 'Date') ?>
<?php include_partial('piloto/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Nuevo Piloto', array(), 'messages') ?></h1>

  <?php include_partial('piloto/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('piloto/form_header', array('piloto' => $piloto, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('piloto/form', array('piloto' => $piloto, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('piloto/form_footer', array('piloto' => $piloto, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
