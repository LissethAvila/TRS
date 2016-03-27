
<?php 
	//require ("../Modelo/mAdmonUsuario.php");
	//require ("../Modelo/mConsola.php");
	//require ("../Modelo/mCategoria.php");
	//$objAUsuario = new ClassUsuario();
	//$objCategoria = new ClassCategoria();
	//$objConsola = new ClassConsola();

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registro Usuario</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width , initial-scale=1.0">
	 <link rel="stylesheet" href="../css/normalize.min.css">

	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap-responsive.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.css">
	<link rel="stylesheet" type="text/css" href="../css/Style.css">
	<script type="text/javascript" src="../ajax/ajax.js"></script>
	<script type="text/javascript" src="../Script/Script.js"></script>

    <script type="text/javascript">
		$(document).ready(function() {
			
	</script>
	

</head>

<body>
	<!--Logo y Sesion  -->
	
	<header class="container-fluid">
		<div class="row">
			<div class="col-xl-6 col-sm-6 col-md-6 col-lg-6">
				<!--<h1 class="textH">GAMERENT</h1>-->
				<img class="imglogo" src="../Imags/logo.png" class="img-responsive" alt="">
				
			<div class="col-xl-6 col-sm-6 col-md-6 col-lg-6">
							
			</div>
		</div>
	</header>
	
	<!-- Menu -->
	<nav class="navbar navbar-default" role="navigation">
  <!-- El logotipo y el icono que despliega el menú se agrupan
       para mostrarlos mejor en los dispositivos móviles -->
	  <div class="navbar-header">
	    <button type="button" class="navbar-toggle" data-toggle="collapse"
	            data-target=".navbar-ex1-collapse">
	      <span class="sr-only">Desplegar navegación</span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	    </button>
	    <a class="navbar-brand" href="#"></a>
	  </div>
	 
	  <!-- Agrupar los enlaces de navegación, los formularios y cualquier
	       otro elemento que se pueda ocultar al minimizar la barra -->
	  <div class="collapse navbar-collapse navbar-ex1-collapse">
	    <!--<ul class="nav navbar-nav">
	      <li class="active"><a href="vhome..php">Inicio</a></li>
	     
	      <li><a href="vContacto.html">Contacto</a></li>
	    </ul> -->
   
	 
	   	    
	    </ul>

	  </div>
	</nav>

	<!-- Se muestra cuadro de inicio de sesion-->
	<div class="container">
		<div class="row">
		<div class="form-group col-xs-12 col-sm-12 col-md-6">
			<h1 align="center">Crear Usuario</h1><br>
		</div>
		</div>


    <form action="../Controlador/conURegistro.php" method="POST" name="FRegistro" id="FRegistro" class="" role="form">

			<div class="row">
				<div class="form-group col-xs-12 col-sm-12 col-md-3">
					<label for="">Tipo de Usuario</label>
					<select name="TipoUsua" id="TipoUsua" class="form-control" values="Seleccione TipoUsuario">
						<option value="Seleccion_TipoUsuario">Seleccione</option>
						<option value="1">Administrador</option>
						<option value="2">Agente</option>
						<option value="2">Colaborador</option>

					</select>
				</div>
				<div class="form-group col-xs-12 col-sm-12 col-md-3">
					<label for="">Ubicacion</label>
					<select name="ubicacion" id="ubicacion" class="form-control" values="Seleccione Ubicacion">
						<option value="Seleccion_Ubicacion">Seleccione</option>
						<option value="1">CEAS</option>
						<option value="2">Agencia</option>
						

					</select>
				</div>
				<!--<div class="form-group col-xs-12 col-sm-12 col-md-3 col-lg-3">
					<label name="lnit" id="lnit">NIT</label>
					<input name="nit" id="nit" class="form-control" type="text" placeholder="XXXXXXX-X" value="" requiered="requiered">
				</div> -->
				
			</div>

			<div class="row">
				<div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-3">
					<label name="" id="">Apellido Paterno</label>
					<input name="apellidopa" id="apellidopa" class="form-control" type="text" placeholder="Apellido Paterno" value="" requiered="requiered">
				</div>
				<div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-3">
					<label name="" id="">Apellido Materno</label>
					<input name="apellidoma" id="apellidoma" class="form-control" type="text" placeholder="Apellido Materno" value="" requiered="requiered">
				</div>				
			</div>
			<div class="row">
				
				<div class="form-group col-xs-12 col-sm-4 col-md-6 col-lg-6">
					<label name="" id="">Nombres</label>
					<input name="nombres" id="nombres" class="form-control" type="text" placeholder="Nombres"value=""  requiered="requiered">
				</div>
				
			</div>

			<div class="row">
				<div class="form-group col-xs-12 col-sm-12 col-md-3">
					<label for="">Agencia / Area</label>
					<select name="AgeArea" id="AgeArea" class="form-control" values="Seleccione AgenciaArea">
						<option value="Seleccion_AgenciaArea">Seleccione</option>
						<option value="1">Sistemas</option>
						<option value="2">Contabilidad</option>
						<option value="2">Personas</option>
						<option value="2">Quetzaltenango</option>

					</select>
				</div>
				<div class="form-group col-xs-12 col-sm-12 col-md-3">
					<label for="">Puesto</label>
					<select name="puesto" id="puesto" class="form-control" values="Seleccione Puesto">
						<option value="Seleccion_Puesto">Seleccione</option>
						<option value="1">Administradora</option>
						<option value="2">Analista</option>
						<option value="2">Jefe de Agencia</option>

					</select>
				</div>
				
			</div>
			<div class="row">
				<div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<label name="" id="">Email</label>
					<input name="email" id="email" class="form-control" type="email" placeholder="ejemplo@compartamos.com.gt" value="" requiered="requiered">
				</div>
			
				
			</div>

			<div class="row">
				<div class="form-group col-xs-12 col-sm-12 col-md-3 col-lg-3">
					<label name="" id="">Contrase&ntilde;a</label>
					<input name="pass" id="pass" class="form-control" type="password" placeholder="" value="" oncopy="alert('No puedes Copiar'); return false;" required="required" autocomplete="off">
				</div>
			
				<div class="form-group col-xs-12 col-sm-12 col-md-3 col-lg-3">
					<label name="" id="">Confirmar Contrase&ntilde;a</label>
					<input name="repass" id="repass" class="form-control" type="password" placeholder="" value="" oncopy="alert('No puedes Copiar'); return false;" onpaste="alert('No puedes Pegar'); return false;" onkeyup="validarConfirmarPass();" required="required" autocomplete="off" >
					<label id="confirmar_pass_valido"></label>
				</div>

				
			</div>

			<!--Botones-->
			<div align="center" class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
			<div id="botones" class="row-fluid">
				<button type="submit" class="btn btn-primary" value="registrar">Registrar</button>
				<button type="buttom"class="btn btn-danger"><a href="vhome..php">Cancelar</a></button>
				<?php 
            		if(isset($_GET["mensaje"]))
            		{
            		echo "<script name='accion'>alert('".$_GET["mensaje"]."') </script>";
            					}
            	?>

			</div>
			</div> <br><br>
			<!--<div class="row">
					<?php 
						$objAUsuario->listdepto();
					 ?>
					<div id="resultado"></div>
           		 	<div id="resultado_2"></div>
				
			</div>-->
	

   	</form>

	</div> <!--container-->

		
	/<script src="../js/modernizr-2.6.2.min.js">
	</script>
	<script src="../js/main.js"></script>
	<script type="text/javascript" src="../js/jquery-1.11.1.min.js"></script>
   	 <script type="text/javascript" src="../js/bootstrap.min.js"></script>
   	 <script type="text/javascript" src="../js/dropdown.js"></script>
   	 <script type="text/javascript">
   			  	$(".dropdown-toggle").dropdown();
   			  </script>	

</body>
</html>