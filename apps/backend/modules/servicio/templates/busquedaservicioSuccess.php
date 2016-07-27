<div id="container">
	 <div id="contbody">
<h2>Consultas de Servicios</h2>

<div>
	<form id="datos" action="<?php echo url_for('servicio/busquedaservicio'); ?>" method="post">
		<label for="servicioid">#Servicio</label><input name="servicioid" type="text" />
		<select id="estado" name="estado">
			<option value="-1">Seleccione estado del servicio</option>
			<option value="0">En Espera</option>
			<option value="1">Asignados</option>
			<option value="4">Eliminados</option>
		</select>
		<!-- <label for"fechaini" >Fecha inicial: </label><input type="text" id="fechaini"><label for"fechafin">Fecha final: </label><input type="text" id="fechafin"> 
		--><input  type="submit" value="Buscar" />
		
	</form>
</div>
<div id="servicios">
	<?php if($servicios != null): ?>
	<?php 	echo "Numero de resultados: ".count($servicios); ?>
	<?php endif; ?>	
	<table>
	<tr>
		<th># Servicio </th>
		<th>Cliente</th>
		<th>Estado</th>
		<th>Fecha </th>
	
	</tr>
<?php if($servicios != null): ?>	
<?php foreach ($servicios as $servicio) : ?>
	  <tr>
	  <td><?php echo $servicio->getId(); ?></td>
	  <td><?php echo $servicio->getClientName(); ?></td>
	  <td> 
	  	  <?php if($servicio->getEstado()==0): ?>Espera <?php endif; ?>
	  	  <?php if($servicio->getEstado()==1): ?>Asignado <?php endif; ?>
	  	  <?php if($servicio->getEstado()==4): ?>Eliminado <?php endif; ?>
	  </td>
	  <td><?php echo $servicio->getCreatedAt(); ?> </td>
	  <td> <a href="index?id=<?php echo $servicio->getId(); ?> ">Ver detalle</a></td>
	  
	  </tr>
<?php endforeach; ?>
<?php endif; ?>	
</table>
	
</div>
<script>
   $(document).ready(function(){
    $("#fechaini").datepicker();
    $("#fechafin").datepicker();
  });
  </script>
 </div>
</div>  