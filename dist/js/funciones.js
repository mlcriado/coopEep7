function validarNumero(e){
	tecla=(document.all)? e.keyCode : e.which;
	if (tecla==8) return true;
	patron=/[0-9 && .]/;
	te= String.fromCharCode(tecla);
	return patron.test(te); 
}
        
//-------------------------------------------------------------------------------------------------------------------------------
function esfecha(fecha){ //no modificar esta funcion, solo usarla cuantas veces sea necesario            
	var fechaArr = fecha.split('/');
	var dia = fechaArr[0];
	var mes = fechaArr[1];
	var aho = fechaArr[2];  
	var plantilla = new Date(aho, mes - 1, dia);//mes empieza de cero Enero = 0
    
	if(!plantilla || plantilla.getFullYear() == aho && plantilla.getMonth() == mes -1 && plantilla.getDate() == dia){
		return true;
	}else{
		return false;
	}
}



function ValorPorID(cual){	
	if(document.getElementById(cual)!=null){
		return 	document.getElementById(cual).options[document.getElementById(cual).selectedIndex].value;
	}		
}

//-------------------------------------------------------------------------------------------------------------------------------
function Left(str, n){
	if (n <= 0)
		return "";
	else if (n > String(str).length)
		return str;
	else
		return String(str).substring(0,n);
	}

//-------------------------------------------------------------------------------------------------------------------------------
function Right(str, n){
	if (n <= 0)
		return "";
	else if (n > String(str).length)
		return str;
	else {
		var iLen = String(str).length;
		return String(str).substring(iLen, iLen - n);
	}
}