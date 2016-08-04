<?php

/**
 * dashboard actions.
 *
 * @package    sistem-taxi
 * @subpackage dashboard
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class dashboarddevActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
   
  	$this->unidades = Doctrine::getTable('asignacionUnidadPiloto')->findAll();
  	$this->tarifas = Doctrine::getTable('Tarifa')->findAll();
  	$this->townsid = $request->getParameter('townsId');
	$this->states = Doctrine::getTable('MapsStates')->findAll();
	$this->towns = Doctrine::getTable('MapsTowns')->OrdenarAscendente();
	$this->marker = Doctrine::getTable('Unidad')->findAll();
	$this->tipoclientes = Doctrine::getTable('categoriaCliente')->findAll();
	$this->empresas = Doctrine::getTable('empresa')->findAll();
	$puntoA = $request->getParameter('puntoA'); 
	$this->puntoB = $request->getParameter('puntoB');
	$this->puntoC = $request->getParameter('puntoC');
	$this->puntoD = $request->getParameter('puntoD'); 
	$direccion =$request->getParameter('direccion');
	$this->direccion = $direccion;
	$this->direccionB = $request->getParameter('direccionB');
	$comentarios =$request->getParameter('comentarios');
	$this->cname = $request->getParameter('Cname');
	$this->cphone = $request->getParameter('cphone');
	$this->descripcion = $request->getParameter('descripcion');
	$this->trafico = $request->getParameter('trafico');
	//$this->puntoRef = $request->getParameter('puntoRef);
	
	

	
	$this->servicios = Doctrine::getTable('Servicio')->createQuery()->where('estado =  ?',1)->limit(15)->orderBy('created_at DESC')->execute();
	$distancia = $request->getParameter('distancia');
	if(empty($distancia)){
		$this->distancia = 5;
		
	}
	else{
		$this->distancia = $request->getParameter('distancia');
	}
	

	if(empty($puntoA)){
		$this->refA =  "";
	}

    
	
	if(!empty($this->townsid))
      {
      	   $this->content = 'null';	
      	   $townsselect = Doctrine::getTable('MapsTowns')->findById($request->getParameter('townsId'));
	       $this->position = $townsselect[0]->getLocation(); 
		   
		   if($puntoA){
	       	  $refA = $puntoA;
			  $this->position = $refA;
	          $this->refA =  $refA;
		   }
		   else{
		   	$refA = $this->position;
			 $this->refA =  "";  
		   }
		   
		   $pos = explode(",",$refA);
		   $lat = $pos[0];
		   $lng = $pos[1];
		   // funcion que localiza las unidades mas cercanas en un radio x= 3 km y cantidad de unidades mostrar en este caso pondremos 10.
		   $this->markerUnidades = Doctrine::getTable('Unidad')->LocalizacionUnidades($lat,$lng,$this->distancia,10);
		   
		  
	
		  
	   }
	else {
		$this->content = 'null';
		//echo "--- >".$request->getParameter('stateId');
		//exit;
		if($request->getParameter('stateId')){
	   
	       $stateselect = Doctrine::getTable('MapsStates')->findById($request->getParameter('stateId'));
	       $this->position = $stateselect[0]->getLocation(); 
		   if($puntoA){
	       	  $refA = $puntoA;
			  $this->position = $refA;
	           $this->refA =  $refA;
		   }
		   else{
		   	$refA = $this->position;
			   $this->refA =  "";
		   }
		   
		   $pos = explode(",",$refA);
		   $lat = $pos[0];
		   $lng = $pos[1];
		   // funcion que localiza las unidades mas cercanas en un radio x= 3 km y cantidad de unidades mostrar en este caso pondremos 10.
		   $markerUnidades = Doctrine::getTable('Unidad')->LocalizacionUnidades($lat,$lng,$this->distancia,10);
	      }
	    else {
	    	
			 
	    	 
		     if($puntoA){
		     	 
		       	   // $refA = $puntoA//explode("(",$puntoA);
					//$refAs = //explode(")",$refA;
					$this->content = 'null';
				    $this->position = $puntoA;
		            $this->refA =  $puntoA; 
					$pos = explode(",",$puntoA);
			        $lat = $pos[0];
			        $lng = $pos[1]; 
					
					//echo $lat." ".$lng;
					//exit;
		       }
		     else{
		     	$this->content = 'null';
		        $this->position = "14.6242342, -90.5315266";
		   
		   	    $refA = $this->position;
			    $this->refA =  ""; 
			    $pos = explode(",",$refA);
		        $lat = $pos[0];
		        $lng = $pos[1]; 
		     }
		   
		   
		    //echo $lat." --> ".$lng;
		  // exit;
		   // funcion que localiza las unidades mas cercanas en un radio x= 3 km y cantidad de unidades mostrar en este caso pondremos 10.
		      $this->markerUnidades = Doctrine::getTable('Unidad')->LocalizacionUnidades($lat,$lng,$this->distancia,10);
		    //print_r($this->markerUnidades);
				  
				  
		}
	}	
	
	///print_r($this->markerUnidades);
	
     
  }

  public  function executeMensaje(sfWebRequest $request){
  
  	//exit;
	
	$unidades = $request->getParameter('unidad');
	$tarifas = $request->getParameter('tarifa');
	$cliente = $request->getParameter('cliente');
    
   var_dump($cliente);
    console.log(var_dump($unidades));
    console.log(var_dump($tarifas));
    console.log(var_dump($cliente));
   exit;
	
	//$mensajes=Doctrine::getTable('EnvioUnidad')->findAll();
	
	
	//$this->servicios=Doctrine::getTable('Servicio')->findAll();
	
	$total = count($unidades);

    if($total > 0){
		if($cliente[0] == "1"){	
	       $idservicio = Doctrine::getTable('Servicio')->enviarMensajeUnidades(0,$tarifas[0],$cliente[3],$cliente[4],$cliente[5],$cliente[6],$cliente[6]);
		
       		if($cliente[7] != ""){

	   		  Doctrine_Query::create()
			  ->update('empleadoEmpresa u')
			  ->set('u.primer_nombre','?',$cliente[3])
			  ->set('u.comentarios', '?', $cliente[7])
			  ->where('u.codigo = ?', $tarifas[0])
			  ->execute();
	        }  
       }   
		if($cliente[0] == "2")	
	       $idservicio = Doctrine::getTable('Servicio')->enviarMensajeUnidades(0,$tarifas[0],$cliente[3],$cliente[4],$cliente[5],$cliente[6],$cliente[7]);
		
		// $unidades[0]." ".$idservicio." ".date("Y-m-d H:i:s", (strtotime ("-2 Hours")))."";
		//exit;

	  

	
 	   for($i=0;$total>$i;$i++) {
		   	
	     //  Doctrine::getTable('EnvioUnidad')->mensajeUnidades($unidades[$i],$idservicio);

		/*		   
		$mensaje = new envioUnidad();
		
		$mensaje->setUnidadId($unidades[$i]);
		$mensaje->setServicioId($idservicio);
		$mensaje->setEstado(0);
		
		$mensaje->setUpdatedAt(date("Y-m-d H:i:s", (strtotime ("-2 Hours"))));
		$mensaje->setCreatedAt(date("Y-m-d H:i:s", (strtotime ("-2 Hours"))));
		$mensaje->setCreatedBy(2);
		$mensaje->setUpdatedBy(2);
		$mensaje->save();
		
/*/
			

			$con = mysql_connect("130.211.184.73","root","lQN76ptAq");
			if (!$con)
			  {
			  die('Could not connect: ' . mysql_error());
			  }
			 
			 mysql_select_db("dbo461977375", $con);
			 
			  $sql="INSERT INTO  envio_unidad(id, unidad_id,servicio_id,estado,created_at,updated_at,created_by,updated_by) VALUES(NULL,".$unidades[$i].",".$idservicio.",0,NOW(),NOW(),1,1)";
			   // echo $sql;
			     
			 
			     mysql_query($sql,$con);
			  
			
			 
			 
		    	mysql_close($con);
	   }   
	
	}// fin si el toral es mayor que 0
	else{
		
		//$this->redirect('dashboarddev/index');
		
	}
	
	
	
  }
  
  public function executeBuscataxi(sfWebRequest $request){
	$this->unidades = $request->getParameter('unidad');
	$this->tarifas = $request->getParameter('tarifa');
	$this->cliente = $request->getParameter('cliente');
	
	$unidades = $request->getParameter('unidad');
	$tarifas = $request->getParameter('tarifa');
	$cliente = $request->getParameter('cliente');
	echo "ingreso";
	exit;
	$mensajes=Doctrine::getTable('EnvioUnidad')->findAll();
	$this->servicios=Doctrine::getTable('Servicio')->findAll();
	
	$total = count($unidades);

    if($total > 0){
			
	   $idservicio = Doctrine::getTable('Servicio')->enviarMensajeUnidades(0,$tarifas[0],$cliente[0],$cliente[1],$cliente[2],$cliente[3],$cliente[4]);
		
		//echo $unidades[0]." ".$idservicio." ".date("Y-m-d H:i:s", (strtotime ("-2 Hours")))."";
		//exit;
	
 	   for($i=0;$total>$i;$i++) {
		   	
	       $mensajes[0]->mensajeUnidades($unidades[$i],$idservicio);
	      }
	
	}// fin si el toral es mayor que 0
	else{
		
		$this->redirect('dashboarddev/index');
		
	}
	
  }	

  public function executeColaborador(sfWebRequest $request){
  		$url = 'dashboarddev/llenaservicio';
        $empresa = $request->getParameter('empresa');
        $colaboradores = Doctrine::getTable('EmpleadoEmpresa')->findByEmpresa($empresa);
        echo "<table id=colaboradorselect>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Codigo</th>";
        echo "<th>Codido Servicio</th>";
        echo "<th>nombre</th>";
        echo "<th>Destino</th>";
        echo "<th>Seleccionar</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

     //   echo "<option value=0>-- Seleccione un codigo colaborador --</option>";
        foreach ($colaboradores as $colaborador) {
        //	echo "<option value='".$colaborador->getId()."'>".$colaborador->getPrimerNombre()." (".$colaborador->getCodigo().")/".$colaborador->getDestino()."</option>";
        	echo "<tr>";
        	echo "<td >".$colaborador->getId()."</td>";
        	echo "<td >".$colaborador->getCodigo()."</td>";
        	echo "<td >".$colaborador->getPrimerNombre()."</td>";
        	echo "<td >".$colaborador->getDestino()."</td>";
        	echo "<td><b class=togle>Seleccionar<input type=hidden value=".$colaborador->getId()."></b></td>";
        	echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";

        echo "<script>
             $(document).ready(function(){
                $('.togle').click(function(event){
                	var id = $( this ).find( 'input:hidden' ).val();
        		    console.info(id);
        		    $.ajax({
           		   			 method:'get',
            				 url:'".$url."',
            				 data:'id='+id,
            				 success:function(result){
                 					$('#datosc').html(result);
                 					$.fancybox.close();
            			     }
          					
					});
                
        		});
		
			});	

        </script>";

  }

    //  var id  =  $('.serviciocodigo option:selected').val();	
        		 /*	$.ajax({
           		   			 method:'get',
            				 url:'".$url."',
            				 data:'id='+id,
            				 success:function(result){
                 					$('#datosc').html(result);
            			     }
          					
					});*/

  public function executeLlenaservicio(sfWebRequest $request){
  		$id = $request->getParameter('id');
  		$servicios = Doctrine::getTable('empleadoEmpresa')->findById($id);
  		//conole.log(var_dump($servicios));

  		echo "<script>";
  		echo "$(document).ready(function(){";
  		echo " var nombre = '".$servicios[0]->getPrimerNombre()."';";
  		echo " var dir = '".$servicios[0]->getInicio()."';"; 
  		echo " var dira = '".$servicios[0]->getDestino()."';"; 
  		echo " var tarifa = '".$servicios[0]->getCodigo()."';"; 
  		echo " var comentarios = 'Codigo Servicio:".$servicios[0]->getCodigo()."  ".$servicios[0]->getComentarios()."';"; 
  		echo  "		
  					$('.cambiarnombre').text('Nombre Colaborador:');
  					$('#clienten').val(nombre);
  					$('#clientenom').show();
  					$('#clientendir').val(dir); 
		  			$('#clientedir').show();
		  			$('#clientendira').val(dira);
		  			$('#clientedira').show();
		  			$('#clientetel').show(); 
		  			$('#clientecom').show();
		  			$('#clientencom').val(comentarios);
		  			$('#tarifa').val(tarifa);
          });
  		      </script>";
  		
  		//  echo $servicios[0]->getPrimerNombre()."|".$servicios[0]->getInicio()."|".$servicios[0]->getDestino();

  }
}
