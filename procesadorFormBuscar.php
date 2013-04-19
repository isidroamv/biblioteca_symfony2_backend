<?php
    //header("Content-Type: text/html;charset=utf-8");
	require_once('conexion.php');
	$con = Conectar();
	session_start();
	$num = 1;
	if($_SESSION['eliminar_libro']==1){
		$funcionEdit = "editar";
		$funcionElim ="eliminar";
	}else{
		$funcionEdit = "mensajeNoPermisos";
		$funcionElim ="mensajeNoPermisos";
	}
	
	if($_SESSION['eliminar_usuario']==1){
		$funcionEditUser = "editar";
		$funcionElimUser ="eliminar";
	}else{
		$funcionEditUser = "mensajeNoPermisos";
		$funcionElimUser ="mensajeNoPermisos";
	}
	
	if($_SESSION['eliminar_admin']==1){
		$funcionEditAdmin = "editar";
		$funcionElimAdmin ="eliminar";
	}else{
		$funcionEditAdmin = "mensajeNoPermisos";
		$funcionElimAdmin ="mensajeNoPermisos";
	}
	
	
	switch($_POST['form']){
		case 'busquedaMaterial':
			$txtPalabras = $_POST['txtPalabras'];
			
			//Ejemplo de un error para validación, tiene que empezar con la palabra 'Error'
			/*if($txtPalabras == 'si'){
				echo 'Error en la consulta';
				return true;
			}*/
			
			$sql = "SELECT * FROM material WHERE autor LIKE '%$txtPalabras%' OR titulo LIKE '%$txtPalabras%' OR signa_topografica LIKE '%$txtPalabras%'";
			$sql2 = "SELECT * FROM libros WHERE autor LIKE '%$txtPalabras%' OR titulo LIKE '%$txtPalabras%' OR signa_topografica LIKE '%$txtPalabras%'";
			$q = mysql_query($sql,$con) or die ("Problemas al ejecutar consultas");
			$q2 = mysql_query($sql2,$con) or die ("Problemas al ejecutar consultas");
			?>
            <center>
            <table class="display" id="example" width="100%">
            	<thead>
                	<tr>
						<th>Num</th>
                    	<th>ID</th>
                        <th>T&iacute;tulo</th>
                        <th>Autor</th>
                        <th>Tipo</th>
                        <th>Clasificaci&oacute;n</th>
                        <th>Signatura Topogr&aacute;fica</th>
                        <th>Idioma</th>
                        <th>Hit</th>
						<th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
            <?php
			while($datos = mysql_fetch_array($q) ){
				 
			?>	
				<tr align="center">
					<td><?php echo $num++?></td>
                	<td><?php echo $datos['id']?></a></td>
                    <td><?php echo $datos['titulo']?></td>
                    <td><?php echo $datos['autor']?></td>
                    <td><?php echo $datos['tipo']?></td>
                    <td><?php echo $datos['clasificacion']?></td>
                    <td><?php echo $datos['signa_topografica']?></td>
                    <td><?php echo $datos['idioma']?></td>
                    <td><?php echo $datos['hit']?></td>
					<td>
						<a href="#" onClick="<?php echo $funcionEdit.'(\''.$datos['id']?>','Material');"><img src="img/btn_editar.png"></a>
						<a href="#" onClick="<?php echo $funcionElim.'(\''.$datos['id']?>','Material');"><img src="img/btn_eliminar.png"></a>
					</td>
                </tr>
            <?php
			}
			
			?>
            
            <?php
			while($datos = mysql_fetch_array($q2) ){
				
			?>	
				<tr align="center">
					<td><?php echo $num++?></td>
                	<td><?php echo $datos['id']?></a></td>
                    <td><?php echo $datos['titulo']?></td>
                    <td><?php echo $datos['autor']?></td>
                    <td>Libro</td>
                    <td><?php echo $datos['clasificacion']?></td>
                    <td><?php echo $datos['signa_topografica']?></td>
                    <td><?php echo $datos['idioma']?></td>
                    <td><?php echo $datos['hit']?></td>
					<td>
						<a href="#" onClick="<?php echo $funcionEdit.'(\''.$datos['id']?>','Libro');"><img src="img/btn_editar.png"></a>
						<a href="#" onClick="<?php echo $funcionElim.'(\''.$datos['id']?>','Libro');"><img src="img/btn_eliminar.png"></a>
					</td>
                </tr>
            <?php
			}
			
			?>
            </tbody>
            </table>
            </center>
            <?php
			break;
			//codigo de Edgar
		case 'busquedaMaterialAvanzada':
			$string = "";
			$arregloL = array("autor"=>"autor","titulo"=>"titulo","idioma"=>"idioma","editorial"=>"editorial","isbn"=>"isbn","issn"=>"issn",
							  "numero_edicion"=>"numero_edicion","fecha_edicion"=>"fecha_edicion","signa_topografica"=>"signa_topografica");
			$arregloM = array("autor"=>"autor","titulo"=>"titulo","idioma"=>"idioma","signa_topografica"=>"signa_topografica");
			
			if($_POST['tipo']=='libro'){
				$arreglo[] = array_walk($arregloL,'generaFiltro');
				$tabla = "libros";
				$tipo = "Libro";
			}else if($_POST['tipo']=='material'){
				$arreglo[] = array_walk($arregloM,'generaFiltro');	
				$tabla = "material";
				$tipo = "Material";
			}
			
			$string = trim($string,' AND');
			if($string==''){
				die ("Error , debe llenar algun campo".$_POST['tipo']);
			}
			
			$sql = "SELECT * FROM $tabla WHERE $string";
			
			$q = mysql_query($sql,$con) or die ("Problemas al ejecutar consultas");
			
			?>
            <center>
            <table class="display" id="example" width="100%">
            	<thead>
                	<tr>
						<th>Num</th>
                    	<th>ID</th>
                        <th>Autor</th>
                        <th>T&iacute;tulo</th>
                        <th>Clasificaci&oacute;n</th>
                        <th>Editorial</th>
                        <th>Signatura Topogr&aacute;fica</th>
                        <th>Idioma</th>
                        <th>Formato</th>
                        <th>ISBN</th>
                        <th>ISSN</th>
                        <th>Opciones</th>
                    </tr>                    

                </thead>
                <tbody>
            
            <?php
			while($datos = mysql_fetch_array($q)){
				//$datos = array_map('htmlentities',$datos); 
			?>	
				<tr align="center">
					<td><?php echo $num++?></td>
                	<td><?php echo $datos['id']?></td>
                    <td><?php echo $datos['autor']?></td>
                    <td><?php echo $datos['titulo']?></td>
                    <td><?php echo $datos['clasificacion']?></td>
                    <td><?php if($tipo=="Libro"){echo $datos['editorial'];}else{echo "-";}?></td>
                    <td><?php echo $datos['signa_topografica']?></td>
                    <td><?php echo $datos['idioma']?></td>
                    <td><?php echo $datos['formato']?></td>
                    <td><?php if($tipo=="Libro"){echo $datos['isbn'];}else{echo "-";}?></td>
                    <td><?php if($tipo=="Libro"){echo $datos['issn'];}else{echo "-";}?></td>
					<td>
						<a href="#" onClick="<?php echo $funcionEdit.'(\''.$datos['id']?>','<?php echo $tipo?>');"><img src="img/btn_editar.png"></a>
						<a href="#" onClick="<?php echo $funcionElim.'(\''.$datos['id']?>','<?php echo $tipo?>');"><img src="img/btn_eliminar.png"></a>
					</td>
                </tr>
                 <?php
                }
				?>
                </tbody>
            </table>
            </center>
            <?php
			break;
		case 'busquedaUsuarios':
			$txtPalabras = $_POST['txtPalabra'];
			$sql = "SELECT * FROM usuarios WHERE nombre LIKE '%$txtPalabras%' OR a_paterno LIKE '%$txtPalabras%' OR a_materno LIKE '%$txtPalabras%' ";
			$q = mysql_query($sql,$con) or die ("Problemas al ejecutar consultas");
			
			if($_SESSION['agregar_admin']==1 or $_SESSION['agregar_admin']==1 ){
				$sql2 = "SELECT * FROM admins WHERE nombre LIKE '%$txtPalabras%' OR usuario LIKE '%$txtPalabras%'";
				$q2 = mysql_query($sql2,$con) or die ("Problemas al ejecutar consultas");
			}
			?>
				<table class="display" id="example" width="100%">
            	<thead>
                	<tr>
						<th>Num</th>
                    	<th>ID</th>
						<th>Tipo</th>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Tel&eacute;fono</th>
						<th>Direcci&oacute;n</th>
                        <th>Ocupaci&oacute;n</th>
                        <th>Usuario</th>
                        <th>Email</th>
						<th>Opciones</th>
                    </tr>                   
                </thead>
				<tbody>
					<?php
					while($datos = mysql_fetch_array($q)){
					//$datos = array_map('htmlentities',$datos); 
					?>	
					<tr>
						<td><?php echo $num++?></td>
						<td><?php echo $datos['id']?></td>
						<td>Usuario</td>
						<td><?php echo $datos['nombre']?></td>
						<td><?php echo $datos['a_paterno']?></td>
						<td><?php echo $datos['a_materno']?></td>
						<td><?php echo $datos['telefono_particular']?></td>
						<td><?php echo $datos['direccion']?></td>
						<td><?php echo $datos['ocupacion']?></td>
						<td><?php echo $datos['usuario']?></td>
						<td><?php echo $datos['e_mail']?></td>
						<td>
							<a href="#" onClick="<?php echo $funcionEditUser.'(\''.$datos['id']?>','Usuario');"><img src="img/btn_editar.png"></a>
							<a href="#" onClick="<?php echo $funcionElimUser.'(\''.$datos['id']?>','Usuario');"><img src="img/btn_eliminar.png"></a>
						</td>
					</tr>
					<?php
					}
					if($_SESSION['agregar_admin']==1 or $_SESSION['agregar_admin']==1 ){
						while($datos2 = mysql_fetch_array($q2)){
						//$datos2 = array_map('htmlentities',$datos2); 
					?>
						<tr>
							<td><?php echo $num++?></td>
							<td><?php echo $datos2['id']?></td>
							<td>Administrador</td>
							<td><?php echo $datos2['nombre']?></td>
							<td><?php echo $datos2['apellidos']?></td>
							<td>-</td>
							<td>-</td>
							<td>-</td>
							<td><?php echo $datos2['cargo']?></td>
							<td><?php echo $datos2['usuario']?></td>
							<td>-</td>
							<td>
								<a href="#" onClick="<?php echo $funcionEditAdmin.'(\''.$datos2['id']?>','Admin');"><img src="img/btn_editar.png"></a>
								<a href="#" onClick="<?php echo $funcionElimAdmin.'(\''.$datos2['id']?>','Admin');"><img src="img/btn_eliminar.png"></a>
							</td>
						</tr>
					<?php
						}
					}
					?>
				</tbody>
			<?php
			break;
		case 'busquedaUsuariosAvanzada':
			$string = "";
			$arregloU = array("nombre"=>"nombre","id"=>"id","usuario"=>"usuario","a_paterno"=>"a_paterno","e_mail"=>"e_mail","direccion"=>"direccion");
			$arregloA = array("nombre"=>"nombre","id"=>"id","usuario"=>"usuario");
			
			if($_POST['tipo']=='usuario'){
				$arreglo[] = array_walk($arregloU,'generaFiltro');
				$string = trim($string,' AND');
				if($string==''){
					die ("Error , debe llenar los campos indicados");
				}
				$tabla = "usuarios";
				$tipo = "Usuario";
				//$sql = "SELECT * FROM $tabla WHERE $string";
				//die ("Error ".$sql);
			}else if($_POST['tipo']=='admin'){
				$arreglo[] = array_walk($arregloA,'generaFiltro');
				if($string==''){
					die ("Error , debe llenar los campos indicados");
				}
				$tabla = "admins";
				$tipo = "Admin";
				$string .=" apellidos LIKE '%$_POST[a_paterno]%'";
				
			}
			$sql = "SELECT * FROM $tabla WHERE $string";
			//die("Error -".$sql);		
			$q = mysql_query($sql,$con) or die ("Problemas al ejecutar consultas");
			?>
            <center>
            <table class="display" id="example" width="100%">
            	<thead>
                	<tr>
						<th>Num</th>
                    	<th>ID</th>
						<th>Tipo</th>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Tel&eacute;fono</th>
						<th>Direcci&oacute;n</th>
                        <th>Ocupaci&oacute;n</th>
                        <th>Usuario</th>
                        <th>Email</th>
						<th>Opciones</th>
                    </tr>                    
                </thead>
                <tbody>
            <?php
			while($datos = mysql_fetch_array($q)){
				//$datos = array_map('htmlentities',$datos); 
			?>	
				<tr align="center">
					<td><?php echo $num++?></td>
                	<td><?php echo $datos['id']?></td>
					<td><?php if($tipo=='Usuario'){echo "Usuario";}else if($tipo=='Admin'){echo "Administrador";} ?></td>
                    <td><?php echo $datos['nombre']?></td>
                    <td><?php if(!isset($datos['a_paterno'])){echo "-";}else{echo $datos['a_paterno'];} ?></td>
                    <td><?php if(!isset($datos['a_materno'])){echo "-";}else{echo $datos['a_materno'];}?></td>
                    <td><?php if(!isset($datos['telefono_particular'])){echo "-";}else{echo $datos['telefono_particular'];}?></td>
                    <td><?php if(!isset($datos['direccion'])){echo "-";}else{echo $datos['direccion'];}?></td>
                    <td><?php if(!isset($datos['ocupacion'])){echo $datos['cargo'];}else{echo $datos['ocupacion'];}?></td>
                    <td><?php echo $datos['usuario']?></td>
                    <td><?php if(!isset($datos['e_mail'])){echo "-";}else{echo $datos['e_mail'];}?></td>
					<td>
						<a href="#" onClick="<?php if($tipo=='Usuario'){echo $funcionEditUser.'(\''.$datos['id'];}else{echo $funcionEditAdmin.'(\''.$datos['id'];}?>','<?php echo $tipo?>');"><img src="img/btn_editar.png"></a>
						<a href="#" onClick="<?php if($tipo=='Usuario'){echo $funcionElimUser.'(\''.$datos['id'];}else{echo $funcionElimAdmin.'(\''.$datos['id'];}?>','<?php echo $tipo?>');"><img src="img/btn_eliminar.png"></a>
					</td>
                </tr>
                <?php }
				?>
                </tbody>
            </table>
            </center>
            <?php
			break;
		case 'busquedaCirculacion':
			$txtPalabras = $_POST['txtPalabra'];
			$sql = "SELECT * FROM historial WHERE signa_topografica LIKE '%$txtPalabras%' OR tipo LIKE '%$txtPalabras%' OR id_persona LIKE '%$txtPalabras%'  OR estado LIKE '%$txtPalabras%' OR comentario LIKE '%$txtPalabras%'";
			$q = mysql_query($sql,$con) or die ("Problemas al ejecutar consultas");
			?>
			<center>
			<table class="display" id="example" width="100%">
            	<thead>
                	<tr>
						<th>Num</th>
                    	<th>ID</th>
						<th>Signatura Topogr&aacute;grafica:</th>
                        <th>Tipo</th>
                        <th>Id Usuario</th>
                        <th>D&iacute;a Sacado</th>
                        <th>D&iacute;a Regresado</th>
						<th>Estado</th>
						<th>Comentario<th>
                    </tr>                   
                </thead>
				<tbody>
			<?php
			while($datos = mysql_fetch_array($q)){
				//$datos = array_map('htmlentities',$datos); 
			?>	
				<tr align="center">
					<td><?php echo $num++?></td>
					<td><?php echo $datos['id']?></td>
					<td><?php echo $datos['signa_topografica']?></td>
					<td><?php echo $datos['tipo']?></td>
					<td><?php echo $datos['id_persona']?></td>
					<td><?php echo $datos['dia_sacado']?></td>
					<td><?php echo $datos['dia_regresado']?></td>
					<td><?php echo $datos['estado']?></td>
					<td>
						<!--<a href="#" onClick="editar('<?php echo $datos['id_persona']?>','Usuario');"><img src="img/btn_editar.png"></a>
						<a href="#" onClick="eliminar('<?php echo $datos['id_persona']?>','Usuario');"><img src="img/btn_eliminar.png"></a>-->
					</td>
					<td><?php echo $datos['comentario']?></td>
				</tr>
			<?php
			}?>
			</tbody>
			</table>
			</center>
			<?php
			break;
		default:
			echo "Error en el sistema";
	}
	
	function generaFiltro($elemento){
		global $string;
		if($_POST[$elemento]!=''){
			$text = $elemento." LIKE "."'%".$_POST[$elemento]."%' AND ";
			$string.= $text;
		}
	} 
	
	
?>