<?php

/**
 * dashboard actions.
 *
 * @package    sistem-taxi
 * @subpackage servicio
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class servicioActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
   
  	$this->servicio = $request->getParameter('id');
	$this->servicios = Doctrine::getTable('servicio')->findById($request->getParameter('id'));

	$con = mysql_connect("130.211.184.73","root","lQN76ptAq");
	if (!$con){ die('Could not connect: ' . mysql_error()); }
	mysql_select_db("dbo461977375", $con);
	$sql="SELECT * FROM  envio_unidad  WHERE  servicio_id= ".$request->getParameter('id');
	$result = mysql_query($sql,$con);
	$this->unidades = mysql_fetch_array($result);
	mysql_close($con);

	//$this->unidades = Doctrine::getTable('EnvioUnidad')->findByServicioId($request->getParameter('id'));
	$this->cname = $request->getParameter('Cname');
	$this->cphone = $request->getParameter('cphone');
	$this->direccion= $request->getParameter('origen');
	$this->direccionB = $request->getParameter('destino');
	$this->descripcion = $request->getParameter('descripcion');
	$this->trafico = $request->getParameter('trafico');
	//$this->puntoRef = $request->getParameter('puntoRef);
	
	
   }
  
  public function executeEliminar(sfWebRequest $request){
  	
	$q = Doctrine_Query::create()
    ->update('servicio')
    ->set('estado', '?', 4)
    ->where('id  = ?', $request->getParameter('id'))
    ->execute();
	$con = mysql_connect("130.211.184.73","root","lQN76ptAq");
	if (!$con){ die('Could not connect: ' . mysql_error()); }
	mysql_select_db("dbo461977375", $con);
	$sql="UPDATE envio_unidad SET estado = 4 WHERE servicio_id= ".$request->getParameter('id');
	mysql_query($sql,$con);
	mysql_close($con);
	
	/*$q2 = Doctrine_Query::create()
    ->update('EnvioUnidad')
    ->set('estado', '?', 4)
    ->where('servicio_id  = ?', $request->getParameter('id'))
    ->execute();
	*/
	$this->forward('dashboarddev','index');
  }
public function executeVerificado(sfWebRequest $request){
  	
	$q = Doctrine_Query::create()
    ->update('servicio')
    ->set('notificacion', '?', 3)
    ->where('id  = ?', $request->getParameter('id'))
    ->execute();
	
	
	
	$this->forward('servicio','listservices');
  }  

public function executeReenviar(sFWebRequest $request){
	$q = Doctrine_Query::create()
    ->update('servicio')
    ->set('estado', '?', 3)
    ->where('id  = ?', $request->getParameter('id'))
    ->execute();
	
	$q2 = Doctrine_Query::create()
    ->update('envioUnidad')
    ->set('estado', '?', 4)
    ->where('servicio_id  = ?', $request->getParameter('id'))
    ->execute();
	
}
public function executeListservices(sfWebRequest $request){
	$this->servicios = Doctrine::getTable('servicio')->findBynotificacionAndEstado(1,1);
	$this->total = count($this->servicios);
}
public function executeListservicesgeneral(sfWebRequest $request){
	$this->servicios = Doctrine::getTable('servicio')->findByEstado(1);
	$this->total = count($this->servicios);
}
 
public function executeBusquedaservicio(sfWebRequest $request){
	$this->servicios = null;
	
	if(!empty($request)){
	   $servicioid = $request->getParameter('servicioid');
	   $estado = $request->getParameter('estado');
	  
	   if(!empty($servicioid)){
	      $this->servicios = Doctrine::getTable('servicio')->findById($request->getParameter('servicioid'));
	   }
	   else
	   if(!empty($estado) ){
	   	
	      $this->servicios = Doctrine::getTable('servicio')->findByEstado($request->getParameter('estado'));
	   }	   
	}
		 
}  
}
