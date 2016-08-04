<?php use_helper('I18N', 'Date') ?>
<?php include_partial('piloto/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Lista de Pilotos', array(), 'messages') ?></h1>

  <?php include_partial('piloto/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('piloto/list_header', array('pager' => $pager)) ?>
  </div>


  <div id="sf_admin_content">
    <form action="<?php echo url_for('piloto_collection', array('action' => 'batch')) ?>" method="post">
    <?php include_partial('piloto/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
    <ul class="sf_admin_actions">
      <?php include_partial('piloto/list_batch_actions', array('helper' => $helper)) ?>
      <?php include_partial('piloto/list_actions', array('helper' => $helper)) ?>
    </ul>
    </form>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('piloto/list_footer', array('pager' => $pager)) ?>
  </div>
</div>
