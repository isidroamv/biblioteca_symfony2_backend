<?php 
require_once 'conexion.php';
session_start();

if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH']== 'XMLHttpRequest'){
	//En caso de que los valores enviados tengan un valor y este disponible en javaScrip
	$usuario = $_POST['txtIdentificacion'];
	$contrasena = $_POST['txtContrasena'];
  
	if(trim($_POST['txtIdentificacion']) != "" && trim($_POST['txtContrasena']) != "")
	{
    	// Puedes utilizar la funcion para eliminar algun caracter en especifico
	    //$usuario = strtolower(quitar($HTTP_POST_VARS["usuario"]));
	    //$password = $HTTP_POST_VARS["password"];
   
    	// o puedes convertir los a su entidad HTML aplicable con htmlentities
		
	    $usuario =  $_POST['txtIdentificacion'];   
    	$password = $_POST['txtContrasena'];
     
		$con = Conectar();
    	@$sql = "SELECT * FROM admins WHERE usuario ='".$usuario."' AND contrasena='".$password."'";
		$result = mysql_query($sql,$con);
    
		if(@mysql_num_rows($result)) {
			  //El usuario y contraseña son correctas
			  $resultado = mysql_fetch_array($result);
			  $_SESSION["usuario"]=$usuario;
			  
			  $id = $resultado['id'];
			  @$sql = "SELECT * FROM privilegios WHERE id ='".$id."'";
			  $result = mysql_query($sql,$con) or die("Error, sobre la consulta");
			  
			  $resultado2 = mysql_fetch_array($result);
			  
			  $_SESSION['agregar_admin']= $resultado2['agregar_admin'];
			  $_SESSION['eliminar_admin']= $resultado2['eliminar_admin'];
			  $_SESSION['agregar_usuario']= $resultado2['agregar_usuario'];
			  $_SESSION['eliminar_usuario']= $resultado2['eliminar_usuario'];
			  $_SESSION['agregar_libro']= $resultado2['agregar_libro'];
			  $_SESSION['eliminar_libro']= $resultado2['eliminar_libro'];
			  $_SESSION['prestamos']= $resultado2['prestamos'];
			  
			  echo 'ok';
	   }else{
	   			echo 'El usuario y/o la clave no son válidos';
	   }
	}else{
		    echo 'Debe especificar un usuario y clave';
	}	
}else{
	//En caso de que que no funcione JavaScrip
	echo 'Error en el sistema';
}	

?>