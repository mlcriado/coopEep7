<?php
session_start();
if(!isset($_SESSION['coop_logueado']) OR $_SESSION['coop_logueado']==false ){
  header("Location:."); exit();
}
?>

<!DOCTYPE html>
<html lang="es-ar">
<head>
    <meta charset="utf-8">
    <meta HTTP-EQUIV="pragma" CONTENT="no-cache">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon"  type="image/png"   href="./dist/img/coop.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Cooperadora">
    <meta name="author" content="Dir. Gral de Cultura y Edu. PBA - i12.edu.ar">
    <title>Cooperadora</title>
	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
	<!-- IonIcons -->
	<link rel="stylesheet" href="plugins/ionicons/ionicons.min.css">  
	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="plugins/googleapis/googleapis.css">
	<!-- Jquery-ui -->
	<link rel="stylesheet" href="plugins/jquery-ui/jquery-ui.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="plugins/adminlte/css/adminlte.min.css">
	<!-- Char.js -->
	<link rel="stylesheet" href="plugins/chart.js/Chart.css">
	<!-- DataTables.js -->
	<link rel="stylesheet" href="plugins/datatables/jquery.dataTables.min.css">
	  
	<!-- Personalizado -->
	<style type="text/css">
	    .fa-sign-out-alt {
    	color: grey;
    	}
	</style>
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to to the body tag
to get the desired effect
|---------------------------------------------------------|
|LAYOUT OPTIONS | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="." class="nav-link">Escuela de Educación Primaria 7 La Plata - PBA</a>
      </li>      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->      
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
            class="fas fa-th-large"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="." class="brand-link">
      <img src="dist/img/coop.jpg" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Cooperadora</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/usuario.png" class="img-circle elevation-2" alt="Fulanito Menganito">
        </div>
        <div class="info">
        	<div style="color:#ce6048;">
        		<div id="usuario"></div>
          		<div id="nivel_detalle"></div>
          	</div>          	
          	<a href="#" onclick="$.get( './app/cgi/session_baja.php', function( data ){$( '#content' ).html( data );window.location.href = '.';});"> Salir &nbsp;&nbsp;<i class="nav-icon fas fa-sign-out-alt"></i></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fas fa-book nav-icon"></i>
              <p>
                Libro diario
                <i class="fas fa-angle-left right"></i>
                <!--<span class="badge badge-info right">0</span>-->
              </p>
            </a>
             <ul class="nav nav-treeview">              
              <li class="nav-item">
                <a href="#" class="nav-link" onclick="$.get( './app/views/alta_ingresos.php', function( data ){$( '#content' ).html( data );});">
                  <i class="fas fa-piggy-bank nav-icon"></i>
                  <p>Registrar Ingreso</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">              
              <li class="nav-item">
                <a href="#" class="nav-link" onclick="$.get( './app/views/alta_egresos.php', function( data ){$( '#content' ).html( data );});">
                  <i class="fas fa-file-invoice-dollar nav-icon"></i>
                  <p>Registrar Egreso</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link" onclick="$.get( './app/views/listado_ingresos.php', function( data ){$( '#content' ).html( data );});">
                  <i class="fas fa-list nav-icon"></i>
                  <p>Listado de Ingresos</p>
                </a>
              </li>          
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link" onclick="$.get( './app/views/listado_egresos.php', function( data ){$( '#content' ).html( data );});">
                  <i class="fas fa-list nav-icon"></i>
                  <p>Listado de Egresos</p>
                </a>
              </li>          
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="far fa-folder-open nav-icon"></i>
              <p>
                Reportes
                <i class="fas fa-angle-left right"></i>
                <!--<span class="badge badge-info right">0</span>-->
              </p>
            </a>
             <ul class="nav nav-treeview">              
              <li class="nav-item">
                <a href="#" class="nav-link" onclick="$.get( './app/views/estado_actual.php', function( data ){$( '#content' ).html( data );});">
                  <i class="fas fa-chart-pie nav-icon"></i>
                  <p>Gastos por Rubro</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fas fa-balance-scale nav-icon"></i>
              <p>
                Balance Anual
                <i class="fas fa-angle-left right"></i>
                <!--<span class="badge badge-info right">0</span>-->
              </p>
            </a>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link" onclick="$.get( './app/views/balanceback.php', function( data ){$( '#content' ).html( data );});">
                  <i class="far fa-edit nav-icon"></i>
                  <p>Generar Balance</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><div id="pagina_actual"></div></h1>
          </div><!-- /.col -->          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid" id="content">
        
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2019 <a href="http://www.i12.edu.ar"></a></strong>Derechos reservados.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0-beta&nbsp;&nbsp;
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jQuery ui-->
<script src="plugins/jquery-ui/jquery-ui.js"></script>
<!-- BootBox -->
<script src="plugins/bootbox/bootbox.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap4.min.js "></script>
<!-- Upload -->
<script src="plugins/upload/upload.js"></script>
<!-- AdminLTE -->
<script src="plugins/adminlte/js/adminlte.min.js"></script>
<script src="plugins/adminlte/js/demo.js"></script>
<!-- Char.js -->
<script src="plugins/chart.js/Chart.js"></script>
<!-- Knob -->
<script src="plugins/knob/jquery.knob.js"></script>

<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>

<!-- Propios SCRIPTS -->
<script src="dist/js/funciones.js"></script>

<script>
	//1) Definir Las Variables Correspondintes para ingresos y egresos
	var ingresos = new Array("","Recursos Propios","Recursos Oficiales","Otros Subsidios");

	var subIngresos=[];
	subIngresos[1]= new Array("","Cuota Social", "Donación de dinero","Rifas","Festivales, Actos, Quermesse","Quiosco","Interés Bancario");
	subIngresos[2]= new Array("","Transf. x serv. alimentario", "Subsidios de la D.G.C. y E","Otros Subsidios","Combustible (S.A.E)", "Combustible y Calefación");
	subIngresos[3]= new Array("","Otros Subsidios");
	
	var egresos = new Array("","Servicio de Alimento","Gastos para el Alumno","Gastos para la Escuela","Gastos propios de la Entidad");
	var subEgresos=[];
	subEgresos[1]= new Array("","Comestibles SAE", "Otros");
	subEgresos[2]= new Array("","Ropa y calzado", "Libros y Útiles", "Excursiones","Emergencias sanitarias","Golosinas,Premios y medallas", "Otros");
	subEgresos[3]= new Array("","Articulos de limpieza", "Material Didáctico", "Mant. y Mejoras de e/por Subsidio","Combustible y Calefacción", "Mant. y Obras c/fondos propios","Librería","Mobiliario","Otros");
	subEgresos[4]= new Array("","Organización de Rifas", "Organización de Festivales", "Kiosko", "Multa por Ley de Cheques","Débitos Bancarios","Otros");
	
	$(document).ready(function() {
		$.get( './app/views/inicio.php', function( data ){$( '#content' ).html( data );});
	});
</script>
</body>
</html>
