<div id="titulo-unidad"><h3>Mensajeria</h3></div>
<div id="listapilotos">
	<ul>
     <?php foreach($msj as $m):?>
           <a href="<?php echo url_for('mensajeria/mensajes')."/idunidad/".$m->getIdDevice(); ?>">   <li>	
                <?php echo $m->getCodigo(); ?> / <?php //echo $m->obtenerpiloto($m->getId()); ?>
             </li>	</a>
     <?php endforeach; ?>
     </ul>	
</div>
<audio id="player" src="<?php echo image_path('../alertas/000870921_prev.mp3'); ?>"> </audio>