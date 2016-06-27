<?php
require_once '../library/config.php';
require_once './library/functions.php';

checkUser();

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

switch ($view) {
	case 'aboutus' :
		$content 	= 'aboutus.php';		
		break;

	case 'help' :
		$content 	= 'help.php';		
		break;

	default :
		$content 	= 'main.php';		
}


$script = array();

$sidebar 	= '';
require_once 'include/template.php';
?>
