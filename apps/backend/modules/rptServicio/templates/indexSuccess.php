<table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Unidad</th>
                <th>Nombre Cliente</th>
                <th>Direccion Origen</th>
                <th>Direccion Destino</th>
                <th>Tarifa</th>
                <th>Fecha</th>
            </tr>
        </thead>
 
        <tfoot>
            <tr>
                <th>Unidad</th>
                <th>Nombre Cliente</th>
                <th>Direccion Origen</th>
                <th>Direccion Destino</th>
                <th>Tarifa</th>
                <th>Fecha</th>
            </tr>
        </tfoot>
 
        <tbody>
           <?php foreach ($servicios as $servicio): ?>
           	<?php $codigo = Doctrine::getTable('Unidad')->findById($servicio->getUnidadId()); ?>
			<tr>
				<td><?php echo $codigo[0]->getCodigo(); ?></td>
				<td><?php echo $servicio->getClientName(); ?></td>
				<td><?php echo $servicio->getClientOrigen(); ?></td>
				<td><?php echo $servicio->getClientDestino(); ?></td>
				<td><?php echo $servicio->getTarifaId(); ?></td>
				<td><?php echo $servicio->getCreatedAt(); ?></td>
			</tr>
	<?php endforeach; ?> 		
        </tbody>
    </table>
<script type='text/javascript' src='js/jquery-1.11.1.mins.js'></script> 
<script type='text/javascript'>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>