<div id="contbody">
	<div id="reservaciones">
	<h3 class="tabtit">Reservaciones </h3>
<table>
	<tr>
		<td>NO.</td>
		<td>Fecha</td>
		<td>Hora</td>
		<td>Cliente</td>
		<td>Telefono</td>
		<td>Email</td>
		<td>No. Pasajeros</td>
		<td>Destino</td>
		<td>Ubicacion</td>
		<td>Acciones</td>
	</tr>
<?php foreach($reservaciones as $reserva): ?>
	<tr>
	<td><?php echo $reserva->getId(); ?></td>
	<td><?php echo $reserva->getFechaServicio(); ?></td>
	<td><?php echo $reserva->getHora(); ?></td>
	<td><?php echo $reserva->getNombre(); ?></td>
	<td><?php echo $reserva->getCelular(); ?></td>
	<td><?php echo $reserva->getEmail(); ?></td>
	<td><?php echo $reserva->getNoPasajeros(); ?></td>
	<td><?php echo $reserva->getDireccionDestino(); ?></td>
	<td><?php echo $reserva->getDireccionOrigen(); ?></td>
	<td><a href="<?php echo url_for('reservacion/completarservicio/')."idreservacion/".$reserva->getId()."/cliente/".$reserva->getNombre(); ?>"  alt="Asignar Servicio">Completar Servicio</a></td>

	</tr>
<?php endforeach; ?>
</table>	

</div>