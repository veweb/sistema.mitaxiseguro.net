<h1>Lista de Servicios notificados (total: <?php count($total); ?>)</h1>
<table>
	<tr>
		<td># Servicio </td>
		<td>Fecha </td>
		<td>Ver detalle </td>
	</tr>
<?php foreach ($servicios as $servicio) : ?>
	  <tr>
	  <td><?php echo $servicio->getId(); ?></td><td> <?php echo $servicio->getCreatedAt(); ?> </td>
	   <td> <a href="index?id=<?php echo $servicio->getId(); ?> ">Ver detalle</a> <?php  if($servicio->getNotificacion() == 1): ?> | <a href="<?php echo url_for('servicio/verificado')."?id=".$servicios[0]->getId(); ?>">Verificado</a> <?php endif; ?></td>
	  
	  </tr>
<?php endforeach; ?>	
</table>