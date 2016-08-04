<td class="sf_admin_text sf_admin_list_td_id">
  <?php echo link_to($asignacion_unidad_piloto->getId(), 'asignacion_unidad_piloto_edit', $asignacion_unidad_piloto) ?>
</td>
<td class="sf_admin_foreignkey sf_admin_list_td_id_piloto">
  <?php echo $asignacion_unidad_piloto->getIdPiloto() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_descripcion">
  <?php echo $asignacion_unidad_piloto->getDescripcion() ?>
</td>
<td class="sf_admin_foreignkey sf_admin_list_td_unidad_id">
  <?php echo $asignacion_unidad_piloto->getUnidadId() ?>
</td>
