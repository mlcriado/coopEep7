<?php
session_start();
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
    <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/font-awesome.min.css">
    <link rel="stylesheet" href="./dist/css/login.css">
  </head>
	
  <body>
		<div class="container">
      
            <div class="form-signin">
            	</center><img src="dist/img/coop.jpg" alt="" class="brand-image img-circle elevation-3" style="opacity: .8; text-align: center;">
            	
            	<h4 class="form-signin-heading text-center">Cooperadora - EEP 7</h4>

                <input type="text" name="usuario" id="usuario" class="form-control" placeholder="usuario" required="Completar con su usuario" value="" autofocus="">

                <input name="clave" id="clave" class="form-control" placeholder="clave" required="Completar con su clave" value="" type="password" onkeypress="return presiono(event)">
                
                <button class="form-buton" onclick="Loguearse();">Ingresar</button>

                <br><br><i>usuario: ejemplo <br> clave: 123456</i>
            </div>

    		<div class="row text-center">
        		<div id="spin" style="display:none;"><i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i></div>
        	</div>
    	</div>

    	<footer class="footer">
    		<strong>Copyright &copy; 2019 <a href="http://www.i12.edu.ar">Cooperadoras - i12.edu.ar</a></strong> Derechos reservados.
    		<div class="float-right d-none d-sm-inline-block">
      			<b>Version</b> 1.0.0-beta
    		</div>
  		</footer>
		<!-- JQuery -->
		<script src="plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>		      
	</body>  
</html>

<script>
	function presiono(e){
		tecla=(document.all)? e.keyCode : e.which;
		if (tecla==13){Loguearse()};
		return tecla; 
	}
	
	function Loguearse(){
		var usuario = document.getElementById('usuario').value;
		var clave 	= document.getElementById('clave').value;

		$.getJSON("./app/cgi/session_alta.php?",{usuario:usuario, clave:clave}, function(rs,status,xhr){
			if(rs.error==true){				
				alert(rs.msg);
			}else{				
				window.location.href = ".";		
			}
		});

        return false;		
	}
</script>