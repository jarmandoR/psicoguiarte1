<?php
function Conexion_pruebas(){
/*     $db=mysqli_connect("localhost","root","","prueba") or die("No se conecto al servidor");
            //mysqli_select_db($db,"prueba") or die ("No se conecto a la base de datos");
            return $db; */
			
			
			$bd="transml9_transmillas"; 
			$host="transmillasweb.com";
			$user="transml9_jose";
			$pass="dobarli23t";
			$Usu_ses="vive";
			$salt = "transmi2344fsdfd"; 
			$db_port        = '3306';  

	$db = mysqli_connect($host, $user, $pass, $bd);
	if (!$db){ 
		die('Error de Conexión: ' . mysqli_connect_errno());	
	}	else {
		
		return $db;
		
	}
	
}
 $dbx=Conexion_pruebas();

?>