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

$pdo      = Conexion();

$stmt = $pdo->prepare("INSERT INTO libro (numfactura, id_rubro, id_subrubro, fecha, tipo, monto, detalle, usuario) VALUES (:numfactura, :id_rubro, :id_subrubro, :fecha, :tipo, :monto, :detalle, :usuario)");

$stmt->bindParam("numfactura",  strtoupper($_GET["numfactura"]));
$stmt->bindParam("id_rubro", 	intval($_GET["rubro"]));
$stmt->bindParam("id_subrubro",	intval($_GET["subrubro"]));
$stmt->bindParam("fecha",   	cambiaf_a_mysql($_GET["fecha"]));
$stmt->bindParam("tipo",    	$_GET["tipo"]);
$stmt->bindParam("monto",    	$_GET["monto"]);
$stmt->bindParam("detalle",     $_GET["detalle"]);

$stmt->bindParam("usuario",     $_SESSION['usuario']);

$json->msg = "Almacenado Exitosamente!";

try{
   $stmt->execute();
   $json->error    = false;

} catch(PDOException $e){
   $json->error    = true;
   $json->msg = $e->getMessage();   
}

echo json_encode($json);