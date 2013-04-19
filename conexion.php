<?php
	function Conectar(){
		$servidor = 'localhost';
		$usuario  = 'root';
		$clave    = '';
		$bd       = 'bibliote_remic';
		
		$conexion = mysql_connect($servidor,$usuario,$clave) or die("No se pudo conectar");
		mysql_select_db($bd,$conexion) or die("No se pudo conectar a la base de datos");
		mysql_query("SET NAMES 'utf8'");
		
		return $conexion;
		
	}
?>

