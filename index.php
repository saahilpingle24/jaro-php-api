<?php

require_once 'logic.php';

$http_method = $_SERVER['REQUEST_METHOD'];
$request_endpoint = $_SERVER['REQUEST_URI'];

switch($http_method) {
	case 'GET':
		function_get($request_endpoint);
		break;

	default:
		function_error('method_error');		
		break;
}

?>