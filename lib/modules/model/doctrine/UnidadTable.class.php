<?php

/**
 * UnidadTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class UnidadTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object UnidadTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Unidad');
    }
	
	public function LocalizacionUnidades($lat,$lng,$distancia,$cantidad){
		
		
		//$query = "SELECT a.id,a.lat,a.longi, ( 3959 * acos( cos( radians(".$lat.") ) * cos( radians( ".$lat." ) ) * cos( radians( longi ) - radians(".$lng.") ) + sin( radians(".$lat.") ) * sin( radians( ".$lat." ) ) ) ) AS distance 
             //     FROM unidad HAVING distance < ".$distancia." ORDER BY distance LIMIT 0 ,".$cantidad;
             
         $q = Doctrine_Core::getTable('unidad')
         ->createQuery("a") ;   
		 $q->select("a.id, a.longi, a.lat, a.updated_at, a.estado,a.codigo, (6371 * acos(cos(radians('".$lat."')) * cos(radians( a.lat )) * cos(radians(a.longi) - radians('".$lng."')) + sin(radians('".$lat."')) * sin(radians(a.lat )))) AS distance");
         //$q->Where("a.estado = ?",1);
         $q->having("distance < ?", $distancia);
		 $q->addOrderBy('distance DESC');
		 $results = $q->fetchArray();      
        
     
         return $results;
		
	}
	
	
 
}