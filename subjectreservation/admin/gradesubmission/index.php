<?php
require_once '../../library/config.php';
require_once '../library/functions.php';

$_SESSION['login_return_url'] = $_SERVER['REQUEST_URI'];
checkUser();

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

switch ($view) {
	case 'excel' :
		$content 	= 'example.php';
		$sidebar 	= '';
			
		break;
		
	default :
		$content    = 'upload.php';	
		$sidebar 	= '';		
}




$script    = array('product.js');

require_once '../include/template.php';
?>
