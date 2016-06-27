<?php
require_once '../../library/config.php';
require_once '../library/functions.php';


checkUser();

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

switch ($view) {
	case 'now' :
		$content 	= 'now.php';		
		break;


	default :
		$content 	= 'list.php';		
}
$sidebar 	= '';	
$script    = array('user.js');
require_once '../include/template.php';
?>
