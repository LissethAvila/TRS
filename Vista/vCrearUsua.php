<?php 
	require ("../Modelo/mAdmonUsuario.php");
	require ("../Modelo/mSesion.php");

	$objAUsuario = new ClassUsuario();
	$objSesion = new ClassSesion();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Nuevo Ticket</title>
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
		<div class="row" align="center">
		<img class="imglogo2" src="../img/trs.png" class="img-responsive" alt="">
				
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

    	<a class="navbar-brand" href="../index.html">
    	<span class="glyphicon glyphicon-arrow-left"></span> Menu Principal</a>
    	</div>

		<!-- Agrupar los enlaces de navegación, los formularios y cualquier
       otro elemento que se pueda ocultar al minimizar la barra -->
  		<div class="collapse navbar-collapse navbar-ex1-collapse">	
			<ul class="nav navbar-nav navbar-right">
     		<li class="dropdown">
        		<a href="#" class="dropdown-toggle" data-toggle="dropdown">
          		<b class="glyphicon glyphicon-user"></b> Usuario<b class="caret"></b>
       			</a>
        			<ul class="dropdown-menu">
          			<li><a href="#">Cerrar Sesion</a></li>
               		</ul>
     		</li>
    		</ul>
  		</div> 

	</nav>

	<!-- Se muestra cuadro de inicio de sesion-->
	<div class="container-fluid">
		<div class="row" align="center">
		<div class="form-group col-xs-12 col-sm-12 col-md-12">
			<h1 align="center">Crear Usuario</h1><br>
		</div>
		</div>

    <form action="../Controlador/conUsuario.php" method="POST" name="FRegistro" id="FRegistro" class="" role="form">

			<div class="row">
				<div class="form-group col-xs-12 col-sm-12 col-md-3 col-md-offset-3">
					<label for="">Tipo de Usuario</label>
					<select name="tipousua" id="tipousua" class="form-control" values="Seleccione TipoUsuario">
						<option value="Seleccion_TipoUsuario">Seleccione</option>
						<option value="1">Administrador</option>
						<option value="2">Agente</option>
						<option value="3">Colaborador</option>

					</select>
				</div>
				<div class="form-group col-xs-12 col-sm-12 col-md-3">
					<label for="">Ubicacion</label>
					<select name="ubica" id="ubica" class="form-control" values="Seleccione Ubicacion">
						<option value="Seleccion_Ubicacion">Seleccione</option>
						<option value="1">CEAS</option>
						<option value="2">Agencia Quetzaltenango</option>
						<option value="3">Agencia Huehuetenango</option>

					</select>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-xs-12 col-sm-12 col-md-3 col-md-offset-3">
					<label for="">Area</label>
					<select name="area" id="area" class="form-control" values="Seleccione Area">
						<option value="Seleccion_Area">Seleccione</option>
						<option value="1">Sistemas</option>
						<option value="2">Contabilidad</option>
						<option value="3">Personas</option>
						<option value="4">Ventas</option>

					</select>
				</div>
				<div class="form-group col-xs-12 col-sm-12 col-md-3">
					<label for="">Puesto</label>
					<select name="puesto" id="puesto" class="form-control" values="Seleccione Puesto">
						<option value="Seleccion_Puesto">Seleccione</option>
						<option value="1">Administradora</option>
						<option value="2">Analista</option>
						<option value="3">Jefe de Agencia</option>

					</select>
				</div>
				
				</div>

			<div class="row">
				<div class="form-group col-xs-12 col-sm-4 col-md-3 col-md-offset-3 col-lg-3">
					<label name="" id="">Primer Apellido</label>
					<input name="apellidop" id="apellidop" class="form-control" type="text" placeholder="Primer Apellido" value="" requiered="requiered">
				</div>
				<div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-3">
					<label name="" id="">Segundo Apellido</label>
					<input name="apellidos" id="apellidos" class="form-control" type="text" placeholder="Segundo Apellido" value="" requiered="requiered">
				</div>				
			</div>
			<div class="row">
				
				<div class="form-group col-xs-12 col-sm-4 col-md-6 col-md-offset-3 col-lg-3">
					<label name="" id="">Nombres</label>
					<input name="nombres" id="nombres" class="form-control" type="text" placeholder="Nombres"value=""  requiered="requiered">
				</div>
				<div class="form-group col-xs-12 col-sm-4 col-md-3 col-lg-3">
					<label name="" id="">Email</label>
					<input name="email" id="email" class="form-control" type="email" placeholder="ejemplo@compartamos.com.gt" value="" requiered="requiered">
				</div>
				
			</div>

			<div class="row">
				<div class="form-group col-xs-12 col-sm-12 col-md-3 col-md-offset-3 col-lg-3">
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
			<div align="center" class="form-group col-xs-12 col-sm-12 col-md-6 col-md-offset-3 col-lg-6">
			<div id="botones" class="row-fluid">
				<button type="submit" class="btn btn-primary" value="registrar">Registrar</button>
				<button type="buttom"class="btn btn-danger"><a href="../index.html">Cancelar</a></button>
				<?php 
            		if(isset($_GET["mensaje"]))
            		{
            		echo "<script name='accion'>alert('".$_GET["mensaje"]."') </script>";
            					}
            	?>

			</div>
			</div> <br><br>
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