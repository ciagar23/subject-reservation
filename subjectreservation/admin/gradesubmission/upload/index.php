<?php

require_once '../../../library/config.php';
require_once '../../library/functions.php';

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

switch ($view) {
		
	default :
		$content    = 'upload.php';	
		$sidebar 	= '';		
}




$script    = array('product.js');

require_once '../../include/template.php';
?>
