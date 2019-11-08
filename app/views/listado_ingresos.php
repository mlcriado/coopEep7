<?php
session_start();

//seguridad
if(!isset($_SESSION['coop_logueado']) OR $_SESSION['coop_logueado']==false){
	echo "Sin autorización, reingrese";
	exit();
}
//fin seguridad

?>

<script>
    $(document).ready(function() {
        $.ajax({
            url: './app/cgi/consulta_registros.php?tipo=I',
            dataType: 'JSON',
            success: function(rs) {
                if(rs.error==true){
                    bootbox.alert({title: "Aviso", message: rs.msg, backdrop: true});
                    
                }else{ 
                    registros=rs.datos.length;

                    //recorre los registros regresados y los agrega a la tabla
                    for (var i = 0; i < registros; i++) {
                        r=rs.datos[i];
                        ningreso=r['rubro'];
                        nsubingreso=r['subrubro'];
                        registro = '<tr><td style="text-align: left;">'+ingresos[ningreso]+'</td><td style="text-align: left;">'+subIngresos[ningreso][nsubingreso]+'</td><td style="text-align: left;">'+r['factura']+'</td><td style="text-align: center;">'+r['fecha']+'</td><td style="text-align: right;"><b>$ '+r['monto']+'</b></td><td style="text-align: left;"><font size=-1><i>'+r['detalle']+'</i></font></td></tr>';
                        
                        $("#socios").append(registro);
                    }
                    //activa la tabla                            
                    var socios = $('#socios').DataTable({ "className": "table-cell-pba", "order": [[ 1, "desc" ]], "language": {"url": "plugins/datatables/Spanish.json"}});

                    //mostrar la table y ocultar el spinner
                    $("#resultados").show(500);
                    $("#spinner").hide();
                }
                                
                    
            }}
        )
    });
    </script>
    <div class="container">
        <div class="panel-body">
    		<h3>Listado de Ingresos</h3><hr><br>
    		
            <div id="spinner">
                <div class="row ">
                    <div class="col-sm-12" style="text-align: center;">
                        <div class="spinner-border text-success"></div>&nbsp;&nbsp;Procesando... (Espere por favor)
                    </div>
                </div>
            </div>
            <div id="resultados">        
                <div class="row">
                    
                </div>         
			    <div class="row">                    
                    <div class="col-sm-12">
                        <table id="socios" class="display" style="width:100%;">
                            <thead>                                
                                <tr>
                                	<th>Rubro</th>
                                	<th>Sub Rubro</th>
                                    <th># Comprobante</th>
                                    <th>Fecha</th>
                                    <th>Monto</th>
                                    <th>Detalle</th>
                                </tr>
                            </thead>
                            <tbody>                        
                            </tbody>
                        </table>                
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        $(document).ready(function() {
            $("#resultados").hide();
        });
    </script>