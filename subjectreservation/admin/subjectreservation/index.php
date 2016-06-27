<?php
require_once '../../library/config.php';
require_once '../library/functions.php';


checkUser();

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

switch ($view) {
	case 'list' :
		$sidebar 	= 'evaluated.php';		
		$content 	= 'list.php';		
		break;

	case 'add' :
		$sidebar 	= '';		
		$content 	= 'add.php';		
		break;


	default :
		$sidebar 	= 'evaluated.php';		
		$content 	= 'list.php';		
		break;	
		
}
$script    = array('subjectevaluation.js');
require_once '../include/template.php';
?>
