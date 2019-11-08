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
    	<h3>Alta de Ingreso</h3><hr><br>
		 
		<form name="formulario1">
			
			<div class="row">
    			<div class="col-sm-3">
        			<select class="form-control btn btn-dark" id="rubro" name="rubro" onchange="SubRubrosRecarga()">
        			</select>
    			</div>

    			<div class="form-group col-3">    
            		<select class="form-control btn btn-dark" id="subrubro" name="subrubro" >
            		</select>    
    			</div>
			</div>
			
			<br>
			
			<div class="row">
				<div class="col-sm-6">
       				<label for="monto">Comprobante: </label>
       				<div class="input-group">
       					<h2 class="label label-default">#</h2>
           				<input type="text" name="numfactura" id="numfactura" class="form-control" autofocus="" maxlength="40">
        			</div>
        			<p><font size=-1><i>*Identificación del comprobante / Número de nota del importe recibido</i></font></p>
    			</div>
    		</div>
			
			<br>
			
			<div class="row">
    			<div class="col-sm-2">
    				<label for="fecha">Fecha: </label>    
            		<input type="text" id="fecha" name="fecha" class="form-control" id="formGroupExampleInput" autofocus="" placeholder="dd/mm/aaaa"> 
            		<p><font size=-1><i>*Fecha de ingreso</i></font></p>
    			</div>
    			
    			<div class="col-sm-1">
    			</div>
    			
    			<div class="col-sm-3">
       				<label for="monto">Monto: </label>
       				<div class="input-group">
       					<h2 class="label label-default">$</h2>
           				<input type="text" name="monto" id="monto" class="form-control" id="formGroupExampleInput" autofocus="" maxlength="10" onkeypress="return validarNumero(event)">
        			</div>
        			<p><font size=-1><i>*Monto recepcionado</i></font></p>
    			</div>
    		</div>
    		
    		<br>

    		<div class="row">
    			<div class="col-sm-6">
        			<label for="detalle">Detalle: </label>
            		<textarea class="form-control" id="detalle" cols="2" axlength="200"></textarea>
            		<p><font size=-1><i>*Descripción del ingreso</i></font></p>
    			</div>
			</div>
			
			<br><br>
			
			<div class="row">
					<div class="form-group col-3">
						<input type="button" class="btn btn-dark btn-lg btn-lg" value="Guardar" onclick = "return validar();">
					</div>
					
					<div class="col-sm-1">
    				</div>
					
					<div class="form-group col-1">
						<input type="reset" class="btn btn-dark btn-lg btn-lg" value="Borrar">
					</div>
			</div>
    	</form>
	</div>
</div>

<script>

//1) Definir Las Variables Correspondintes
//las siguientes se pasaron al menu gral para que sean visibles desde cualquier pantalla
/*
var ingresos = new Array("Recursos Propios","Recursos Oficiales","Otros Subsidios");

var subIngresos=[];
subIngresos[1]= new Array("Cuota Social", "Donación de dinero","Rifas","Festivales, Actos, Quermesse","Quiosco","Interés Bancario");
subIngresos[2]= new Array("Transf. x serv. alimentario", "Subsidios de la D.G.C. y E","Otros Subsidios","Combustible (S.A.E)", "Combustible y Calefación");
subIngresos[3]= new Array("Otros Subsidios");
*/

$(document).ready(function() {
	//precarca de rubros
	document.formulario1.rubro.length = ingresos.length-1;
        
    for(i=0; i<ingresos.length-1; i++){
     	document.formulario1.rubro.options[i].value=i+1;
    	document.formulario1.rubro.options[i].text=ingresos[i+1];
    }
    
    document.formulario1.rubro.options[0].selected = true;
    //fin precarga de rubros
    
	SubRubrosRecarga();
	
	$('#fecha').datepicker({ dateFormat: "dd/mm/yy", altFormat: "dd/mm/yy",altField: "#fecha" });	//activa el bindeo entre el calendario y el cuadro de texto fecha
	$('#fecha').datepicker( "option", "yearRange", "-1:+0" );										//los ultimos 1 años max
    $('#fecha').datepicker( "option", "maxDate", "+0m +0d" );										//no fechas futuras
    $('#fecha').keypress(function (evt) {  return false; });										//hinabilita el teclado en ese campo fecha
});

//----------------------------------------------------------------------------------------------
function SubRubrosRecarga(){
    var selecciono;
    
    selecciono = document.formulario1.rubro[document.formulario1.rubro.selectedIndex].value;
    
    document.formulario1.subrubro.length = subIngresos[selecciono].length-1;
        
    for(i=0; i<subIngresos[selecciono].length-1; i++){
     	document.formulario1.subrubro.options[i].value=i+1;
    	document.formulario1.subrubro.options[i].text=subIngresos[selecciono][i+1];
    }
    
    document.formulario1.subrubro.options[0].selected = true;
}

//----------------------------------------------------------------------------------------------
function validar(){
	var rubro=ValorPorID('rubro');
	if(rubro==0){
		bootbox.alert({title: "Atención !", message: "Por favor seleccione un Rubro, vuelva a intentar.", backdrop: true});
        return false;
	}
	
	var subrubro=ValorPorID('subrubro');
	if(subrubro==0){
		bootbox.alert({title: "Atención !", message: "Por favor seleccione un SubRubro, vuelva a intentar.", backdrop: true});
        return false;
	}
	
	var numfactura=document.getElementById('numfactura').value;
	
	//dentro de esta funcion estaran todas las validaciones
    fecha = document.getElementById('fecha').value;
    if(!esfecha(fecha)){
    	bootbox.alert({title: "Atención !", message: "Formato fecha no valido, vuelva a intentar.", backdrop: true});
        return false;
    }
    
    var tipo='I';
    
    var monto;
    monto = document.getElementById("monto").value;

    if (monto ===""){
        bootbox.alert({title: "Atención !", message: "Complete el MONTO (obligatorio)", backdrop: true});
        return false;
    }
    
    var detalle=document.getElementById('detalle').value;
            
    $.getJSON("./app/cgi/alta_registro.php?",{numfactura:numfactura, rubro: rubro, subrubro:subrubro, fecha:fecha, tipo:tipo, monto:monto, detalle:detalle}, function(rs,status,xhr){
		if(rs.error==true){ //a pesar que es la misma linea, se podria personalizar la caja del aviso, o rojo o verde segun si es error o no...
			bootbox.alert({title: "Error", message: rs.msg, backdrop: true});
		}else{
			bootbox.alert({title: "Felicitaciones", message: rs.msg, backdrop: true});
			
			document.getElementById('numfactura').value='';
			document.getElementById('fecha').value='';
			document.getElementById("monto").value='';
			document.getElementById('detalle').value='';
		}
	});
}
</script>