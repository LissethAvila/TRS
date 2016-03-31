<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../css/bootstrap-responsive.css">
<link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.css">
<link rel="stylesheet" type="text/css" href="../css/Style.css">

<?php 

	require_once ("mConexion.php");
/**
* 
*/
class ClassTicket
{
	var $conexion;
	var $mensajeExitoso;
	Var $mensajeError;
	var $conn;
	

	Public function ClassTicket(){
		$this->conexion = new mConexion();
		$this->conn = $this->conexion->conectarse();
		$this->mensajeExitoso = "Registro Correcto";
		$this->mensajeError = "Error de Ingreso";


	}

	//Insertar Ticket
	Public function registroTicket($Tticket, $prioridad, $us, $agente, $asunto, $detalle){

		$sqlInsert = "INSERT INTO ticket (Tipo_Ticket_IdTipo, Prioridad_IdPrioridad, Estado_IdEstado, Usuario_IdUsuario, Asunto, Detalle)
									VALUES ('".$Tticket."','".$prioridad."','1','".$us."','".$asunto."','".$detalle."')"; 
		echo "sql: ".$sqlInsert;
		$insertado = mysqli_query($this->conn, $sqlInsert) or die (mysqli_error());

		if ($insertado) {
			
   		$idTicket = mysqli_insert_id($this->conn);
		
		$sqlInsert = "INSERT INTO asignacion (Usuario_IdUsuario, Ticket_IdTicket)
									VALUES ('".$agente."','".$idTicket."')"; 
		echo "sql: ".$sqlInsert;
		$insertado = mysqli_query($this->conn, $sqlInsert) or die (mysqli_error());


		if ($insertado) {
			echo "<script>location.href='../Vista/vCrearTicket.php?mensaje= Ticket Creado No. ".$idTicket."';</script>";
		}
		echo "<script>location.href='../Vista/vCrearTicket.php?mensaje=".$this->mensajeError."';</script>";
		
		}
		echo "<script>location.href='../Vista/vCrearTicket.php?mensaje=".$this->mensajeError."';</script>";
	}

	//Asignar Ticket
	Public function asignarTicket($agente){
		
		$sqlConsulta = "SELECT IdTicket FROM Ticket ORDER BY IdTicket Desc LIMIT 1";

		$result = mysqli_query($this->conn, $sqlConsulta);
		$idTicket = mysqli_fetch_array($result);

		$sqlInsert = "INSERT INTO asignacion (Usuario_IdUsuario, Ticket_IdTicket)
									VALUES ('".$agente."','".$idTicket."')"; 

		$insertado = mysqli_query($this->conn, $sqlInsert) or die (mysqli_error());

		if ($insertado) {
			echo "<script>location.href='../Vista/vCrearTicket.php?mensaje= Ticket Creado No. ".$idTicket."';</script>";
		}
		echo "<script>location.href='../Vista/vCrearTicket.php?mensaje=".$this->mensajeError."';</script>";
	}
}