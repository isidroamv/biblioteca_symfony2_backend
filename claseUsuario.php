<?php
require_once 'conexion.php';
require_once 'class/resize.php';

class Usuario{
	var $datos = array("nombre", "a_paterno", "a_materno","fecha_nacimiento", "codigo_postal", "telefono_particular",
	"telefono_2","telefono_trabajo","direccion","ocupacion","carrera","escuela","semestre","e_mail","sexo","fecha_registro",
	"contrasena","usuario");
	
	function __construct(){
	}
	
	public function agregarDatos($datos){
		if($datos['txtNombre']==''){
			die ("Error - debe especificar un Nombre");
		}
			
		$sql = "SELECT * FROM usuarios WHERE usuario='$datos[txtUsuario]'";
		$q = mysql_query($sql,Conectar());
			
		if(!$q){
			die ('Error al ejecutar mysql_query');
		}
		$q = mysql_fetch_array($q);
		if($q['usuario']==$datos['txtUsuario']){
			die ("Error - El usuario ".$datos['txtUsuario']. " ya existe");
		}
		
			$sql= "INSERT INTO usuarios (";
			foreach($this->datos as $elementos){
				$sql.=$elementos.",";
			}
			$sql= trim($sql,',');
			$sql.=")VALUES(";
			$sql.="'$datos[txtNombre]','$datos[txtApellidoP]', '$datos[txtApellidoM]', '$datos[fechaNacimiento]',
					'$datos[numCodigoPostal]','$datos[telParticular]','$datos[tel2]','$datos[telTrabajo]','$datos[txtDireccion]',
					'$datos[txtOcupacion]', '$datos[txtCarrera]','$datos[txtNomEsc]','$datos[txtSemestre]','$datos[txtEmail]',
					'$datos[txtSexo]',CURRENT_TIMESTAMP,'$datos[txtContrasena]','$datos[txtUsuario]')";
			
			$q = mysql_query($sql,Conectar()) or die('Error al ejecutar mysql_query -');
			
			if(!$q){
				echo 'Error al ejecutar mysql_query';
			}
	}
	
	public function cargarImagen($imagen){
		if($imagen['foto']){
			$tamano= $imagen["foto"]['size'];
			echo "Error - ".$tamano;
		}
	}
		
	public function eliminarDatos($id){	
			echo $datos["id"];
			$sql = "DELETE FROM usuarios WHERE id = '$id'";
			$q = mysql_query($sql,Conectar());
			
			if(!$q){
				echo 'Error al ejecutar mysql_query';
			}
	}
	
	public function actualizarDatos($datos,$id){
		if($datos['nombre']==''){
			die ("Error - debe especificar un Nombre");
		}
			
		$sql = "SELECT * FROM usuarios WHERE usuario='$datos[usuario]'";
		$q = mysql_query($sql,Conectar());
			
		if(!$q){
			die ('Error al ejecutar mysql_query');
		}
		$q = mysql_fetch_array($q);
		if($q['usuario']==$datos['usuario']){
			die ("Error - El usuario ".$datos['usuario']. " ya existe");
		}
			
			$sql = "UPDATE usuarios SET nombre='$datos[nombre]',a_paterno='$datos[a_paterno]',a_materno='$datos[a_materno]',
			 fecha_nacimiento='$datos[fecha_nacimiento]',codigo_postal='$datos[codigo_postal]',telefono_particular='$datos[telefono_particular]',
			 telefono_2='$datos[telefono_2]',telefono_trabajo='$datos[telefono_trabajo]',direccion='$datos[direccion]',ocupacion='$datos[ocupacion]',
			 carrera='$datos[carrera]',escuela='$datos[escuela]',semestre='$datos[semestre]',e_mail='$datos[e_mail]',
			 sexo='$datos[sexo]',contrasena='$datos[contrasena]',usuario='$datos[usuario]' WHERE id='$id'";		
			
			$q = mysql_query($sql,Conectar());
			
			if(!$q){
				echo 'Error al ejecutar mysql_query';
			}	
	}
		
	public function setEstado($id,$estado){
			$sql = mysql_query("UPDATE usuarios SET estado=$estado WHERE id='$id'");
			
			$q = mysql_query($sql,Conectar());
			
			if(!$q){
				echo 'Error al ejecutar mysql_query';
			}		
		}
	
	public function cargarFoto($file,$name){
		$id = $name;
		if($file){
		$tamano = $file["foto"]['size'];
    	$tipo = $file["foto"]['type'];
			$trozos = explode(".", $file["foto"]['name']);
			$extension = end($trozos);
		$name.=".".$extension;
		$destino =  "img/usuarios/".$name;
	
		if (copy($file['foto']['tmp_name'],$destino)) {
			$resizeObj = new resize($destino);
			$resizeObj -> resizeImage(100, 100, 0);
			$resizeObj -> saveImage($destino, 100);
			$sql = "UPDATE usuarios SET fotografia='$destino' WHERE id='$id'";
			$q = mysql_query($sql,Conectar());
			if(!$q){
				echo 'Error al ejecutar mysql_query';
			}	
            $status = "Archivo subido: <b>".$name."</b>";
        } else {
            $status = "Error al subir el archivo";
     	}
		}
	}
	
	public function getId(){
		$rs = mysql_query("SELECT @@identity AS id");
		if ($row = mysql_fetch_row($rs)) {
			$id = trim($row[0]);
			return $id;
		}
	}
	
	public function getDatos($id){
		$array = array();
			$sql = "SELECT * FROM usuarios WHERE id=".$id;
			$q = mysql_query($sql,Conectar());
			
			if(!$q){
				echo 'Error al ejecutar mysql_query-';
			}else{
				/* while($row=mysql_fetch_array($q)){
					//$array[] = $row;
					echo $row['hit'];
				} */
				$row = mysql_fetch_assoc($q);
				/* Now we free up the result and continue on with our script */
				mysql_free_result($q);

				echo json_encode($row);
			}
	}
			
}


class Administrador{
	public function agregarDatos($datos){
		if($datos['txtNombre']==''){
			die ("Error - debe especificar un Nombre");
		}
		if($datos['txtContrasena']==''){
			die ("Error - debe especificar un una contraseña");
		}
		if($datos['txtUsuario']==''){
			die ("Error - debe especificar un un Usuario");
		}
		
			
		$sql = "SELECT * FROM admins WHERE usuario='$datos[txtUsuario]'";
		$q = mysql_query($sql,Conectar());
			
		if(!$q){
			die ('Error al ejecutar mysql_query');
		}
		$q = mysql_fetch_array($q);
		if($q['usuario']==$datos['txtUsuario']){
			die ("Error - El usuario ".$datos['txtUsuario']. " ya existe");
		}
		
		$sql= "INSERT INTO admins (nombre,apellidos,contrasena,fecha_registro,cargo,usuario)
		VALUES('$datos[txtNombre]','$datos[txtApellidos]','$datos[txtContrasena]','$datos[txtRegistro]',
		'$datos[txtCargo]','$datos[txtUsuario]')";
			
		$q = mysql_query($sql,Conectar());
		if(!$q){
			echo 'Error al ejecutar mysql_query';
		}	
	}
	
	public function eliminarDatos($id){	
		echo $datos["id"];
		$sql = "DELETE FROM admins WHERE id = '$id'";
		$q = mysql_query($sql,Conectar());
		if(!$q){
			echo 'Error al ejecutar mysql_query';
		}
	}
	
	public function actualizarDatos($datos,$id){
		if($datos['nombre']==''){
			die ("Error - debe especificar un Nombre");
		}
			
		$sql = "SELECT * FROM admins WHERE usuario='$datos[usuario]'";
		$q = mysql_query($sql,Conectar());
			
		if(!$q){
			die ('Error al ejecutar mysql_query');
		}
		$q = mysql_fetch_array($q);
		if($q['usuario']==$datos['usuario']){
			die ("Error - El usuario ".$datos['usuario']. " ya existe");
		}
		
		$sql = "UPDATE admins SET nombre='$datos[nombre]',apellidos='$datos[apellidos]',contrasena='$datos[contrasena]',
		fecha_registro='$datos[fecha_registro]',cargo='$datos[cargo]',usuario='$datos[usuario]' WHERE id='$id'";		
		$q = mysql_query($sql,Conectar());
		if(!$q){
			echo 'Error al ejecutar mysql_query';
		}
	}
	
	public function setPrivilegios($datos,$id){
		if(isset($datos['checkAgregarAdmin'])){
			$datos['checkAgregarAdmin']=true;	
		}else{
			$datos['checkAgregarAdmin']=false;
		}
		if(isset($datos['checkEliminarAdmin'])){
			$datos['checkEliminarAdmin']=true;	
		}else{
			$datos['checkEliminarAdmin']=false;
		}
		if(isset($datos['checkAgregarUsuario'])){
			$datos['checkAgregarUsuario']=true;	
		}else{
			$datos['checkAgregarUsuario']=false;
		}
		if(isset($datos['checkEliminarUsuario'])){
			$datos['checkEliminarUsuario']=true;	
		}else{
			$datos['checkEliminarUsuario']=false;
		}
		if(isset($datos['checkAgregarLibro'])){
			$datos['checkAgregarLibro']=true;	
		}else{
			$datos['checkAgregarLibro']=false;
		}
		if(isset($datos['checkEliminarLibro'])){
			$datos['checkEliminarLibro']=true;	
		}else{
			$datos['checkEliminarLibro']=false;
		}
		if(isset($datos['checkPrestamos'])){
			$datos['checkPrestamos']=true;	
		}else{
			$datos['checkPrestamos']=false;
		}
		
		
		$sql= "INSERT INTO privilegios (id,agregar_admin,eliminar_admin,agregar_usuario,eliminar_usuario,agregar_libro,eliminar_libro,prestamos)
		VALUES('$id','$datos[checkAgregarAdmin]','$datos[checkEliminarAdmin]','$datos[checkAgregarUsuario]','$datos[checkEliminarUsuario]',
		'$datos[checkAgregarLibro]','$datos[checkEliminarLibro]','$datos[checkPrestamos]')";
			
		$q = mysql_query($sql,Conectar());
		if(!$q){
			echo $q;
			echo 'Error al ejecutar mysql_query';
		}	
	}
	
	public function actualizarPrivilegios($datos,$id){
		if(isset($datos['checkAgregarAdmin'])){
			$datos['checkAgregarAdmin']=true;	
		}else{
			$datos['checkAgregarAdmin']=false;
		}
		if(isset($datos['checkEliminarAdmin'])){
			$datos['checkEliminarAdmin']=true;	
		}else{
			$datos['checkEliminarAdmin']=false;
		}
		if(isset($datos['checkAgregarUsuario'])){
			$datos['checkAgregarUsuario']=true;	
		}else{
			$datos['checkAgregarUsuario']=false;
		}
		if(isset($datos['checkEliminarUsuario'])){
			$datos['checkEliminarUsuario']=true;	
		}else{
			$datos['checkEliminarUsuario']=false;
		}
		if(isset($datos['checkAgregarLibro'])){
			$datos['checkAgregarLibro']=true;	
		}else{
			$datos['checkAgregarLibro']=false;
		}
		if(isset($datos['checkEliminarLibro'])){
			$datos['checkEliminarLibro']=true;	
		}else{
			$datos['checkEliminarLibro']=false;
		}
		if(isset($datos['checkPrestamos'])){
			$datos['checkPrestamos']=true;	
		}else{
			$datos['checkPrestamos']=false;
		}
		
		$sql = "UPDATE privilegios SET agregar_admin='$datos[checkAgregarAdmin]',eliminar_admin='$datos[checkEliminarAdmin]',
		agregar_usuario='$datos[checkAgregarUsuario]',eliminar_usuario='$datos[checkEliminarUsuario]',agregar_libro='$datos[checkAgregarLibro]',
		eliminar_libro='$datos[checkEliminarLibro]',prestamos='$datos[checkPrestamos]' WHERE id='$id'";
		
		$q = mysql_query($sql,Conectar());
		if(!$q){
			echo 'Error al ejecutar mysql_query--';
		}	
	}
	
	public function getId(){
		$rs = mysql_query("SELECT @@identity AS id");
		if ($row = mysql_fetch_row($rs)) {
			$id = trim($row[0]);
			return $id;
		}
	}
	
	public function getDatos($id){
		$array = array();
			$sql = "SELECT * FROM admins WHERE id=".$id;
			$q = mysql_query($sql,Conectar());
			
			if(!$q){
				echo 'Error al ejecutar mysql_query';
			}else{
				/* while($row=mysql_fetch_array($q)){
					//$array[] = $row;
					echo $row['hit'];
				} */
				$sql = "SELECT * FROM privilegios WHERE id=".$id;
				$q2 = mysql_query($sql,Conectar());
				if(!$q){
					echo 'Error al ejecutar mysql_query';
				}else{
					$row = mysql_fetch_assoc($q);
					$row2 = mysql_fetch_assoc($q2);
					/* Now we free up the result and continue on with our script */
				
					$result = (array_merge($row,$row2)); 
					echo json_encode($result);
					//echo json_encode($result);
				}
			}
	}
}
?>