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
	<div id="cartel1"><div class="row"><div class="col-sm-12">Procesando... Calculando Ingresos (espere por favor).</div></div></div>
    
    <div class="panel-body">
    	<div id="ingresos">
    		<h3>Gastos por rubro</h3><hr><br>
			
			<div class="row">
	    		<div class="col-sm-12">
            		<div class="card card-success">
	            		<div class="card-header">
                			<h3 class="card-title">Ingresos</h3>
            			</div>
            			<div class="card-body">
	                		<canvas id="ingresosChart" style="height:230px; min-height:230px"></canvas>
            				* En Pesos.
            			</div>
					</div>
    			</div>
			</div>
		</div>
		
		<div id="cartel2"><div class="row"><div class="col-sm-12">Procesando... Calculando Egresos (espere por favor).</div></div></div>
		<div id="egresos">
			<div class="row">
	    		<div class="col-sm-12">
            		<div class="card card-danger">
	            		<div class="card-header">
                			<h3 class="card-title">Egresos</h3>
            			</div>
            			<div class="card-body">
	                		<canvas id="egresosChart" style="height:230px; min-height:230px"></canvas>
	                		* En Pesos.
            			</div>
            		</div>
    			</div>
			</div>
		</div>
	</div>
</div>

<script>
var sumMontoIngresoRubro=[];
var sumMontoEgresoRubro=[];

$(document).ready(function() {
	$("#ingresos").hide();
	$("#egresos").hide();
                    
	$.ajaxSetup({		//defina el paralelismo en off
    	async: false
	});
	
	//carga para el rubro de Ingreso
	for(i=1; i<4; i++){
		$.getJSON("./app/cgi/sum_por_rubro.php?",{tipo:'I', rubro: i}, function(rs,status,xhr){
			if(rs.error==true){
				bootbox.alert({title: "Error", message: rs.msg, backdrop: true});
			}else{
				sumMontoIngresoRubro[i]=rs.datos[0]['monto'];
				//alert("montos: "+sumMontoEgresoRubro1);
			}
		});
	}
	
	//carga para el rubro de Egreso
	for(i=1; i<5; i++){
		$.getJSON("./app/cgi/sum_por_rubro.php?",{tipo:'E', rubro: i}, function(rs,status,xhr){
			if(rs.error==true){
				bootbox.alert({title: "Error", message: rs.msg, backdrop: true});
			}else{
				sumMontoEgresoRubro[i]=rs.datos[0]['monto'];
				//alert("montos: "+sumMontoEgresoRubro1);
			}
		});
	}
	
	$.ajaxSetup({		//defina el paralelismo en on
    	async: true
	});
	
	Ingresos();
	Egresos();
});

//-----------------------------------------------------------------------
function Ingresos(){
	var etiquetas = [];
	
	for(i=0; i<ingresos.length-1; i++){etiquetas[i]=ingresos[i+1];}
	
	
	var valores = [];
	for(i=0; i<3; i++){
		valores[i]=sumMontoIngresoRubro[i+1];
	}
	
	var colores= ['#f56954', '#00a65a', '#f39c12'];
	var elementos = {labels: etiquetas,datasets: [{data: valores,backgroundColor : colores}]};
    
    CharPie('ingresosChart',elementos);
    
    $("#cartel1").hide();
    $("#ingresos").show(500);
}

//-----------------------------------------------------------------------
function Egresos(){
	var etiquetas = [];
	
	for(i=0; i<egresos.length-1; i++){etiquetas[i]=egresos[i+1];}
	
	var valores = [];
	for(i=0; i<4; i++){
		valores[i]=sumMontoEgresoRubro[i+1];
	}
	
	var colores= ['#f56954', '#00a65a', '#f39c12','#00c0ef'];
	
	var elementos = {labels: etiquetas,datasets: [{data: valores,backgroundColor : colores}]};
    
    CharPie('egresosChart',elementos);
    $("#cartel2").hide();
    $("#egresos").show(500);
}

//-----------------------------------------------------------------------
function CharPie(div,elementos){
	var pieChartCanvasIngresos = $('#'+div).get(0).getContext('2d');
    var pieData        = elementos;
    var pieOptions     = {
    	maintainAspectRatio : true,
    	responsive : true,
    }
	
    var pieChart = new Chart(pieChartCanvasIngresos, {
    	type: 'pie',
    	data: pieData,
    	options: pieOptions      
    })
}
</script>