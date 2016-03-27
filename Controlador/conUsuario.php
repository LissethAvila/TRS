

<?php
	//session_start();
	require_once ("../Modelo/mConexion.php");
	//require ("../Modelo/mAdmonUsuario.php");
	require ("../Modelo/mSesion.php");


//	$objUsuario = new ClassUsuario();
	$objSesion = new ClassSesion();
	
	$mensajeExito="Registro Exitoso";
	$mensajeError="Error : Datos Incompletos";

	//-----Verifica que todas las casillas esten llenas y manda a insertar los datos------------------
	if(isset($_POST["nit"]) && isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["direccion"]) 
		&& isset($_POST["departamento"]) && isset($_POST["municipio"]) && isset($_POST["telefono"]) && isset($_POST["fechanac"])
		&& isset($_POST["email"])&& isset($_POST["nickname"]) && isset($_POST["pass"]) && isset($_POST["genero"])){
			if($_POST["genero"]=="Seleccion_genero"){

				echo "<script>location.href='../Vista/vURegistro.php?mensaje=".$mensajeError."';</script>";	
			}
			$objUsuario->registroUsuario($_POST["nit"],$_POST["nombre"],$_POST["apellido"],$_POST["direccion"],$_POST["zona"],$_POST["departamento"],
				$_POST["municipio"],$_POST["telefono"],$_POST["fechanac"],$_POST["email"],$_POST["nickname"],$_POST["pass"],$_POST["genero"]);
			
		}
	//------------Registro Usuario Administrador o Empleado---------------

	if(isset($_POST["nita"]) && isset($_POST["nombrea"]) && isset($_POST["apellidoa"]) && isset($_POST["direcciona"]) 
		&& isset($_POST["departamento"]) && isset($_POST["municipio"]) && isset($_POST["telefonoa"]) && isset($_POST["fechanaca"])
		&& isset($_POST["emaila"])&& isset($_POST["nicknamea"]) && isset($_POST["passa"]) && isset($_POST["generoa"]) && isset($_POST["tipoUs"])){
			if(($_POST["genero"]=="Seleccion_genero") && ($_POST["tipoUs"]=="Seleccion_tipoUs")){

				echo "<script>location.href='../Vista/vAdmonRegistro.php?mensaje=".$mensajeError."';</script>";	
			}
			$objUsuario->usuarioAdmon($_POST["nita"],$_POST["nombrea"],$_POST["apellidoa"],$_POST["direcciona"],$_POST["zonaa"],$_POST["departamento"],
				$_POST["municipio"],$_POST["telefonoa"],$_POST["fechanaca"],$_POST["emaila"],$_POST["nicknamea"],$_POST["passa"],$_POST["tipoUs"],$_POST["generoa"]);
			
		}
	//-------------Editar Usuario Cliente----------------------------------------------
	if(isset($_POST["idus_edit"]) && isset($_POST["nit_edit"]) && isset($_POST["nombre_edit"]) && isset($_POST["apellido_edit"]) && isset($_POST["direccion_edit"]) 
		&& isset($_POST["departamento"]) && isset($_POST["municipio"]) && isset($_POST["telefono_edit"]) && isset($_POST["fechanac_edit"])
		&& isset($_POST["email_edit"])&& isset($_POST["nickname_edit"]) && isset($_POST["pass_edit"]) && isset($_POST["genero_edit"])){
			if($_POST["genero_edit"]=="Seleccion_genero"){

				echo "<script>location.href='../Vista/vUModificar.php?mensaje=".$mensajeError."';</script>";	
			}
			$objUsuario->actualizarUsuario($_POST["idus_edit"],$_POST["nit_edit"],$_POST["nombre_edit"],$_POST["apellido_edit"],$_POST["direccion_edit"],$_POST["zona_edit"],$_POST["departamento"],
				$_POST["municipio"],$_POST["telefono_edit"],$_POST["fechanac_edit"],$_POST["email_edit"],$_POST["nickname_edit"],$_POST["pass_edit"],$_POST["genero_edit"]);
			
		}

		//-------------Editar Usuario Admoninistrador Empleado----------------------------------------------
	if(isset($_POST["idusa_edit"]) && isset($_POST["nita_edit"]) && isset($_POST["nombrea_edit"]) && isset($_POST["apellidoa_edit"]) && isset($_POST["direcciona_edit"]) 
		&& isset($_POST["departamento"]) && isset($_POST["municipio"]) && isset($_POST["telefonoa_edit"]) && isset($_POST["fechanaca_edit"])
		&& isset($_POST["emaila_edit"])&& isset($_POST["nicknamea_edit"]) && isset($_POST["passa_edit"]) && isset($_POST["generoa_edit"]) && isset($_POST["tipoUs"])){
			if($_POST["generoa_edit"]=="Seleccion_genero" && ($_POST["tipoUs"]=="Seleccion_tipoUs")){

				echo "<script>location.href='../Vista/vAModificar.php?mensaje=".$mensajeError."';</script>";	
			}
			$objUsuario->actualizarUsAdmon($_POST["idusa_edit"],$_POST["nita_edit"],$_POST["nombrea_edit"],$_POST["apellidoa_edit"],$_POST["direcciona_edit"],$_POST["zonaa_edit"],$_POST["departamento"],
				$_POST["municipio"],$_POST["telefonoa_edit"],$_POST["fechanaca_edit"],$_POST["emaila_edit"],$_POST["nicknamea_edit"],$_POST["passa_edit"],$_POST["tipoUs"],$_POST["generoa_edit"]);
			
		}		
	
	
//------Selecciona Municipios------------
	if(isset($_GET["DepartamentoSeleccionado"])){
			if($_GET["DepartamentoSeleccionado"]!="Seleccione Depto"){
				$objUsuario->listMuni($_GET["DepartamentoSeleccionado"]);

			}
	}
	
	//--------Seleccion Iniciar Sesion---------

	if (isset($_POST["email_sesion"]) && isset($_POST["pass_sesion"])){
		if (empty($_POST["email_sesion"]) || empty($_POST["pass_sesion"])) {
			echo "<script>location.href='../Vista/vInSesion.php?mensaje=".$mensajeError."';</script>";
		}
	 
		$objSesion->sesionUsuario($_POST["email_sesion"],$_POST["pass_sesion"]);
	}

	
	//---Eliminar Usuario---------------------
	if(isset($_GET["eliminar_usuario"])){
		?>
			<script>
            	confirmar=confirm("¿Esta seguro de elimiar este Usuario?");
				if(confirmar){
					location.href="conURegistro.php?confirmacion=si&codigo_user=<?php echo $_GET["codigo"]; ?>";
				}else{
					location.href="../Vista/vUListar.php";
				}
           </script>
		<?php
	}
	if(isset($_GET["confirmacion"])){
		$objVideoJ->eliminarUsuario($_GET["codigo_user"]);
	}	

	//-------Modificar Usuario Admon o Empleado------------

	if (isset($_GET["usuario"])) {
		$objUsuario->modificarUsuario($_GET["usuario"]);
	}else{
		echo "<script>location.href='../Vista/vAModificar.php?mensaje=".$mensajeError."';</script>";
	}

	//-------Modificar Usuario Cliente------------

	if (isset($_SESSION["Idusuario"])) {
		$objUsuario->modificarUsuario($_SESSION["Idusuario"]);
	}else{
		echo "<script>location.href='../Vista/vUModificar.php?mensaje=".$mensajeError."';</script>";
	}
	
 ?>