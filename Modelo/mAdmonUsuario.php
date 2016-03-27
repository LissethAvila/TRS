<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap-responsive.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.css">
	<link rel="stylesheet" type="text/css" href="../css/Style.css">

<?php 

	require_once ("mConexion.php");
/**
* 
*/
class ClassUsuario
{
	var $conexion;
	var $mensajeExitoso;
	Var $mensajeError;
	var $conn;
	var $depto;

	Public function ClassUsuario(){
		$this->conexion = new mConexion();
		$this->conn = $this->conexion->conectarse();
		$this->mensajeExitoso = "Registro Correcto";
		$this->mensajeError = "Error de Ingreso";


	}

	
	//Insertar Usuario
	Public function registroUsuario($nit, $nombre, $apellido, $direccion, $zona, $departamento, $municipio, 
									$telefono, $fechanac, $email, $nickname, $pass, $genero){
		
		
		$sql ="insert into usuario (NIT, Nombre, Apellido, FechaNac, Email, Telefono, Nickname, Contrasena, TipoUsuario_idTusuario, Genero_idGenero)  
											values ('".$nit."','". $nombre."','".$apellido."','".$fechanac."',
											'".$email."','".$telefono."','".$nickname."','".$pass."','1','".$genero."')";
	

		$enlace = $this->conn;
		
		if(mysqli_query($enlace, $sql)){

					
			}else{
			
				echo "<script>location.href='../Vista/vURegistro.php?mensaje=".$this->mensajeError."';</script>";
				
			}

		$sqlConsulta = "Select idUsuario From usuario order by idUsuario desc limit 1";
		$resultUs = mysqli_query($this->conn,$sqlConsulta);
		$idUs = mysqli_fetch_array($resultUs);

		$sqldirec = "insert into direccion (Nomenclatura, Zona, Usuario_idUsuario, Municipio_idMunicipio)  
											values ('".$direccion."','". $zona."','".$idUs['idUsuario']."','".$municipio."')";

		if(mysqli_query($enlace, $sqldirec)){

				echo "<script>location.href='../Vista/Ok.html';</script>";				
			}else{
			
				echo "<script>location.href='../Vista/vURegistro.php?mensaje=".$this->mensajeError."';</script>";
				
			}

	}

	//--------------Modifica Usuario Cliente---------

	Public function modificarUsuario($idUsuario){
		$sqlConsulta = "SELECT u.*, d.*, g.Tipo as Ngenero, m.idMunicipio, dep.idDepartamento FROM usuario u INNER JOIN direccion d ON u.idUsuario = d.Usuario_idUsuario
														INNER JOIN genero g ON u.Genero_idGenero = g.idGenero
														INNER JOIN municipio m ON d.Municipio_idMunicipio = m.idMunicipio
														INNER JOIN departamento dep ON m.Departamento_idDepartamento = dep.idDepartamento
						WHERE u.idUsuario = ".$idUsuario." order by u.idUsuario";
		
		$resultUs = mysqli_query($this->conn,$sqlConsulta);
		
		$datos = mysqli_fetch_array($resultUs);
		
		if ($datos) {
				if ($datos["TipoUsuario_idTusuario"] == 1) {
					echo "<script>location.href='../Vista/vUModificar.php?midus=".$datos["idUsuario"]."&Mnit=".$datos["NIT"]."&Mnombre=".$datos["Nombre"]."&Mapellido=".$datos["Apellido"]."&Mfechanac=".$datos["FechaNac"]."&Memail=".$datos["Email"]."&Mtelefono=".$datos["Telefono"]."&Mnick=".$datos["Nickname"]."&Mpass=".$datos["Contrasena"]."&Mgenero=".$datos["Ngenero"]."&Mdirecc=".$datos["Nomenclatura"]."&Mzona=".$datos["Zona"]."&Mmunicipio=".$datos["idMunicipio"]."&Mdepto=".$datos["idDepartamento"]."';</script>";			
				}else{
					echo "<script>location.href='../Vista/vAModificar.php?midus=".$datos["idUsuario"]."&Mnit=".$datos["NIT"]."&Mnombre=".$datos["Nombre"]."&Mapellido=".$datos["Apellido"]."&Mfechanac=".$datos["FechaNac"]."&Memail=".$datos["Email"]."&Mtelefono=".$datos["Telefono"]."&Mnick=".$datos["Nickname"]."&Mpass=".$datos["Contrasena"]."&Mgenero=".$datos["Ngenero"]."&Mdirecc=".$datos["Nomenclatura"]."&Mzona=".$datos["Zona"]."&Mmunicipio=".$datos["idMunicipio"]."&Mdepto=".$datos["idDepartamento"]."';</script>";			
				}
		}else
			{
				
				header('location: ../Vista/vhome..php');

			}
		
		
	}

	//-------------Actualizar Usuario Cliente-----------------------------------------
	Public function actualizarUsuario($usuario, $nit, $nombre, $apellido, $direccion, $zona, $departamento, $municipio, 
									$telefono, $fechanac, $email, $nickname, $pass, $genero){

			$sqlActualUs = "UPDATE usuario SET NIT = ".$nit.", 
												 Nombre ='".$nombre."',
												 Apellido='".$apellido."',
												 FechaNac='".$fechanac."',
												 Email='".$email."',
												 Telefono=".$telefono.",
												 Nickname='".$nickname."',
												 Contrasena='".$pass."',
												 Genero_idGenero=".$genero." 
												 WHERE idUsuario =".$usuario;


			$sqlActualDir = "UPDATE direccion SET Nomenclatura = '".$direccion."', 
												 Zona =".$zona.",
												 Municipio_idMunicipio=".$municipio."
												 WHERE Usuario_idUsuario =".$usuario;	
			
			$AUs = mysqli_query($this->conn, $sqlActualUs) or die (mysqli_error());
			$ADir = mysqli_query($this->conn, $sqlActualDir) or die (mysqli_error());

			if (($AUs == TRUE) && ($ADir == TRUE)) {
				echo "<script>location.href='../Vista/vhome..php?mensaje=".$this->mensajeExitoso."';</script>";
				
			
			}else{
				echo "<script>location.href='../Vista/vIsesion.php?mensaje=".$this->mensajeError."';</script>";
				echo "<script>location.href='../Vista/vhome..php';</script>";
			}


	}

	//Insertar Usuario Administrador y Empleado
	Public function usuarioAdmon($nit, $nombre, $apellido, $direccion, $zona, $departamento, $municipio, 
									$telefono, $fechanac, $email, $nickname, $pass, $Tipo, $genero){
		
		
		$sql ="insert into usuario (NIT, Nombre, Apellido, FechaNac, Email, Telefono, Nickname, Contrasena, TipoUsuario_idTusuario, Genero_idGenero)  
											values ('".$nit."','". $nombre."','".$apellido."','".$fechanac."',
											'".$email."','".$telefono."','".$nickname."','".$pass."','".$Tipo."','".$genero."')";
	

		$enlace = $this->conn;
		
		if(mysqli_query($enlace, $sql)){

					
			}else{
			
				echo "<script>location.href='../Vista/vAdmonRegistro.php?mensaje=".$this->mensajeError."';</script>";
				
			}

		$sqlConsulta = "Select idUsuario From usuario order by idUsuario desc limit 1";
		$resultUs = mysqli_query($this->conn,$sqlConsulta);
		$idUs = mysqli_fetch_array($resultUs);

		$sqldirec = "insert into direccion (Nomenclatura, Zona, Usuario_idUsuario, Municipio_idMunicipio)  
											values ('".$direccion."','". $zona."','".$idUs['idUsuario']."','".$municipio."')";

		if(mysqli_query($enlace, $sqldirec)){

				echo "<script>location.href='../Vista/vUListar.php?mensaje=".$this->mensajeExitoso."';</script>";				
			}else{
			
				echo "<script>location.href='../Vista/vUListar.php?mensaje=".$this->mensajeError."';</script>";
				
			}

	}


	//-------------Listar Usuarios Administrador------------------
	Public function ListarUsAdmon(){

		$sqlConsulta = "SELECT u.idUsuario, u.Nickname, u.Nombre, u.Apellido, u.Nit, u.Telefono, u.FechaNac, u.Email, g.Tipo, t.Nombre as TNombre,
								 d.*, m.Nombre as NMuni, dep.Nombre as NDepto 
								 		FROM usuario u INNER JOIN direccion d ON u.idUsuario = d.Usuario_idUsuario
														INNER JOIN municipio m ON d.Municipio_idMunicipio = m.idMunicipio
														INNER JOIN departamento dep ON m.Departamento_idDepartamento = dep.idDepartamento
														INNER JOIN genero g ON u.Genero_idGenero = g.idGenero
														INNER JOIN TipoUsuario t ON u.TipoUsuario_idTusuario = t.idTusuario 
													WHERE u.TipoUsuario_idTusuario != 1 order by u.idUsuario";
		
		$resultUs = mysqli_query($this->conn,$sqlConsulta);
		
	?>
			<table class="table table-striped table-hover">
				<thead>
					<th>No.</th>
					<th>Usuario</th>
					<th>Nit</th>
					<th>Nombre</th>
					<th>Genero</th>
					<th>Direccion</th>
					<th>Telefono</th>
					<th>Fecha Nacimiento</th>
					<th>Email</th>
					<th>Tipo Usuario</th>
					<th>Editar</th>
					<th>Eliminar</th>
				</thead>
				
				<?php 
			
					$No = 1;
					while ($datos = mysqli_fetch_array($resultUs)) {
						echo "<tr><td align='center'>".$No."</td>";
						echo "<td align='center'>".$datos["Nickname"]."</td>";
						echo "<td align='center'>".$datos["Nit"]."</td>";
						echo "<td align='center'>".$datos["Nombre"]." ".$datos["Apellido"]."</td>";	
						echo "<td align='center'>".$datos["Tipo"]."</td>";			
						echo "<td align='center'>".$datos["Nomenclatura"]." zona ".$datos["Zona"]." ".$datos["NMuni"]." ".$datos["NDepto"]."</td>";			
						echo "<td align='center'>".$datos["Telefono"]."</td>";
						echo "<td align='center'>".$datos["FechaNac"]."</td>";
						echo "<td align='center'>".$datos["Email"]."</td>";			
						echo "<td align='center'>".$datos["TNombre"]."</td>";
						
						echo "<td><a href='../Controlador/conURegistro.php?usuario=".$datos["idUsuario"]."'>Modificar</a></td>";
						echo "<td><a href='../Controlador/conURegistro.php?eliminar_usuario=si&codigo=".$datos["idUsuario"]."'>Eliminar</a></td></tr>";
						
						$No++;		
					}
				 ?>
			</table>


			<?php 
		

	}

	//-------------Actualizar Usuario Administrador o Empleado-----------------------------------------
	Public function actualizarUsAdmon($usuario, $nit, $nombre, $apellido, $direccion, $zona, $departamento, $municipio, 
									$telefono, $fechanac, $email, $nickname, $pass, $Tipo, $genero){

			$sqlActualUs = "UPDATE usuario SET NIT = ".$nit.", 
												 Nombre ='".$nombre."',
												 Apellido='".$apellido."',
												 FechaNac= '".$fechanac."',
												 Email='".$email."',
												 Telefono=".$telefono.",
												 Nickname='".$nickname."',
												 Contrasena='".$pass."',
												 TipoUsuario_idTusuario=".$Tipo.",
												 Genero_idGenero=".$genero." 
												 WHERE idUsuario =".$usuario;


			$sqlActualDir = "UPDATE direccion SET Nomenclatura = '".$direccion."', 
												 Zona =".$zona.",
												 Municipio_idMunicipio=".$municipio."
												 WHERE Usuario_idUsuario =".$usuario;	
			
			$AUs = mysqli_query($this->conn, $sqlActualUs) or die (mysqli_error());
			$ADir = mysqli_query($this->conn, $sqlActualDir) or die (mysqli_error());

			if (($AUs == TRUE) && ($ADir == TRUE)) {
				echo "<script>location.href='../Vista/vUListar.php?mensaje=".$this->mensajeExitoso."';</script>";
				
			
			}else{
				echo "<script>location.href='../Vista/vUListar.php?mensaje=".$this->mensajeError."';</script>";
			
			}


	}

	//---------------Lista Departamentos------------------
	Public function listdepto(){

		$sqlConsulta = "select * from departamento order by idDepartamento asc";
		$result = mysqli_query($this->conn, $sqlConsulta) or die(mysqli_error());
		?>
		<div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">
		<label name="" id="">Departamento</label>
		<select name="departamento" id="departamento" class="form-control" value="" onchange="MuniDepto();">
		<?php 
			echo "<option value='Seleccione Depto' selected='selected'>Seleccione</option>";
			while($campo=mysqli_fetch_array($result)){
				echo "<option value='".$campo['idDepartamento']."'> ".$campo['Nombre']." </option>";
		}
		?>	
		</select>
		</div>
				<?php 

	}

	//------------------Llama Funcion para generara listado Municipios dependiendo departamentos-----------
	Public function listMuni($idDepto){
		$sqlConsulta = "select * from municipio where Departamento_idDepartamento = '".$idDepto."' order by idMunicipio asc";
		$result = mysqli_query($this->conn, $sqlConsulta) or die(mysqli_error());
		?>
		<div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">
		<label name="" id="">Municipio</label>
		<select name="municipio" id="municipio" value="" class="form-control" >
		<?php 
			echo "<option value='Seleccione Muni' selected='selected'>Seleccione</option>";
			while($campo=mysqli_fetch_array($result)){
				echo "<option value='".$campo['idMunicipio']."'> ".$campo['Nombre']." </option>";
		}
		?>	
		</select>
		</div>
		

		<?php 

	}

	//---------------------Eliminar Usuario----------------

		Public function eliminarUsuario($idUs){
			
			$sqlDelUs = "Delete from usuario where idUsuario = ".$idUs;
			$sqlDelDir = "Delete from direccion where Usuario_idUsuario = ".$idUs;
			$deleteu =mysqli_query($this->conn, $sqlDelUs);
			$delete =mysqli_query($this->conn, $sqlDelDir);
			
			if($delete){						
				echo "<script>
						alert('Eliminacion exitosa');
						location.href='../Vista/vUListar.php';
				</script>";				
			}else{
				echo "<script>
						alert('Error Al Eliminar');
						location.href='../Vista/vUListar.php';
				</script>";	
				}
		}
	
}



 ?>