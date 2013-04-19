<?php
	
	
	function codeGenerator($datos,$con){
		
		$content = "<page>";
		$array = array();
		$edad = $datos['edad'];
		$sexo = $datos['sexo'];
		$ocupacion = $datos['ocupacion'];
		$signaturaTopo = $datos['signaTopo'];
		$tipo = $datos['tipo'];
		$fechaPrestamoIni = $datos['prestaFechaIni'];
		$fechaPrestamoFin = $datos['prestaFechaFin'];
		$fecha = date("d \d\e\l m \d\e\l Y");
		$num = 1;
		
		if($edad=="nino"){
			$msjEdad = "ni&ntilde;o";
		}
		if($edad=="todas"){
			$msjEdad = "Todas";
		}
		if($ocupacion==""){
			$ocupacion="Todas";
		}
		if($signaturaTopo==""){
			$signaturaTopo="Todas";
		}
		if($fechaPrestamoIni=="" and $fechaPrestamoFin==""){
			$rangoTiempo = "Todas";
		}else{
			$rangoTiempo =$fechaPrestamoIni." a ".$fechaPrestamoFin;
		}
		
		//array_walk($datos,'test_print');
		$content .= "<table><tr>";
		$content .= "<td><img src='../../img/logo.png' width='150' height='100'></td>";
		$content .= "<td><font style='font-size:25pt;font-weight: bold;'>BIBLIOTECA LOS MANGOS</font></td>";
		$content .= "<td valign='top' style='text-decoration:underline;'>".$fecha."</td>";
		$content .= "</tr></table>";
		$content .= "<br>";
		//fin Header
		$content .= "<table><tr>";
		$content .= "<td style='font-weight:bold;' width='230' align='left'>Usuarios</td>";
		$content .= "<td style='font-weight:bold;' width='230' align='left'>Recursos</td>";
		$content .= "<td style='font-weight:bold;' width='200' align='left'>Tiempo</td>";
		$content .= "</tr><tr>";
		$content .= "<td align='left' ><font style='font-weight:bold; '>Rango de Edad: </font>".$msjEdad."</td>";
		$content .= "<td align='left' ><font style='font-weight:bold; '>Tipo: </font>".$tipo."</td>";
		$content .= "<td align='left' ><font style='font-weight:bold; '>Rango de fecha: </font>".$rangoTiempo."</td>";
		$content .= "</tr><tr>";
		$content .= "<td align='left' ><font style='font-weight:bold; '>Sexo: </font>".$sexo."</td>";
		$content .= "<td align='left' ><font style='font-weight:bold; '>Signatura Topogr&aacute;fica: </font>".$signaturaTopo."</td>";
		$content .= "<td ></td>";
		$content .= "</tr><tr>";
		$content .= "<td align='left' ><font style='font-weight:bold; '>Ocupaci&oacute;n: </font>".$ocupacion."</td>";
		$content .= "<td ></td>";
		$content .= "<td ></td>";
		$content .= "</tr></table>";
		$content .="<hr><hr>";
		//fin subHeader
					
		$content.=consulta($edad,$sexo,$ocupacion,$signaturaTopo,$tipo,$fechaPrestamoIni,$fechaPrestamoFin,$con);
			
		$content .="<tr>";
		$content .="</tr></table>";
		$content.="<br><hr><table ><tr>";
		$content.="<td width='750'align='center'> <i>Despierta y Lee</i></td>";
		$content.="</tr></table>";
		$content .= "</page>";
		return $content;
	}
	function getNombre($id,$con){
		$sql = "SELECT * FROM usuarios WHERE id='$id'";
		$q = mysql_query($sql,$con);
		if(!$q){
			return $sql;
		}
		$result = mysql_fetch_array($q);
		
		return $result['nombre'];
	}
	function getEdad($id,$con){
		$sql = "SELECT * FROM usuarios WHERE id='$id'";
		$q = mysql_query($sql,$con);
		$result = mysql_fetch_array($q);
		$fecha_actual = date('Y/m/d'); 
		$edad = ($fecha_actual-$result['fecha_nacimiento']);
		return $edad;
	}
	function consulta($edad,$sexo,$ocupacion,$signaturaTopo,$tipo,$fechaPrestamoIni,$fechaPrestamoFin,$con){
		$fecha = date("Y-m-d");
		$num = 1;
		if($signaturaTopo!='Todas'){
			$sqlST="signa_topografica='$signaturaTopo' and ";
		}else{
			$sqlST="";
		}
		switch($tipo){
			case 'todos':
				$sqlT="";
				break;
			case 'libros':
				$sqlT="tipo='libro' and ";
				break;
			case 'material':
				$sqlT="tipo='material' and ";
				break;
			default:
				$sqlT="Error - no debio llegar aquí";
		}
		if($fechaPrestamoIni=="" and $fechaPrestamoFin==""){
				$sqlFecha="";
			}else if($fechaPrestamoIni!="" and $fechaPrestamoFin==""){
				if($sqlUser!="" or $sqlTipo!=""){
					$sqlFecha="and dia_sacado > '$fechaPrestamoIni' ";
				}else{
					$sqlFecha="'dia_sacado > '$fechaPrestamoIni' ";
				}
			}else if($fechaPrestamoIni=="" and $fechaPrestamoFin!=""){
				if($sqlUser!="" or $sqlTipo!=""){
					$sqlFecha="and dia_sacado < '$fechaPrestamoFin' ";
				}else{
					$sqlFecha="dia_sacado < '$fechaPrestamoFin'";
				}
			}else if($fechaPrestamoIni!="" and $fechaPrestamoFin!=""){
				if($sqlUser!="" or $sqlTipo!=""){
					$sqlFecha="and dia_sacado > '$fechaPrestamoIni' and dia_sacado < '$fechaPrestamoFin' ";
				}else{
					$sqlFecha="dia_sacado > '$fechaPrestamoIni' and dia_sacado < '$fechaPrestamoFin'";
				}
			}else{
				$sqlFecha="";
			}
		switch($edad){
			case "todas":
				$sqlEdad = "";
				break;
			case "nino":
				$fecha_de_inicio = date('Y-m-d');
				$fecha_de_fin = date('Y-m-d', strtotime('-13 year'));
				$sqlEdad = "fecha_nacimiento > '$fecha_de_fin' and ";
				break;
			case "adolecente":
				$fecha_de_inicio = date('Y-m-d', strtotime('-13 year'));
				$fecha_de_fin = date('Y-m-d', strtotime('-18 year'));
				$sqlEdad = "fecha_nacimiento > '$fecha_de_fin' and fecha_nacimiento < '$fecha_de_inicio' and ";
				break;
			case "adulto_joven":
				$fecha_de_inicio = date('Y-m-d', strtotime('-18 year'));
				$fecha_de_fin = date('Y-m-d', strtotime('-30 year'));
				$sqlEdad = "fecha_nacimiento > '$fecha_de_fin' and fecha_nacimiento < '$fecha_de_inicio' and ";
				break;
			case "adulto_mayor":
				$fecha_de_inicio = date('Y-m-d', strtotime('-30 year'));
				$fecha_de_fin = date('Y-m-d', strtotime('-60 year'));
				$sqlEdad = "fecha_nacimiento > '$fecha_de_fin' and fecha_nacimiento < '$fecha_de_inicio' and ";
				break;
			case "edad3":
				$fecha_de_inicio = date('Y-m-d', strtotime('-60 year'));
				$fecha_de_fin = date('Y-m-d', strtotime('-60 year'));
				$sqlEdad = "fecha_nacimiento < '$fecha_de_inicio' and ";
				break;
			default:
				$sqlEdad = "";
		}	
		switch($sexo){
			case 'Masculino':
			case 'Femenino':
				$sqlSexo .= "sexo = '$sexo' and ";
				break;
			default:
				$sqlSexo = "";
		}
		switch($ocupacion){
			case 'Todas':
				$sqlOcupacion = "";
				break;
			default:
				$sqlOcupacion .= "ocupacion LIKE '%$ocupacion%'";
		}
		$preSqlUser= rtrim($sqlEdad.$sqlSexo.$sqlOcupacion," and");
		$preSql=rtrim($sqlST.$sqlT.$sqlFecha," and");
		if($sqlST!='' or $sqlT!='' or $sqlFecha!=''){
			$preSql="WHERE ".$preSql;
		}
		if($sqlEdad!='' or $sqlSexo!='' or $sqlOcupacion!=''){
			$preSqlUser=" and ".$preSqlUser;
		}
		
		$sql = "SELECT * FROM historial ".$preSql;
		$q = mysql_query($sql,$con) or die("Error en la consulta MySQL");
		$content = "";
		$resultado = true;
			$content .="<br><table border='1' ><tr>";
			$content .="<th>Num</th>";
			$content .="<th>ID</th>";
			$content .="<th width='30'>Tipo</th>";
			$content .="<th>Signatura Topogr&aacute;fica</th>";
			$content .="<th>D&iacute;a Prestado</th>";
			$content .="<th>D&iacute;a Regresado</th>";
			$content .="<th>Id Usuario</th>";
			$content .="<th align='center' width='200'>Nombre</th>";
			$content .="<th>Edad</th></tr>";
		while($datos = mysql_fetch_array($q)){
			$sql="SELECT * FROM usuarios WHERE id='$datos[id_persona]'".$preSqlUser;
			$result = mysql_query($sql,$con) or die("Error en la consulta MySQL en Usuarios");
			$datosUser = mysql_fetch_array($result);
			if(mysql_num_rows($result)!=0){
				$content .="<tr><td align='center'>".$num++."</td>";
				$content .="<td align='center'>".$datos['id']."</td>";
				$content .="<td align='center'>".$datos['tipo']."</td>";
				$content .="<td align='center'>".$datos['signa_topografica']."</td>";
				$content .="<td align='center'>".$datos['dia_sacado']."</td>";
				$content .="<td align='center'>".$datos['dia_regreso']."</td>";
				$content .="<td align='center'>".$datos['id_persona']."</td>";
				$content .="<td align='center'>".$datosUser['nombre']."</td>";
				$edad = ($fecha - $datosUser['fecha_nacimiento']) ;
				$content .="<td align='center'>".$edad."</td></tr>";
			}else{
				$resultado = false;
			}
		}
		
		if($resultado==false){
			$content .="<tr><td align='center' colspan='9'><br>No se encontraron resultados con los parametros indicados<br>.</td></tr>";
			//$content .="<tr><td align='center' colspan='9'><br>$sql<br>.</td></tr>";
		}
		return $content;
	}
	function test_print($elemento2, $clave){
		echo "$clave. $elemento2<br />\n";
	}

