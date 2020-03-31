<?php 

/*
Plugin Name: Cases 
Plugin URI: ajra.es
Description: Cases API plugin by AJRA
Version: 1.2
*/

function caseShortcode($att) {
  $get_cases = json_decode(file_get_contents("https://floridacovid.com/api/v1/cases"));

  switch ($att['type']) {
    case 'TOTALUS':
      return $get_cases->country->confirmed;
      break;
    case 'totalfl':
      return $get_cases->cases->total;
      break;
    case 'death':
      return $get_cases->deaths->residents;
      break;
    case 'resident':
      return $get_cases->cases->residents;
      break;
    case 'noresidente':
      return $get_cases->cases->non_residents;
      break;
    case 'casosnegativos':
      return $get_cases->results->negative;
      break;
    case 'actuales':
      return $get_cases->monitored->currently;
      break;
    default:
      return '';
      break;
  }  
}

function caseCounty($att) {
  $get_counties = json_decode(file_get_contents("https://floridacovid.com/api/v1/cases/counties"));

  $miami = $get_counties[array_search('Miami-dade', array_column($get_counties, 'name'))];

  switch ($att['type']) {
    case 'total':
      return $miami->total;
      break;
    case 'residents':
      return $miami->residents;
      break;
    case 'non_residents':
      return $miami->non_residents;
      break;
    case 'deaths':
      return $miami->deaths;
      break;
    case 'last_update':
      return $miami->last_update;
      break;
    default:
      return '';
      break;
  }
}

function shortcodes_init(){
  add_shortcode('case', 'caseShortcode');
  add_shortcode('case_county', 'caseCounty');
}
add_action('init', 'shortcodes_init');

?>