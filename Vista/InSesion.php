<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>TRS</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width , initial-scale=1.0">
	 <link rel="stylesheet" href="../css/normalize.min.css">

	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap-responsive.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.css">
	<link rel="stylesheet" type="text/css" href="../css/Style.css">
	
	

</head>
<body>
	<!--Logo y Sesion  -->
	
	<header class="container-fluid">
		<div class="row">
			<div class="col-xl-6 col-sm-6 col-md-6 col-lg-6">
				<!--<h1 class="textH">GAMERENT</h1>-->
				<img class="imglogo" src="../Imags/logo.png" class="img-responsive" alt="">
			</div>
				
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
	   <!-- <ul class="nav navbar-nav">
	      <li class="active"><a href="vhome..php">Inicio</a></li>
	     
	      <li><a href="vContacto.html">Contacto</a></li>
	    </ul> -->
   
	 
	   	    
	    </ul>

	  </div>
	</nav>

	<!-- Se muestra cuadro de inicio de sesion-->
	<div class="container">

      <form method="POST" action="../Controlador/conURegistro.php" name="ISesion" class="form-signin" role="form">
        <h2 align="center"class="form-signin-heading">Iniciar Sesión</h2>
        <input name="email_sesion" id="email_sesion" type="email" class="form-control" placeholder="Email " required="requeried" autofocus>
        <br>
        <input name="pass_sesion" id="pass_sesion" type="password" class="form-control" placeholder="Password" required>
        <br>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Iniciar</button>

        <h4 align="Center"><a href="vURegistro.php">¿Olvidó su contraseña?</a></h4>
      
      			<?php 
            		if(isset($_GET["mensaje"]))
            		{
            		echo "<script name='accion'>alert('".$_GET["mensaje"]."') </script>";
            	}
            	?>

      </form>


    </div> <!-- /container -->

	<footer >
		<div class="container pie"><br>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<p>Ticket Request System</p>
				</div>
			</div>
		</div>
	</footer>
		
		<script src="../js/modernizr-2.6.2.min.js">
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