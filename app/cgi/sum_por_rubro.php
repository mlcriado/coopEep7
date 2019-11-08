<?php
session_start();

header("Content-Type: application/json");
$json = new StdClass;

//seguridad
if(!isset($_SESSION['coop_logueado']) OR $_SESSION['coop_logueado']==false){
	$json->error	= true;
	$json->msg		= "Sin autorización, reingrese";
	echo json_encode($json);
	exit();
}
//fin seguridad

include 'funciones.php';

$json->error   = true;
$json->msg     = '';

$pdo    = Conexion();

if(isset($_REQUEST['rubro'])){
    $stmt   = $pdo->prepare("SELECT sum(monto) as monto  FROM libro WHERE tipo=:tipo AND id_rubro=:rubro" );
    $stmt->bindParam("rubro",  $_REQUEST['rubro']);
}else{
    $stmt   = $pdo->prepare("SELECT sum(monto) as monto  FROM libro WHERE tipo=:tipo" );
}

$stmt->bindParam("tipo",  $_REQUEST['tipo']);

try {
    $stmt->execute();
    
    while ($row = $stmt->fetchObject()){
    	
        $dats[]=[
            'monto'		=> doubleval($row->monto)
        ];
        
        $json->datos=$dats;
    }
    
    $json->error	= false;
    $json->msg 		= '';

}catch(Exception $e){
	$json->error	= true;
	$json->msg		= $e->getMessage();
}

echo json_encode($json);