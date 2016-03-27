
	var departamento="", municipio="";
	
	//___Para el envio y de dato para la generacion de municipios__________________________________________________________________________________________________________		
	function MuniDepto(){
		document.getElementById("resultado").innerHTML="";
		document.getElementById("resultado_2").innerHTML="";
		departamento=document.getElementById("departamento").value;
		ajax_("../Controlador/conURegistro.php?DepartamentoSeleccionado="+departamento);		
	}


	//___Validar Pasword ingresado_____________________________________________________________________________________________________________________	
	function validarConfirmarPass() {
		passw = document.getElementById("pass").value; 
		confirmar_passw = document.getElementById("repass").value; 
		if (confirmar_passw==passw){
			document.getElementById('confirmar_pass_valido').innerHTML = 'Password Valido';  
		}else if(confirmar_passw!=passw){
			document.getElementById('confirmar_pass_valido').innerHTML = 'Password Diferentes';	
		}
		else {
			document.getElementById('confirmar_pass_valido').innerHTML = 'Password Invalido';  
		}
	}

	function validarConfirmarPassA() {
		passw = document.getElementById("passa").value; 
		confirmar_passw = document.getElementById("repass").value; 
		if (confirmar_passw==passw){
			document.getElementById('confirmar_pass_valido').innerHTML = 'Password Valido';  
		}else if(confirmar_passw!=passw){
			document.getElementById('confirmar_pass_valido').innerHTML = 'Password Diferentes';	
		}
		else {
			document.getElementById('confirmar_pass_valido').innerHTML = 'Password Invalido';  
		}
	}