<?php
	require_once 'conexion.php"';
	
	class Material{
		var $datos = array("autor", "titulo", "cantidad","clasificacion", "precio", "signa_topografica","tema","pais",
						   "idioma","tamano","descrip_fisica","tipo","formato","notas");
		
		var $tabla;
		
		function __construct($tabla){
			$this->tabla=$tabla;
		}
			
		public function agregarDatos($datos){
			if($datos['txtTitulo']==''){
				die ("Error - debe especificar un Titulo");
			}
		
			$sql = "SELECT * FROM $this->tabla WHERE signa_topografica='$datos[txtSignaTopo]'";
			$q = mysql_query($sql,Conectar());
			
			if(!$q){
				die ('Error al ejecutar mysql_query');
			}
			$q = mysql_fetch_array($q);
			if($q['signa_topografica']==$datos['txtSignaTopo']){
				die ("Error - La signatura topografica ".$datos['txtSignaTopo']. " ya existe");
			}
			
			$sql= "INSERT INTO $this->tabla (";
			foreach($this->datos as $elementos){
				$sql.=$elementos.",";
			}
			$sql= trim($sql,',');
			$sql.=")VALUES(";
			$sql.="'$datos[txtAutor]', '$datos[txtTitulo]', '$datos[numCantidad]', '$datos[txtClasificacion]', '$datos[txtPrecio]', 
			       '$datos[txtSignaTopo]','$datos[txtTema]','$datos[txtPais]','$datos[txtIdioma]', '$datos[txtTamano]', 
			       '$datos[txtDescrip_fisica]','$datos[txtTipo]','$datos[txtFormato]','$datos[txtNotas]')";
			
			$q = mysql_query($sql,Conectar());
			
			if(!$q){
				echo 'Error al ejecutar mysql_query';
			}
		}
		
		public function eliminarDatos($id){	
			$sql = "DELETE FROM $this->tabla WHERE id = '$id'";
			$q = mysql_query($sql,Conectar());
			
			if(!$q){
				echo 'Error al ejecutar mysql_query';
			}
		}
		
		public function actualizarDatos($datos,$id){
		
			if($datos['titulo']==''){
				die ("Error - debe especificar un Titulo");
			}
			
			
			$sql = "SELECT * FROM $this->tabla WHERE signa_topografica='$datos[signaTopo]'";
			$q = mysql_query($sql,Conectar());
			
			if(!$q){
				die ('Error al ejecutar mysql_query');
			}
			$q = mysql_fetch_array($q);
			if($q['signa_topografica']==$datos['signaTopo'] and $q['id']!=$id){
				die ("Error - La signatura topografica ".$datos['signaTopo']. " ya existe");
			}
			

			$sql = "UPDATE $this->tabla SET autor='$datos[autor]', titulo='$datos[titulo]', cantidad='$datos[cantidad]', 
			        precio='$datos[precio]', clasificacion='$datos[clasificacion]', signa_topografica='$datos[signaTopo]',
					tema='$datos[tema]',pais='$datos[pais]', idioma='$datos[idioma]', tamano='$datos[tamano]', descrip_fisica='$datos[descripcion]', 
					tipo='$datos[tipo]', formato='$datos[formato]',notas='$datos[notas]',hit='$datos[hit]' WHERE id='$id'";		
			
			$q = mysql_query($sql,Conectar());
			
			if(!$q){
				echo 'Error al ejecutar mysql_query';
			}	
		}
		
		public function getDatos($id){
			$array = array();
			$sql = "SELECT * FROM $this->tabla WHERE id=".$id;
			$q = mysql_query($sql,Conectar());
			
			if(!$q){
				echo 'Error al ejecutar mysql_query';
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
		
		public function agregarHit($id){
			Conectar();
			$sql = mysql_query("UPDATE $this->tabla SET hit=hit+1 WHERE id='$id'");
			
			$q = mysql_query($sql,Conectar());
			
			if(!$q){
				echo 'Error al ejecutar mysql_query';
			}			
		}
		
		public function resetearHit($id){
			Conectar();
			$sql = mysql_query("UPDATE $this->tabla SET hit=0 WHERE id='$id'");
			
			$q = mysql_query($sql,Conectar());
				
			if(!$q){
				echo 'Error al ejecutar mysql_query';
			}		
		}
	}
	
	class Libro extends Material{
		
		var $datos = array("autor", "titulo", "cantidad","clasificacion", "precio", "signa_topografica","tema","editorial","lugar_publicacion",
							"fecha_edicion","pais","idioma","tamano","descrip_fisica","formato","notas","isbn","issn","iccn","volumen",
							"serie","numero_edicion","paginas");
		
		
		public function verDatos($datos){
			echo $datos['txtAutor'];
		}
		
		public function agregarDatos($datos){
			if($datos['txtTitulo']==''){
				die ("Error - debe especificar un Titulo");
			}
		
			$sql = "SELECT * FROM $this->tabla WHERE signa_topografica='$datos[txtSignaTopo]'";
			$q = mysql_query($sql,Conectar());
			
			if(!$q){
				die ('Error al ejecutar mysql_query');
			}
			$q = mysql_fetch_array($q);
			if($q['signa_topografica']==$datos['txtSignaTopo']){
				die ("Error - La signatura topografica ".$datos['txtSignaTopo']. " ya existe");
			}
			
			$sql= "INSERT INTO $this->tabla (";
			foreach($this->datos as $elementos){
				$sql.=$elementos.",";
			}
			$sql= trim($sql,',');
			$sql.=")VALUES(";
			
			$sql.="'$datos[txtAutor]', '$datos[txtTitulo]', '$datos[numCantidad]', '$datos[txtClasificacion]', '$datos[txtPrecio]',
			       '$datos[txtSignaTopo]','$datos[txtTema]','$datos[txtEditorial]','$datos[txtLugarPublicacion]', 
			       '$datos[txtFechaEdicion]', '$datos[txtPais]','$datos[txtIdioma]','$datos[txtTamano]',
			       '$datos[txtDescripcionFisica]','$datos[txtFormato]','$datos[txtNotas]','$datos[txtISBN]','$datos[txtISSN]',
				   '$datos[txtICCN]','$datos[txtVolumen]','$datos[txtSerie]','$datos[numEdicion]','$datos[numPaginas]')";
			
			$q = mysql_query($sql,Conectar());
			
			if(!$q){
				echo 'Error al ejecutar mysql_query';
			}	
		}
		
		public function actualizarDatos($datos,$id){
			if($datos['titulo']==''){
				die ("Error - debe especificar un Titulo");
			}
			
			$sql = "SELECT * FROM $this->tabla WHERE signa_topografica='$datos[signa_topografica]'";
			$q = mysql_query($sql,Conectar());
			
			if(!$q){
				die ('Error al ejecutar mysql_query');
			}
			$q = mysql_fetch_array($q);
			if($q['signa_topografica']==$datos['signa_topografica'] and $q['id']!=$id){
				die ("Error - La signatura topografica ".$datos['signa_topografica']. " ya existe");
			}
			
			$sql = "UPDATE $this->tabla SET autor='$datos[autor]', titulo='$datos[titulo]', cantidad='$datos[cantidad]', 
			        clasificacion='$datos[clasificacion]', precio='$datos[precio]', signa_topografica='$datos[signa_topografica]',
					tema='$datos[tema]', editorial='$datos[editorial]', lugar_publicacion='$datos[lugar_publicacion]',
					idioma='$datos[idioma]', tamano='$datos[tamano]', descrip_fisica='$datos[descripcion]', 
					formato='$datos[formato]',notas='$datos[notas]', isbn='$datos[isbn]', issn='$datos[issn]', 
					iccn='$datos[iccn]', volumen='$datos[volumen]', serie='$datos[serie]', 
					numero_edicion='$datos[edicion]',hit='$datos[hit]' WHERE id='$id'";		
			
			$q = mysql_query($sql,Conectar());
			
			if(!$q){
				echo 'Error al ejecutar mysql_query';
			}	
		}
		
	}
	
?>