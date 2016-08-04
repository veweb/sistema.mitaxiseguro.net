<td class="sf_admin_text sf_admin_list_td_id">
  <?php echo link_to($unidad->getId(), 'unidad_edit', $unidad) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_id_device">
  <?php echo $unidad->getIdDevice() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_codigo">
  <?php echo $unidad->getCodigo() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_lat">
  <?php echo $unidad->getLat() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_longi">
  <?php echo $unidad->getLongi() ?>
</td>
<td class="sf_admin_date sf_admin_list_td_updated_at">
  <?php echo false !== strtotime($unidad->getUpdatedAt()) ? format_date($unidad->getUpdatedAt(), "f") : '&nbsp;' ?>
</td>
<td class="sf_admin_text sf_admin_list_td_estado">
  <?php echo $unidad->getEstado() ?>
</td>
