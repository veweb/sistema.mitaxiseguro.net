<div id="contbody">
	<div id="unidadno">
	<h3 class="tabtit">Unidades no Reportadas  </h3>
	
	<table>
		<tr>
			<th>No.</th>
			<th>Id</th>
			<th>Codigo</th>
			<th>Ultima comunicacion</th>
			<th>Tiempo sin Comunicacion</th>
		</tr>
		<?php $no = 1; ?>
		
		<?php foreach($unidades as $unidad): ?>
			<?php
		    $dteStart = new DateTime($unidad->getUpdatedAt()); 
            $dteEnd   = new DateTime(date("Y-m-d H:i:s",(strtotime ("0 hours")) ));
			$dteDiff  = $dteStart->diff($dteEnd); 
			$diferencia = $dteDiff->format("%H:%I:%S");
			$dias = $dteDiff->format('%R%a días');
			$tiempo = explode(':', $diferencia);
		     
		 ?>
		 --------
		 <?php echo (int)strval($tiempo[1]) ?>-->
		 <?php echo (int)strval($tiempo[0])?><br>
		  <?php if((strval($tiempo[1]) > 0) and (strval($tiempo[0]) >= 0)): ?>	
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $unidad->getId(); ?></td>
				<td><?php echo $unidad->getCodigo(); ?></td>
				<td><?php echo $unidad->getUpdatedAt(); ?></td>
				<td><?php echo $dias." , ".$diferencia; ?></td>
			</tr>
        <?php $no++; ?>
        <?php endif; ?> 
 		<?php endforeach; ?>	
	</table>




</div>
