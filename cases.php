<?php 

/*
Plugin Name: Cases 
Plugin URI: ajra.es
Description: Cases API plugin by AJRA
Version: 1.1
*/

add_shortcode('case', 'case_shortcode');


function case_shortcode($att){
	
	
  $apicode = 	json_decode(file_get_contents("https://floridacovid.com/api/v1/cases"));
  
if($att['type']=="TOTALUS")
  {
  	return $apicode->country->confirmed;  
  }
	
if($att['type']=="totalfl")
  {
  	return $apicode->cases->total;  
  }
	
if($att['type']=="death")
  {
  	return $apicode->deaths->residents;  
  }
	
if( $att['type'] == "resident" )
  {
	return $apicode->cases->residents;  
  }
	
if( $att['type'] == "noresidente" )
  {
	return $apicode->cases->non_residents;  
  }
	
if( $att['type'] == "expatriado" )
  {
	return $apicode->cases->repatriated;  
  }
  
if($att['type']=="non_residents")
  {
  	return $apicode->deaths->non_residents;  
  }
	
if($att['type']=="casosnegativos")
  {
  	return $apicode->results->negative;  
  }
	
	
if($att['type']=="casospositivos")
  {
  	return $apicode->results->pending;  
  }
	
if($att['type']=="actuales")
  {
  	return $apicode->monitored->currently;  
  }
	
	
if($att['type']=="totales")
  {
  	return $apicode->monitored->total;  
  }	
	}
?>