<?php
//--------------Conexion para el stma general -----------------------------------------------------------------
function Conexion(){
  $DB['host']   = "localhost";
  $DB['name']   = "eep7";
  $DB['user']   = "eep7laplata";
  $DB['clave']  = "asdf1234";

  return ConectDB($DB);  
}

//---------------Funcion para conectar a una base de datos ---------------------------------------------------
function ConectDB($DB){
  try{
       $pdo = new PDO(
           "mysql:host=" . $DB['host'] . ";dbname=" . $DB['name'], $DB['user'], $DB['clave'],
           array(
               PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
               PDO::MYSQL_ATTR_INIT_COMMAND => "SET SESSION sql_mode = 'TRADITIONAL'"
           )
       );
   
       $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
       
       return $pdo;
   
   }catch(PDOException $e){
       echo "ERROR DB: " . $e->getMessage();
       return 0;
   }
}

//---------------Funcion para pasar fecha de formato latino a ingles----------------------------------------------

function cambiaf_a_mysql($fecha){
	if ($fecha<>""){
   		$trozos=explode("/",$fecha,3);
    	return "".$trozos[2]."-".$trozos[1]."-".$trozos[0]."";
   }else{
    	return "NULL";
   }
}

//---------------Funcion para pasar fecha de formato ingles a latino----------------------------------------------

function cambiaf_a_latino($fecha){
	if (($fecha == "") or ($fecha == "0000-00-00") ){
    	return "";
	} else {
    	return date("d/m/Y",strtotime($fecha));
	}
}