<?php 
	session_start();
	if(isset($_SESSION["usuario"])){
		header("Location: contenido.php");
	}
?>
<!DOCTYPE html >
<html >
	<head>
    	<link  rel="stylesheet" type="text/css" href="css/estilos.css" />
        <meta charset="utf-8" />
        <script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
        <script type="text/javascript">
			$(document).ready(function() {
			// Handler for .ready() called.
			});
			$(function(){
				$('#formIngresar').submit(function(){
					var data = $(this).serialize();
					$.post('login.php',data,function(respuesta){
						//alert(jQuery.trim(respuesta));
						if(jQuery.trim(respuesta)=='ok'){
							var url = "href-contenido.php";
							$(location).attr('href',url);
						}else{
							$('#labelAdvertencia').html(respuesta);
						}			
					});
					return false;
				});
			});	
		</script>
		<title>Biblioteca - Los Mangos</title>
	</head>

<body>
    	<header>
        <!--Contenido de la cabecera-->
        <img src="img/logo.png" align="left" height="100%" id="logo" />
        <img src="img/sistema-de-administracion.png" align="right" width="450">
        <br>
       	<h1>&nbsp;&nbsp;&nbsp;Biblioteca Los Mangos</h1>
        <h5 align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Centro Cultural</h5>
    	</header>
        
        <section class="login">	
        	<fieldset id="ingresar">
        		<form action="#" method="POST" id="formIngresar" name="formIngresar">
                	<br>
                	<?php
                    	/*session_start();
                        
						if(isset($_SESSION["usuario"])){
							echo 'el usuario '.$_SESSION["usuario"].' ha ingreaso al sistema';
                        }else{
							echo "ningún usuario está en el sistema";
                        } */					
                    ?>
                    <label id="labelAdvertencia" style="color:#FF0"></label><br>        	
                	<label style="font:xx-large">Iniciar Sesión</label><br><br>
                    <label>Identificación: </label><br>
                    <input type="text" id="txtIdentificacion" name="txtIdentificacion"size="20" maxlength="20"><br>
                    <label>Contraseña: </label><br>
                    <input  type="password" id="txtContrasena" name="txtContrasena"size="20" maxlength="20"><br><br>
                    <input  type="submit"  id="btnIngresar" value="Entrar">
           		</form>
            </fieldset>
        </section>
        
		<footer>
        	<?php include("footer.php");?>
        <!--Contenido del pie de página-->
        </footer>
        
</body>
</html>
