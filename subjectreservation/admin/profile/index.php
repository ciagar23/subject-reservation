<?php
require_once '../../library/config.php';
require_once '../library/functions.php';

checkUser();

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

switch ($view) {
	case 'list' :
		$content 	= 'list.php';		
		$pageTitle 	= 'GSO - View Users';
		break;

	case 'add' :
		$content 	= 'add.php';		
		$pageTitle 	= 'GSO - Add Users';
		break;

	case 'modify' :
		$content 	= 'modify.php';		
		$pageTitle 	= 'GSO - Modify Users';
		break;
		
	case 'changepassword' :
		$content 	= 'changepassword.php';		
		$pageTitle 	= 'GSO - Modify Users';
		break;

	default :
		$content 	= 'detail.php';		
		$pageTitle 	= 'GSO - View Users';
}

$script    = array('profile.js');

$sidebar 	= '';
require_once '../include/template.php';
?>
