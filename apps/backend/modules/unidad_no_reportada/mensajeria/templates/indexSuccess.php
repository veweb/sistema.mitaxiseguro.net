<div id="titulo-unidad"><h3>Mensajeria</h3></div>
<div id="listapilotos">
	<ul>
     <?php foreach($msj as $m):?>
           <a href="<?php echo url_for('mensajeria/mensajes')."/idunidad/".$m->getIdDevice(); ?>">   <li>	
                <?php echo $m->getCodigo(); ?> / <?php $m->obtenerpiloto($m->getId()); ?>
             </li>	</a>
     <?php endforeach; ?>
     </ul>	
</div>
