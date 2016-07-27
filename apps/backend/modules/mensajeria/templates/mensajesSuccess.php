<script type="text/javascript">

var callAjax = function(){
          $.ajax({
            method:'get',
            url:'http://sistema.mitaxiseguro.net/respuestaPiloto.php?id_user=<?php echo $usu; ?>',
            success:function(data){
                 $('#respuestaview').html(data);  
            }
          });
       }
        setInterval(callAjax,6000);        
</script>
<div id="mensajeria">
	<h1>Centro de comunicacion para unidad <?php echo "<b>".$unid."</b> " ?></h1>
<div id="contenedor">	
	<a href="<?php echo url_for('mensajeria/index') ?>" id="regresar">Regresar a Unidades</a>
<div id="preguntas">
<form action="<?php echo url_for('mensajeria/enviar') ?>" method="post">
	<select name="perguntas" id="preguntas">
		<option value="0">-- Seleccione una pregunta --</option>
		<?php foreach ($pred as $preg):  ?>
			<option value="<?php echo $preg->getId(); ?>"><?php echo $preg->getContendio(); ?></option>
		<?php endforeach; ?>	
	</select><br>
	<label>Formule su pregunta:</label><br>
	<textarea name="pregunta" id="pregunta" style="width: 600px;"></textarea><br>
	<label>Respuestas (Separarlas por comas ej: si,no,nose)</label><br>
	<textarea name="respuesta" id="respuesta" style="width: 600px;"></textarea>
	<br>
	<input type="hidden" name="id_device" value="<?php echo $unidad; ?>">
	
	<input type="checkbox" name="predeterminado" /> <label>Predeterminar Pregunta y respuesta?</label><br>
	<input type="submit"  id="enviar" value="Enviar" />
</form>
</div>

Preguntas de Usuario: <?php echo "<b>".$usuario."</b> " ?></b><Br>
<div id="preguntaview">
<?php if(!empty($men)): ?>	
<?php foreach($men as $m): ?>
<?php ?>	

<?php echo "[".$m->getFecha()."]"; ?><br>
<?php $m->obenerMensaje($m->getMensajeId()); ?><br>
<?php endforeach; ?>
<?php endif; ?>
</div>


Respuestas de Unidad <?php echo "<b>".$unid."</b> " ?></b><?php echo "<b>".$pilo[0]->obtenerpiloto($u)."</b> " ?><Br>
<div id="respuestaview">
<?php if(!empty($resp)): ?>	
<?php foreach($resp as $r): ?>
<?php echo "[".$r->getFecha()."]"; ?><br>
<?php echo $r->getRespuesta(); ?><br>
<?php endforeach; ?>
<?php endif; ?>
</div>
</div>
</div>