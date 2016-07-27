<div id="contbody">
	<div id="reservaciones">
	<h3 class="tabtit">Detalle para completar Reservacion</h3>

<form action="<?php echo url_for('reservacion/activar') ?>" method="post">
	<table>
	<tr>
		<td style="width: 30%"><input type="hidden" name="idcliente" id="idcliente" value="<?php echo $id; ?>">
	        <label >Nombre Cliente: </label></td>
	        <td style="width: 70% text-aling:left"><input type="text" value="<?php echo $cliente; ?> " name="cliente">
	    </td>
	<tr><td style="width: 30% text-aling:left"><label >Descripcion: </label></td><td style="width: 70% text-aling:left"> <textarea name="detalleServicio" id="detalleServicio">
		
	</textarea></td>
	</tr>
	<tr>
	<td></td>
	<td>	
	<input type="submit" value="Actualizar Servicio" />
	</td></tr></table>
</form>
<a href="<?php echo url_for('reservacion/index'); ?>">Regresar</a>
</div>
