<?php
	session_start();
	if(isset($_SESSION["usuario"])){
		header ("Location: contenido.php");
	}else{
		echo "Necesita registrarse para entrar a esta página";
	} 
?>