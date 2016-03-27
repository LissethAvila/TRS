

<?php
	//session_start();
	require_once ("../Modelo/mConexion.php");
	require ("../Modelo/mAdmonUsuario.php");
	require ("../Modelo/mSesion.php");


	$objUsuario = new ClassUsuario();
	$objSesion = new ClassSesion();
	
	$mensajeExito="Registro Exitoso";
	$mensajeError="Error : Datos Incompletos";


//--------Seleccion Iniciar Sesion---------

	if (isset($_POST["email_sesion"]) && isset($_POST["pass_sesion"])){
		if (empty($_POST["email_sesion"]) || empty($_POST["pass_sesion"])) {
			echo "<script>location.href='../Vista/vInSesion.php?mensaje=".$mensajeError."';</script>";
		}
	 
		$objSesion->sesionUsuario($_POST["email_sesion"],$_POST["pass_sesion"]);
	}


//------------Registro Usuario ------------------------

	if(isset($_POST["tipousua"]) && isset($_POST["ubica"]) && isset($_POST["area"]) && isset($_POST["puesto"]) 
		&& isset($_POST["apellidop"]) && isset($_POST["nombres"]) && isset($_POST["email"]) && isset($_POST["pass"])) {
		if( ($_POST["tipousua"]=="Seleccion_TipoUsuario") && ($_POST["ubica"]=="Seleccion_Ubicacion") && ($_POST["area"]=="Seleccion_Area") && ($_POST["puesto"]=="Seleccion_Puesto")) {
						

				echo "<script>location.href='../Vista/vCrearUsua.php?mensaje=".$mensajeError."';</script>";	
			}

			
			$objUsuario->registroUsuario($_POST["area"],$_POST["puesto"],$_POST["ubica"],$_POST["tipousua"],$_POST["apellidop"],$_POST["apellidos"],
				$_POST["nombres"],$_POST["email"],$_POST["pass"]);
			
		}


	
	
 ?>