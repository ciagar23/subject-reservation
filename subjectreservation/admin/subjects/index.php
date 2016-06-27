<?php
require_once '../../library/config.php';
require_once '../library/functions.php';


checkUser();

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

switch ($view) {
	case 'list' :
		$content 	= 'list.php';		
		break;

	case 'addMajor' :
		$content 	= 'addMajor.php';		
		break;

	case 'modifyMajor' :
		$content 	= 'modifyMajor.php';		
		break;
		
	case 'viewSem' :
		$content 	= 'viewSem.php';		
		break;

	case 'addSubject' :
		$content 	= 'addSubject.php';		
		break;

	default :
		$content 	= 'major.php';		
}

$sidebar 	= '';
$script    = array('subjects.js');
require_once '../include/template.php';
?>
