<?php
 
  $valor = revertir("Walter");
 print($valor);
 
 
 
 function revertir($cadena){
 	//echo $cadena[0];
	$total = strlen($cadena);
	//echo "total".$total;
	for($i=0;$i<=$total;$i++){
		
		$indice = $total - $i;
		$cadena2 .= $cadena[$indice];
				
	}
	return $cadena2;
 }



?>