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
$json->msg     = 'Rubro no encontrado';

$pdo    = Conexion();

if(isset($_REQUEST['factura'])){
    $stmt   = $pdo->prepare("SELECT id_rubro, id_subrubro, numfactura, fecha, tipo, monto, detalle FROM libro WHERE tipo=:tipo AND factura=:factura LIMIT 1" );
    $stmt->bindParam("factura",  $_REQUEST['factura']);
}else{
    $stmt   = $pdo->prepare("SELECT id_rubro, id_subrubro, numfactura, fecha, tipo, monto, detalle FROM libro WHERE tipo=:tipo ORDER BY fecha");
}

$stmt->bindParam("tipo",  $_REQUEST['tipo']);

try {
    $stmt->execute();
    
    while ($row = $stmt->fetchObject()){
    	
        $dats[]=[
            'id'		=> intval($row->id),
            'rubro'		=> intval($row->id_rubro),
            'subrubro'	=> intval($row->id_subrubro),
            'factura'	=> stripslashes($row->numfactura),
            'fecha'		=> cambiaf_a_latino($row->fecha),
            'tipo'		=> $row->tipo,
            'monto' 	=> number_format($row->monto, 2, ',', '.'),
            'detalle'	=> stripslashes(nl2br($row->detalle))
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