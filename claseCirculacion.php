<?php
	require_once('conexion.php');
	
	class Prestamo{
		
		function agregarDatos($datos){
		
			if($datos['signaTopo']=='' or $datos['txtIdUsuario']=='' or $datos['fechaPrestamo']=='' or $datos['fechaEntrega']==''){
				die ("Error - No ha completado los campos requeridos");
			}
			
			if($datos['tipo']=='libro'){
				$signaTopo=$datos['signaTopo'];
				$sql = "SELECT * FROM libros WHERE signa_topografica='$signaTopo'";
			}else if($datos['tipo']=='material'){
				$signaTopo=$datos['signaTopo'];
				$sql = "SELECT * FROM material WHERE signa_topografica='$signaTopo'";
			}
			
			$q = mysql_query($sql,Conectar());
			if(!mysql_num_rows($q)){
					die("Error - no se encuentra ningun $datos[tipo] con la singnatura topografica $signaTopo ");
			}
			if(!$q){
				echo "Error en seleccionar la tabla Libro o Material";
			}else{
				$q = mysql_fetch_array($q);
				$id = $q['id'];
				if(substr($q['signa_topografica'],0,1)=='C' || substr($q['signa_topografica'],0,1)=='c'){ //verifica que el libro sea de prestamo
					echo "Error - Los libros de consulta no se pueden prestar";
				}else if($q['cantidad']>0){
					$sql = "INSERT INTO historial (signa_topografica,tipo,id_persona,dia_sacado,dia_regreso,estado,comentario)
					VALUES('$signaTopo','$datos[tipo]','$datos[txtIdUsuario]','$datos[fechaPrestamo]',
					'$datos[fechaEntrega]','prestado','$datos[txtNotas]')";
					$q = mysql_query($sql,Conectar());
					if(!$q){
						echo 'Error en la consulta';
					}				
					
					if($datos['tipo']=='material'){
						$sql = "UPDATE material SET cantidad = IFNULL(cantidad,0) - 1 WHERE id=$id";
					}else if($datos['tipo']=='libro'){
						$sql = "UPDATE libros SET cantidad = IFNULL(cantidad,0) -1 WHERE id=$id";
					}
			
					$q = mysql_query($sql,Conectar());
					if(!$q){
						echo 'Error en decrementar la cantidad';
					}
				}else{
					echo "Error , la existencia de este recurso se encuentra agotado";
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
		
		public function capturaEntrada($datos){
			/* if($datos['tipo']=='libro'){
				$idLibro=$datos['idRecurso'];
				$idMaterial=0;
			}else if($datos['tipo']=='material'){
				$idMaterial=$datos['idRecurso'];
				$idLibro=0;
			} */
			$sql = "SELECT * FROM historial WHERE tipo='$datos[tipo]' AND signa_topografica='$datos[idRecurso]' 
			        AND id_persona='$datos[idUsuario]' AND estado='prestado'";
			
			$q = mysql_query($sql,Conectar());
			
			if(!$q){
				echo 'Error en la consulta';
			}else{
				$resultado = mysql_fetch_array($q);
				$num = mysql_num_rows($q);
				//die("Error ".$sql);
				if($num/*$resultado['estado']=='prestado'*/) {
					$id = $resultado['id'];
					
					$fechaActual = date("Y-m-d");
					$sql = "UPDATE historial SET estado='recibido', dia_regresado='$fechaActual' WHERE id='$id'";	
					$q = mysql_query($sql,Conectar());
					
					if(!$q){
						echo "Error en al cambiar el estado del historial";
					}
					
					if($datos['tipo']=='libro'){
						$sql = "UPDATE libros SET cantidad = cantidad +1 ";
					}else if($datos['tipo']=='material'){
						$sql = "UPDATE material SET cantidad = cantidad +1";
					}
					$q = mysql_query($sql,Conectar());
					if(!$q){
						echo "Error en al incromentar valores de los recursos";
					}
					
				}else{
					echo 'Error, el prestamo no se ha realizado - ';
				}
			}
		}
	}
?>