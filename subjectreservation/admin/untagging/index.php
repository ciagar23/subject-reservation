<?php
require_once '../../library/config.php';
require_once '../library/functions.php';


checkUser();

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

switch ($view) {
	case 'list' :
		$content 	= 'list.php';		
		break;

	case 'add' :
		$content 	= 'add.php';		
		break;

	case 'modify' :
		$content 	= 'modify.php';		
		break;
		
	case 'changepassword' :
		$content 	= 'changepassword.php';		
		break;

	default :
		$content 	= 'list.php';		
}
$sidebar 	= '';	
$script    = array('user.js');
require_once '../include/template.php';
?>
