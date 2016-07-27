<?php

/**
 * dashboard actions.
 *
 * @package    sistem-taxi
 * @subpackage dashboard
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class dashboardActions extends sfActions
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
	$puntoA = $request->getParameter('puntoA'); 
	$this->puntoB = $request->getParameter('puntoB'); 
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

  public function executeMensaje(sfWebRequest $request){
    
  	
	$this->unidades = $request->getParameter('unidad');
	$this->tarifas = $request->getParameter('tarifa');
	$this->cliente = $request->getParameter('cliente');
	
	$unidades = $request->getParameter('unidad');
	$tarifas = $request->getParameter('tarifa');
	$cliente = $request->getParameter('cliente');
	
	$mensajes=Doctrine::getTable('EnvioUnidad')->findById(1);
	
	$this->servicios=Doctrine::getTable('Servicio')->findAll();
	
	$total = count($unidades);

    if($total > 0){
			
	   $idservicio = Doctrine::getTable('Servicio')->enviarMensajeUnidades(0,$tarifas[0],$cliente[0],$cliente[1],$cliente[2],$cliente[3],$cliente[4]);
		
		// $unidades[0]." ".$idservicio." ".date("Y-m-d H:i:s", (strtotime ("-2 Hours")))."";
		//exit;
	
 	   for($i=0;$total>$i;$i++) {
		   	
	       $mensajes[0]->mensajeUnidades($unidades[$i],$idservicio);
	      }
	
	}// fin si el toral es mayor que 0
	else{
		
		$this->redirect('@homepage');
		
	}
	
  }
  
  public function executeBuscataxi(sWebRequest $request){
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
		
		$this->redirect('@homepage');
		
	}
	
  }	
}
