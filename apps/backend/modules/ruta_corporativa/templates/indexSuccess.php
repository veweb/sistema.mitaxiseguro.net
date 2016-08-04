<div class="container_modulo">
<H3 class="tabtit">AGREGAR RUTA CORPORATIVA</H3>



<form action="<?php echo url_for('ruta_corporativa/guardar') ?>" method="POST">
	<div class="container_24">
		<div class="grid_8">
			<?php echo $f['codigo']->renderLabel() ?>:<br>
			<?php echo $f['codigo']->renderError() ?><br>
			<?php echo $f['codigo'] ?><br>
		</div>
		<div class="grid_8">
			<?php echo $f['empresa_id']->renderLabel() ?>:<br>
			<?php echo $f['empresa_id']->renderError() ?><br>
			<?php echo $f['empresa_id'] ?><br>
		</div>
		<div class="grid_8">
			<?php echo $f['sucursal_id']->renderLabel() ?>:<br>
			<?php echo $f['sucursal_id']->renderError() ?><br>
			<?php echo $f['sucursal_id'] ?><br>
		</div>
		<div class="grid_8">
			<?php echo $f['trafico']->renderLabel() ?>:<br>
			<?php echo $f['trafico']->renderError() ?><br>
			<?php echo $f['trafico'] ?><br>
		</div>
		<div class="grid_8">
			<?php echo $f['distancia']->renderLabel() ?>(KM):<br>
			<?php echo $f['distancia']->renderError() ?><br>
			<?php echo $f['distancia'] ?><br>
		</div>
		<div class="clear"></div>
		<div class="grid_730">
		
		</div>
		<div class="grid_110">
			<input type="button" id="calcular" value="CALCULAR"  />
		</div>	
		<div class="clear"></div>
	
		<div class="grid_8">
			<?php echo $f['tarifa_piloto']->renderLabel() ?>:<br>
			<?php echo $f['tarifa_piloto']->renderError() ?><br>
			<?php echo $f['tarifa_piloto'] ?><br>
		</div>	
		<div class="grid_8">
			<?php echo $f['tarifa_empresa']->renderLabel() ?>:<br>
			<?php echo $f['tarifa_empresa']->renderError() ?><br>
			<?php echo $f['tarifa_empresa'] ?><br>
		</div>	
		<div class="clear"></div>
		<div class="grid_8">
			<?php echo $f['nombres1']->renderLabel() ?>:<br>
			<?php echo $f['nombres1']->renderError() ?><br>
			<?php echo $f['nombres1'] ?><br>
		</div>
		<div class="grid_8">
			<?php echo $f['destino1']->renderLabel() ?>:<br>
			<?php echo $f['destino1']->renderError() ?><br>
			<?php echo $f['destino1'] ?><br>
		</div>
		<div class="grid_8">
			<?php echo $f['zona1']->renderLabel() ?>:<br>
			<?php echo $f['zona1']->renderError() ?><br>
			<?php echo $f['zona1'] ?><br>
		</div>
		<div class="clear"></div>
		<div class="grid_8">
			<?php echo $f['nombres2']->renderLabel() ?>:<br>
			<?php echo $f['nombres2']->renderError() ?><br>
			<?php echo $f['nombres2'] ?><br>
		</div>	
		<div class="grid_8">
			<?php echo $f['destino2']->renderLabel() ?>:<br>
			<?php echo $f['destino2']->renderError() ?><br>
			<?php echo $f['destino2'] ?><br>
		</div>
		<div class="grid_8">
			<?php echo $f['zona2']->renderLabel() ?>:<br>
			<?php echo $f['zona2']->renderError() ?><br>
			<?php echo $f['zona2'] ?><br>
		</div>
		<div class="clear"></div>
		<div class="grid_8">
			<?php echo $f['nombres3']->renderLabel() ?>:<br>
			<?php echo $f['nombres3']->renderError() ?><br>
			<?php echo $f['nombres3'] ?><br>
		</div>
		<div class="grid_8">
			<?php echo $f['destino3']->renderLabel() ?>:<br>
			<?php echo $f['destino3']->renderError() ?><br>
			<?php echo $f['destino3'] ?><br>
		</div>
		<div class="grid_8">
			<?php echo $f['zona3']->renderLabel() ?>:<br>
			<?php echo $f['zona3']->renderError() ?><br>
			<?php echo $f['zona3'] ?><br>
		</div>
		<div class="clear"></div>
		<div class="grid_8">
			<?php echo $f['nombres4']->renderLabel() ?>:<br>
			<?php echo $f['nombres4']->renderError() ?><br>
			<?php echo $f['nombres4'] ?><br>
		</div>
	

		<div class="grid_8">	
			<?php echo $f['destino4']->renderLabel() ?>:<br>
			<?php echo $f['destino4']->renderError() ?><br>
			<?php echo $f['destino4'] ?><br>
		</div>
		<div class="grid_8">
			<?php echo $f['zona4']->renderLabel() ?>:<br>
			<?php echo $f['zona4']->renderError() ?><br>
			<?php echo $f['zona4'] ?><br>
		 	<input type="submit" value="Guardar ruta" />
		</div>	
	
</div>	

 
      




</form>
</div>

<script type="text/javascript">

	$(document).ready(function(){
		$("#calcular").click(function(){
			var distancia = $("#ruta_corporativa_distancia").val()
			var valor = 0;
			correlativo = "<?php echo $correlativo; ?>"
			var tarifa = 0;
			var tipo = "";
			var porcentaje = "<?php echo $porcentaje[0]->getPorcentaje(); ?>"
			descuento = parseFloat(distancia) * parseFloat(porcentaje) ;
			precio = parseFloat(distancia * 4.8);
			valor = precio - descuento ;
			
		
			$("#ruta_corporativa_tarifa_piloto").val(Math.round(valor));
			$("#ruta_corporativa_tarifa_empresa").val(precio);
			var codigo = "UME"+correlativo+"-"+Math.round(valor);
			$("#ruta_corporativa_codigo").val(codigo);


		});
					
	});
</script>