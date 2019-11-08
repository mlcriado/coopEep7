<?php
session_start();

//seguridad
if(!isset($_SESSION['coop_logueado']) OR $_SESSION['coop_logueado']==false){
	echo "Sin autorización, reingrese";
	exit();
}
//fin seguridad

?>
<div class="container">  
    <div class="panel-body">
    	<h3>Benvenido al sistema de la Cooperadora de la EEP7 La Plata</h3><hr><br>
			
		<div class="row justify-content-center">
    		<div class="col-sm-2 card">
            	<a class="btn btn-light" href="#" onclick="$.get( './app/views/alta_ingresos.php', function( data ){$( '#content' ).html( data );});">
                  <i class="fas fa-piggy-bank fa-5x"></i>
                  <p>Registrar Ingreso</p>
                </a>	
    		</div>
    		
    		<div class="col-sm-1"></div>
    		
    		<div class="col-sm-2 card">
    			<a class="btn btn-light" href="#" onclick="$.get( './app/views/alta_egresos.php', function( data ){$( '#content' ).html( data );});">
                  <i class="fas fa-file-invoice-dollar fa-5x"></i>
                  <p>Registrar Egreso</p>
                </a>
            </div>
            
            <div class="col-sm-1"></div>
            
            <div class="col-sm-2 card">
            	<a class="btn btn-light" href="#" onclick="$.get( './app/views/listado_ingresos.php', function( data ){$( '#content' ).html( data );});">
                  <i class="fas fa-list fa-5x"></i>
                  <p>Listado de Ingresos</p>
                </a>
            </div>
            
            <div class="col-sm-1"></div>
            
            <div class="col-sm-2 card">
            	<a class="btn btn-light" href="#" onclick="$.get( './app/views/listado_egresos.php', function( data ){$( '#content' ).html( data );});">
                  <i class="fas fa-list fa-5x"></i>
                  <p>Listado de Egresos</p>
                </a>
            </div>
        </div>
        <br><br>
        <div class="row justify-content-center">
            <div class="col-sm-2 card">
            	<a class="btn btn-light"  href="#"onclick="$.get( './app/views/estado_actual.php', function( data ){$( '#content' ).html( data );});">
                  <i class="fas fa-chart-pie fa-5x"></i>
                  <p>Gastos por Rubro</p>
                </a>
            </div>
            
            <div class="col-sm-1"></div>
            
            <div class="col-sm-2 card">
            	<a class="btn btn-light" href="#" onclick="$.get( './app/views/generar_balance.php', function( data ){$( '#content' ).html( data );});">
                  <i class="far fa-edit fa-5x"></i>
                  <p>Generar Balance</p>
                </a>
            </div>
		</div>
	</div>
</div>

<script>
$(document).ready(function() {
	
});
</script>