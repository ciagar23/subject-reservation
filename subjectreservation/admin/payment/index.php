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

	case 'tc' :
		$content 	= 'terms and condition.php';		
		break;

	case 'thankyou' :
		$content 	= 'thankyou.php';		
		break;
		
	case 'changepassword' :
		$content 	= 'changepassword.php';		
		break;

	default :
		$content 	= 'add.php';		
}
$sidebar 	= '';	
$script    = array('payment.js');
require_once '../include/template.php';
?>
