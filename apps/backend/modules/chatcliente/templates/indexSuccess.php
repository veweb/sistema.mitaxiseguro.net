 <div id="container">

    <div id="contbody">
   


<div id="unidades">
					<h3 class="tabtit">CLIENTES EN ESPERA DE CHAT</h3>
					<table>
						<tr>
							<td colspan="2" id="unidad">No.</td>
							<td id="chofer">CLIENTE</td>
							<td id="placa">FECHA</td>
							<td id="celular">ACCIONES</td>
						</tr>
						<?php $i=1; ?>
						<?PHP foreach ($user as $cliente): ?>
												
						<tr>
							
							<td><?php echo $i++?></td>
							<td><?php echo $cliente->getUserId(); ?></td>
							<td><?php echo $cliente->getCreatedAt(); ?></td>
							<td><a href="<?php echo url_for('salonoperador/index')?>"><?php echo ""; ?>Ira a Chat</a></td>
						</tr>

					<?php endforeach; ?>
						
					</table>
</div>
 </div>
  </div>