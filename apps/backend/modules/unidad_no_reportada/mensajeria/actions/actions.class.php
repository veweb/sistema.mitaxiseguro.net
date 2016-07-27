x<?php

/**
 * chatcliente actions.
 *
 * @package    sistem-taxi
 * @subpackage mensajeria
 * @author     Walter Rosales
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class mensajeriaActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->msj = Doctrine::getTable('Unidad')->findAll();
	
  }
  public function executeMensajes(sfWebRequest $request){
   $unidadid = $request->getParameter("idunidad");
   $this->unidad = $unidadid;
   $this->men = Doctrine::getTable('MensajeUnidadtablet')->findByIdDeviceAndIdUser($unidadid,$this->getUser()->getGuardUser()->getId());
   $this->resp = Doctrine::getTable('RespuestaTs')->findByUserIdAndType($this->getUser()->getGuardUser()->getId(),2);
   $this->usuario =  $this->getUser()->getGuardUser()->getFirstName()." ".$this->getUser()->getGuardUser()->getLastName();
   $this->pred = Doctrine::getTable('Mensaje')->findByPredeterminadaAndIdUsuario(1,$this->getUser()->getGuardUser()->getId());
   
	$uni = Doctrine::getTable('Unidad')->findByIdDevice($unidadid);
	$this->pilo = $uni;
	$this->unid = $uni[0]->getCodigo();
	$this->u = $uni[0]->getId();
	$mensaje = new mensaje();
  }
  public function executeEnviar($request){
  	
  	$pregunta= $request->getParameter('pregunta');
	$respuesta= $request->getParameter('respuesta');
	$predeterminado= $request->getParameter('predeterminado');
	$id_device = $request->getParameter('id_device');
	$mensaje = new mensaje();
	$mensaje->setContendio($pregunta);
	$mensaje->setTipo(1);
	if($predeterminado == 'on'){
	   $mensaje->setPredeterminada(1);	
	}
	$mensaje->setIdUsuario($this->getUser()->getGuardUser()->getId());
	$mensaje->save();
	$resp = new respuesta();
	$resp-> setMensajeId($mensaje->getId());
	$resp-> setRespuesta($respuesta);
	$resp-> setIdUser($this->getUser()->getGuardUser()->getId());
	$resp-> setType(1);
	$resp-> save();
	
	$inbox = new MensajeUnidadtablet();
	$inbox->setMensajeId($mensaje->getId());
	$inbox->setIdUser($this->getUser()->getGuardUser()->getId());
	$inbox->setIdDevice($id_device);
	$inbox->setFecha(date("Y-m-d H:i:s",(strtotime ("-6 Hours")) ));
	$inbox->save();
	$this->redirect('mensajeria/mensajes?idunidad='.$id_device);
  }
function executePregselect(sfWebRequest $request){
	$pregunta = Doctrine::getTable('Mensaje')->findById($request->getParameter('idpreg'));
	echo $pregunta[0]->getContendio();
	exit;
	$this->getResponse()->setContent($pregunta[0]->getContendio());
 
    return sfView::NONE;
	
	
}
function executeRespselect(sfWebRequest $request){
	$respuesta = Doctrine::getTable('Respuesta')->findByMensajeId($request->getParameter('idresp'));
	$this->getResponse()->setContent($respuesta[0]->getRespuesta());
 
    return sfView::NONE;
	
	
}
  
}
