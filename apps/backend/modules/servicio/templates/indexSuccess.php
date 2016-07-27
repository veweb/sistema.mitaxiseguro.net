<div id="contbody">
	<div id="servicios">
	<h3 class="tabtit">Servicio # <?php //echo $servicio; ?> </h3>

<table>
	<tr>
		<td>Cliente:</td>
		<td><?php echo utf8_decode($servicios[0]->getClientName()); ?></td>
	</tr>
	<tr>
		<td>Telefono:</td>
		<td><?php echo $servicios[0]->getClientPhone(); ?></td>
	</tr>
	<tr>
		<td>Origen:</td>
		<td><?php echo $servicios[0]->getClientOrigen(); ?></td>
	</tr>
	<tr>
		<td>Destino:</td>
		<td><?php echo $servicios[0]->getClientDestino(); ?></td>
	</tr>
	<tr>
		<td>Descripcion:</td>
		<td><?php echo $servicios[0]->getDescription(); ?></td>
	</tr>
	<tr>
		<td>Fecha Solicitud de Servicio:</td>
		<td><?php echo $servicios[0]->getCreatedAt(); ?></td>
	</tr>
	<tr>
		<td>Tarifa:</td>
		<td>Q. <?php echo $servicios[0]->getTarifaId(); ?></td>
	</tr>
	<tr>
		<td>Unidades:</td>
		<td width="200"><ul>
			
				
			<?php 
			
			 while ($row = mysql_fetch_assoc($unidades)) {
			 	 echo "<li><b>".$servicios[0]->obtenercodigounidad($row['unidad_id'])."</b>  "; 
                   if($row['Estado'] == 0 ) echo "No a respondido";
                   if($row['Estado'] == 1 ) echo "Tomo Servicio";
				   if($row['Estado'] == 2 ) echo "Rechazo Servicio";
				   if($row['Estado'] == 3 ) echo "Servicio en cola.";
           
			} ?>
		</ul></td>
	</tr>
	<tr>
		<td></td>
		<td><a href="<?php echo url_for('servicio/listservices')."?id=".$servicios[0]->getId(); ?>">Lista de Servicios</a> | <a href="<?php echo url_for('servicio/eliminar')."?id=".$servicios[0]->getId(); ?>">Eliminar Servicio</a> | <a href="<?php echo url_for('servicio/verificado')."?id=".$servicios[0]->getId(); ?>">Verificado</a></td>
	
		
	</tr>
</table>


</div>
