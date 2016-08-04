<td class="sf_admin_text sf_admin_list_td_id">
  <?php echo link_to($piloto->getId(), 'piloto_edit', $piloto) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_first_name">
  <?php echo $piloto->getFirstName() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_last_name">
  <?php echo $piloto->getLastName() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_phone">
  <?php echo $piloto->getPhone() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_direccion">
  <?php echo $piloto->getDireccion() ?>
</td>
<td class="sf_admin_date sf_admin_list_td_fecha_nacimiento">
  <?php echo false !== strtotime($piloto->getFechaNacimiento()) ? format_date($piloto->getFechaNacimiento(), "f") : '&nbsp;' ?>
</td>
