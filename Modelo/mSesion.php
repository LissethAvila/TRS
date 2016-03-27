<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap-responsive.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.css">
	<link rel="stylesheet" type="text/css" href="../css/Style.css">

<?php 
	session_start();
	require_once ("mConexion.php");
/**
* 
*/
class ClassSesion
{
	var $conexion;
	var $conn;
	Var $mensajeError;

	Public function ClassSesion(){
		$this->conexion = new mConexion();
		$this->conn = $this->conexion->conectarse();
		$this->mensajeError = "Datos Incorrectos, Pruebe de Nuevo";
	}


	//Sesion Usuarios Usuario
	Public function sesionUsuario($email, $pass){
		
		
		$sqlConsulta ="Select idUsuario, email, contrasena, Nickname, TipoUsuario_idTusuario As Tusuario From usuario where Email = '".$email."'";
	
		$DatosUs = mysqli_query($this->conn, $sqlConsulta) or die(mysqli_error());
		
		$sesionUs = mysqli_fetch_array($DatosUs);
		
		if($pass == $sesionUs["contrasena"]){

				//-----Ingresa usuario Cliente
				if ($sesionUs["Tusuario"] == 1) {
					
					$_SESSION["usuario"] = $sesionUs["Nickname"];
					$_SESSION["Tusuario"] = $sesionUs["Tusuario"];
					$_SESSION["Idusuario"] = $sesionUs["idUsuario"];
		
					header('location: ../Vista/vhome..php');
					echo "<meta http-equiv=refresh content=0;URL=../Vista/vhome..php />";
				}

				//-----Ingresa usuario Empleado
				if ($sesionUs["Tusuario"] == 2) {
					
					$_SESSION["usuario"] = $sesionUs["Nickname"];
					$_SESSION["Tusuario"] = $sesionUs["Tusuario"];
					$_SESSION["Idusuario"] = $sesionUs["idUsuario"];
		
					header('location: ../Vista/vhome..php');
					echo "<meta http-equiv=refresh content=0;URL=../Vista/vhome..php />";
				}

				//-----Ingresa usuario Cliente
				if ($sesionUs["Tusuario"] == 3) {
					
					$_SESSION["usuario"] = $sesionUs["Nickname"];
					$_SESSION["Tusuario"] = $sesionUs["Tusuario"];
					$_SESSION["Idusuario"] = $sesionUs["idUsuario"];
		
					header('location: ../Vista/vhome..php');
					echo "<meta http-equiv=refresh content=0;URL=../Vista/vhome..php />";
				}




					
			}else{
			
				echo "<script>location.href='../Vista/vIsesion.php?mensaje=".$this->mensajeError."';</script>";
				
			}

	}
	//------Verificador Sesion---------
	Public function verificarSesion(){
		if ($_SESSION["usuario"]) {
			return TRUE;
		}else{
			return FALSE;
		}
	}


	//---Cerrar Sesion-------
	Public function cerrarSesion($sesion){
		if(!$sesion)
   		{
   		echo "<script>location.href='../Vista/vIsesion.php?mensaje=Sesion Caducada';</script>";
		//esto ocurre cuando la sesion caduca.
    	}
   		else
   		{ 
    	session_destroy();
    	header('location: ../Vista/vhome..php');
		echo "<meta http-equiv=refresh content=0;URL=../Vista/vhome..php />";
    	}
	}	
	//----Barra de Navegacion-----------
	Public function navSesion(){
		if (!isset($_SESSION["usuario"])) {
			?>
			<form method="POST" action="../Controlador/conURegistro.php" name="ISesion" class="navbar-form navbar-right" role="search">
		      <div class="form-group">
		        <input name="email_sesion" id="email_sesion" type="email" class="form-control" placeholder="Email">
		      </div>
		      <div class="form-group">
		        <input name="pass_sesion" id="pass_sesion" type="password" class="form-control" placeholder="Password">
		      </div>
		      <button type="submit" class="btn btn-default">Inicio Sesion</button>
	    		<?php 
            		if(isset($_GET["mensaje"]))
            		{
            		echo "<script name='accion'>alert('".$_GET["mensaje"]."') </script>";
            	}
            	?>

	    	</form>
	    	<?php 
	    }else{

	    	//------Datos Usuario Cliente------
	    	if ($_SESSION["Tusuario"] == 1) {
			?>
		
			<li class="dropdown">
	        	<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION["usuario"]; ?> <b class="caret"></b>
	        </a>
	        <ul class="dropdown-menu">
	          <li><a href="../Controlador/conURegistro.php">Modificar</a></li>
	          <li><a href="../Controlador/conUCerrar.php">CerrarSesion</a></li>
	          </ul>
	      </li>
			<?php
	    	}//--Fin If usuario 1

	    	//---------Datso Usuario Empleado---------
	    	if ($_SESSION["Tusuario"] == 2) {
			?>
		
			<li class="dropdown">
	        	<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION["usuario"]; ?> <b class="caret"></b>
	        </a>
	        <ul class="dropdown-menu">
	          <li><a href="../Vista/vVRegistro.php">Crear Videojuego</a></li>
	          <li><a href="../Vista/vVListar.php">Listar Videojuego</a></li>
	          <li><a href="../Vista/vReportes.php">Reportes</a></li>
	          <li><a href="../Vista/vVListarRenta.php">Videojuego Rentados</a></li>
	          <li><a href="../Controlador/conUCerrar.php">CerrarSesion</a></li>
	        </ul>
	      </li>
			<?php

		}//--Fin If usuario 2
			//--------Datos Usaruio Administrador------------
			if ($_SESSION["Tusuario"] == 3) {
			?>
		
			<li class="dropdown">
	        	<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION["usuario"]; ?> <b class="caret"></b>
	        </a>
	        <ul class="dropdown-menu">
	          <li><a href="../Vista/VAdmonRegistro.php">Crear Usuario</a></li>
	          <li><a href="../Vista/vUListar.php">Listar Usuario</a></li>
	          <li><a href="../Vista/vCategoria.php">Crear Categoria</a></li>
	          <li><a href="../Vista/vConsola.php">Crear Consola</a></li>
	          <li><a href="../Vista/vFabricante.php">Crear Fabricante</a></li>
	          <li><a href="../Vista/vTarjetas.php">Crear Tarjeta</a></li>
	          <li><a href="../Controlador/conUCerrar.php">CerrarSesion</a></li>
	          </ul>
	      </li>
			<?php
	    	
			 
	    }//--Fin If usuario 3

		}//-Fin else
	}//-Fin funcion navSesion

	//Funcion Navegadr Usuario--
	Public function navSesionUs(){
		if (!isset($_SESSION["usuario"])) {
			echo "<script>location.href='../Vista/vIsesion.php?mensaje=Debe Iniciar Sesion';</script>";	

		}else{
			
	    	//------Datos Usuario Cliente------
	    	if ($_SESSION["Tusuario"] == 1) {
			?>
		
			<li class="dropdown">
	        	<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION["usuario"]; ?> <b class="caret"></b>
	        </a>
	        <ul class="dropdown-menu">
	          <li><a href="../Controlador/conURegistro.php">Modificar</a></li>
	          <li><a href="../Controlador/conUCerrar.php">CerrarSesion</a></li>
	          </ul>
	      </li>
			<?php
	    	}//--Fin If usuario 1

	    	//---------Datso Usuario Empleado---------
	    	if ($_SESSION["Tusuario"] == 2) {
			?>
		
			<li class="dropdown">
	        	<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION["usuario"]; ?> <b class="caret"></b>
	        </a>
	        <ul class="dropdown-menu">
	          <li><a href="../Vista/vVRegistro.php">Crear Videojuego</a></li>
	          <li><a href="../Vista/vVListar.php">Listar Videojuego</a></li>
	          <li><a href="../Vista/vReportes.php">Reportes</a></li>
	          <li><a href="../Vista/vVListarRenta.php">Videojuego Rentados</a></li>
	          <li><a href="../Controlador/conUCerrar.php">CerrarSesion</a></li>
	          </ul>
	      </li>
			<?php

		}//--Fin If usuario 2
			//--------Datos Usaruio Administrador------------
			if ($_SESSION["Tusuario"] == 3) {
			?>
		
			<li class="dropdown">
	        	<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION["usuario"]; ?> <b class="caret"></b>
	        </a>
	        <ul class="dropdown-menu">
	          <li><a href="../Vista/VAdmonRegistro.php">Crear Usuario</a></li>
	          <li><a href="../Vista/vUListar.php">Listar Usuario</a></li>
	          <li><a href="../Vista/vCategoria.php">Crear Categoria</a></li>
	          <li><a href="../Vista/vConsola.php">Crear Consola</a></li>
	          <li><a href="../Vista/vFabricante.php">Crear Fabricante</a></li>
	          <li><a href="../Vista/vTarjetas.php">Crear Tarjeta</a></li>
	          <li><a href="../Controlador/conUCerrar.php">CerrarSesion</a></li>
	         </ul>
	      </li>
			<?php
	    	
			 
	    }//--Fin If usuario 3

		}//-Fin else


	}



}



 ?>