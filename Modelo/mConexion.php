<?php 

	/**
	* Clase de conexiones a Servidor y Base de datos
	*/

	class mConexion
	{

		var $host;
		var $usuario;
		var $contrasena;
		var $baseDatos;
		
		function Conexion()
		{
			$this->host="localhost"; 
			$this->usuario="root"; 
			$this->contrasena=""; 
			$this->baseDatos="trs"; 
			
		}
			
		function conectarse(){
			$enlace = mysqli_connect("localhost","root","","trs");
		
			if($enlace)
			{
				
			}
			else
			{
				die('Error de Conexión (' . mysqli_connect_errno() . ') '.mysqli_connect_error());
			}
			return($enlace);
			mysqli_close($enlace); //cierra la conexion a nuestra base de datos, un punto de seguridad importante.
		}
	}

 ?>