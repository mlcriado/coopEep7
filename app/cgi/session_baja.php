<?php
session_start();
session_destroy();

$json = new StdClass;
$json->error 		= false;
$json->errormsg 	= 'Sesion eliminada';

header("Content-Type: application/json");
echo json_encode($json);