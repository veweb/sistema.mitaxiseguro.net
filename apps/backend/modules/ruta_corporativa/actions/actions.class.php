<?php

/**
 * ruta_corporativa actions.
 *
 * @package    sistem-taxi
 * @subpackage ruta_corporativa
 * @author     Walter Rosales
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ruta_corporativaActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
  	$correlativo = 0;
  	$total= 0;

    $this->f = new rutaCorporativaForm();
    $this->porcentaje = Doctrine::getTable('tarifaCalculo')->findByNombre('alta');
    $q = Doctrine_Core::getTable('rutaCorporativa')
			  ->createQuery('c')
			  ->orderBy('c.id Desc');
    $indice = $q->execute();
    $total = count($indice);
    if ($total > 0 ){
 		$correlativo = $indice[0]->getId() + 1;

    }
    $this->correlativo=$correlativo;
    //echo "Total: ".$total." Correlativo: ".$correlativo;
    //exit;
  }
  public function executeNew(sfWebRequest $request){
  	$this->form = new rutaCorporativaForm();
  }

  public function executeGuardar(sfWebRequest $request){

  	$ruta_params = $request->getParameter('ruta_corporativa');
  	

 	    $this->form = new rutaCorporativaForm();
 	echo "igresa";
    if($request->isMethod("post")){
 	    echo "es post";
       $this->form->bind($ruta_params);
       //if($this->form->isValid()){

       	echo "Ingresa a grabar";
 				
           $ruta = new rutaCorporativa();
           $ruta->codigo = $ruta_params["codigo"];
           $ruta->empresa_id = $ruta_params["empresa_id"];
           $ruta->sucursal_id =$ruta_params["sucursal_id"];
           $ruta->trafico = $ruta_params["trafico"];
           $ruta->distancia = $ruta_params["distancia"];
           $ruta->nombres1 = $ruta_params["nombres1"];
           $ruta->nombres2 = $ruta_params["nombres2"];
           $ruta->nombres3 = $ruta_params["nombres3"];
           $ruta->nombres4 = $ruta_params["nombres4"];
           $ruta->destino1 = $ruta_params["destino1"];
           $ruta->destino2 = $ruta_params["destino2"];
           $ruta->destino3 = $ruta_params["destino3"];
           $ruta->destino4 = $ruta_params["destino4"];
           $ruta->zona1 = $ruta_params["zona1"];
           $ruta->zona2 = $ruta_params["zona2"];
           $ruta->zona3 = $ruta_params["zona3"];
           $ruta->zona4 = $ruta_params["zona4"];
           $ruta->tarifa_piloto = $ruta_params["tarifa_piloto"];
           $ruta->tarifa_empresa = $ruta_params["tarifa_empresa"];

           $ruta->save();
 
       //}
    }

  }
  public function executeCalcularPrecio(sfWebRequest $request){


  }
  protected function processForm(sfWebRequest $request, sfForm $form)
{
  $form->bind(
    $request->getParameter($form->getName()),
    $request->getFiles($form->getName())
  );
 
  if ($form->isValid())
  {
    $job = $form->save();
 
    $this->redirect($this->generateUrl('job_show', $job));
  }
}

}