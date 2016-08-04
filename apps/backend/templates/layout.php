<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
  	
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
  <!--  <script src="http://code.jquery.com/jquery-1.9.0.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.0.0.js"></script> -->
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
 <!--   
   <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>-->
<link href='http://fonts.googleapis.com/css?family=Signika+Negative:300,400,700' rel='stylesheet' type='text/css'>
  
  

  </head>
  <body>
    
    <div id="header">
    <div id="headlogo"> </div>
    <a href="<?php echo url_for('@sf_guard_signout')?>"><div id="logout">
      <h4><span>x</span>Salir</h4>
    </div></a>
    <h1 id="headtit"> 
      TAXI 
      <span>SEGURO</span>
    </h1>
  </div>
  <div id="contmenu">
    <div id="menu">
      <ul id="menubtns">
        <li><a href="<?php echo url_for('@homepage')?>">Inicio</a></li>
        <?php if( $sf_user->getGuardUser()->hasPermission('admin')): ?>
        <li><a href="#">Accesos</a>
        	<ul>
        		<li><a href="<?php echo url_for('sfGuardUser/index')?>">Usuarios</a></li>
            </ul>
        </li>
        <?php endif; ?>
       
        <li><a href="#">Operaciones</a>
        	<ul> 
        		<li><a href="<?php echo url_for('@tarifa')?>">Tarifas</a>
        		<li><a href="<?php echo url_for('@asignacion_unidad_piloto')?>">Asignacion </a></li>
        	<!--	<li><a href="<?php //echo url_for('@cliente')?>">Clientes</a></li>-->
      		    <li><a href="<?php echo url_for('@unidad')?>">Unidades</a></li>
      		    <li><a href="<?php echo url_for('@piloto')?>">Pilotos</a></li>
        		 
        	 </ul> 
        </li>

         <li><a href="#">Clientes</a>
          <ul> 
            <li><a href="<?php echo url_for('empresa/index')?>">Empresa</a>
            <li><a href="<?php echo url_for('ruta_corporativa/index')?>">Ruta Corporativa</a></li>
            <li><a href="<?php echo url_for('hora_pico/index')?>">Hora Pico</a></li>
             
           </ul> 
        </li>
        
        <li><a href="<?php echo url_for('mensajeria/index')?>">Mensajes</a></li>
        <li><a href="#">Reportes</a> 
        	<ul> 
        		 <?php if( $sf_user->getGuardUser()->hasPermission('admin')): ?>
        		<li><a href="<?php echo url_for('rptServicio/index')?>">Servicio</a></li>
        		<?php endif; ?>
        		<li><a href="<?php echo url_for('@noreportadas')?>">No Reportadas (UND)</a></li> 
        		 
        	 </ul> 
       </li>
      <!-- <li><a href="<?php// echo url_for('@reservacion')?>">Reservaciones </a></li>-->
      <!--  <li><a href="<?php /*echo url_for('dashboarddev/index')*/?>">Prueba </a></li>->
      </ul>
      <!--
      <div id="menusocial">
        <a href=""><div id="blog"> </div></a>
        <a href=""><div id="tweet"> </div></a>
        <a href=""><div id="face"> </div></a>
      </div>
      -->
    </div>
  </div>
  <?php echo $sf_content ?>
 
  <div id="foot"> </div>
  </body>
</html>
