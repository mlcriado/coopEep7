<?php
session_start();
include 'funciones.php';

header("Content-Type: application/json");

$json = new StdClass;

try {    
    $pdo  = Conexion();

    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE usuario=:usuario AND clave=:clave LIMIT 1");
    $stmt->bindParam("usuario", $_GET["usuario"]);
    $stmt->bindParam("clave",   $_GET["clave"]);
    
    $stmt->execute();
    
    $row = $stmt->fetchObject();
        
    if($_GET["usuario"]!=NULL AND $_GET["clave"]!=NULL AND $_GET["usuario"]==$row->usuario AND $_GET["clave"]==$row->clave){        	
        $json->error        = false;
        $json->msg     = '';
			
		$_SESSION['coop_logueado']  = true;
        $_SESSION['usuario']        = $row->usuario;

    }else{
        $json->error    = true;
		$json->msg = 'Credenciales no validas';
        $_SESSION['coop_logueado'] = false;
    }    

}catch(Exception $e){
		$json->error 	 = true;
        $json->msg = $e->getMessage();
}

$stmt = null;
$pdo = null;

echo json_encode($json);