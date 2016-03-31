

<?php
	//session_start();
	require_once ("../Modelo/mConexion.php");
	require ("../Modelo/mTicket.php");
	
	$objTicket = new ClassTicket();
		
	$mensajeExito="Creacion Exitosa";
	$mensajeError="Error : Datos Incompletos";


//------------Ingreso Ticket y Asignaci;on ------------------------

	if(isset($_POST["tipoticket"]) && isset($_POST["priori"]) && isset($_POST["usuariorep"]) && isset($_POST["agente"]) 
		&& isset($_POST["asunto"]) && isset($_POST["detalle"])) {
		if( ($_POST["tipoticket"]=="Seleccion_TipoTicket") && ($_POST["priori"]=="Seleccion_Prioridad") && ($_POST["agente"]=="Seleccion_Agente")) {
						

				echo "<script>location.href='../Vista/vCrearTicket.php?mensaje=".$mensajeError."';</script>";	
			}

			
			$objTicket->registroTicket($_POST["tipoticket"],$_POST["priori"],$_POST["usuariorep"],$_POST["agente"],$_POST["asunto"],$_POST["detalle"]);
			
		}


	
	
 ?>