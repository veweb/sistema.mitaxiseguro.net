<td class="sf_admin_text sf_admin_list_td_id">
  <?php echo link_to($empresa->getId(), 'empresa_edit', $empresa) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_nombre">
  <?php echo $empresa->getNombre() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_direccion">
  <?php echo $empresa->getDireccion() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_telefono">
  <?php echo $empresa->getTelefono() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_email">
  <?php echo $empresa->getEmail() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_contacto">
  <?php echo $empresa->getContacto() ?>
</td>
<td class="sf_admin_date sf_admin_list_td_created_at">
  <?php echo false !== strtotime($empresa->getCreatedAt()) ? format_date($empresa->getCreatedAt(), "f") : '&nbsp;' ?>
</td>
<td class="sf_admin_date sf_admin_list_td_updated_at">
  <?php echo false !== strtotime($empresa->getUpdatedAt()) ? format_date($empresa->getUpdatedAt(), "f") : '&nbsp;' ?>
</td>
<td class="sf_admin_text sf_admin_list_td_codigo">
  <?php echo $empresa->getCodigo() ?>
</td>
