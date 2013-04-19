<?php
if(isset($_POST)){ //Comprueba que en el arreglo post exista algún valor
	$datos = json_decode($_POST['type'],true); //Decodifica el arreglo obtenido
?>
<div id="popEditarLibro" class="ui-dialog-content">
	<form id="formPopEditarLibro">
		<div class="divAgregarDatos">
			<table >
				<tr>
					<td>ID:</td>
					<td><input type="text" name="id" readonly="true" value="<?php echo $datos['id'];?>"></input></td>
					<td>Titulo:</td>
					<td><input type="text" name="titulo" value="<?php echo $datos['titulo'];?>"></input></td>
				</tr><tr>
					<td colspan="2" align="center">Autor:</td>
					<td>Editorial:</td><td><input type="text" name="editorial" value="<?php echo $datos['editorial'];?>"></td>
				</tr><tr>
					<td colspan="2" >
						<textarea rows="2" cols="35" name="autor" style="max-height:45px; max-width:300px" ><?php echo ($datos['autor']);?>
						</textarea>
					</td>
					<td>ISBN:</td>
					<td><input type="text" name="isbn" value="<?php echo $datos['isbn'];?>" class="validarNumeros"></input></td>
				</tr><tr>
					<td>ISSN:</td><td><input type="text" name="issn" value="<?php echo $datos['issn'];?>"></input></td>
					<td>ICCN:</td><td><input type="text" name="iccn" value="<?php echo $datos['iccn'];?>"></input></td>
				</tr><tr>
					<td>Signatura <br>Topograf&iacute;ca:</td>
					<td><input type="text" name="signa_topografica" value="<?php echo $datos['signa_topografica'];?>"></input></td>
					<td>Volumen:</td>
					<td><input type="text" name="volumen" value="<?php echo $datos['volumen'];?>"></input></td>
				</tr><tr>
					<td>Clasificacion:</td><td><input type="text" name="clasificacion" value="<?php echo $datos['clasificacion'];?>"></input></td>
					<td>Serie:</td><td><input type="text" name="serie" value="<?php echo $datos['serie'];?>"></input></td>
				</tr><tr>
					<td>No. Edici&oacute;n:</td><td><input type="text" name="edicion" value="<?php echo $datos['numero_edicion'];?>"></input></td>
					<td>P&aacute;ginas:</td><td><input type="text" name="paginas" value="<?php echo $datos['paginas'];?>"></input></td>
				</tr><tr>
					<td>Lugar de Publicaci&oacute;n:</td>
					<td><input type="text" name="lugar_publicacion" value="<?php echo $datos['lugar_publicacion'];?>"></input></td>
					<td>Tema:</td>
					<td><input type="text" name="tema" value="<?php echo $datos['tema'];?>"></input></td>
				</tr><tr>
					<td>Fecha de Edici&oacute;n:</td><td><input class="date" type="text" name="fecha_edicion" value="<?php echo $datos['fecha_edicion'];?>"></input></td>
					<td>Pa&iacute;s:</td><td><input type="text" name="pais" value="<?php echo $datos['pais'];?>"></input></td>
				</tr><tr>
					<td>Tipo:</td><td><input type="text" name="tipo" value="Libro"></input></td>
					<td>Idioma:</td><td><input type="text" name="idioma" value="<?php echo $datos['idioma'];?>"></input></td>
				</tr><tr>
					<td>Formato:</td><td><input type="text" name="formato" value="<?php echo $datos['formato'];?>"></input></td>
					<td>Tama&ntilde;o</td><td><input type="text" name="tamano" value="<?php echo $datos['tamano'];?>"></input></td>
				</tr><tr>
					<td>Cantidad:</td><td><input type="text" name="cantidad" value="<?php echo $datos['cantidad'];?>"></input></td>
					<td>Precio:</td><td><input type="text" name="precio" value="<?php echo $datos['precio'];?>"></input></td>
				</tr><tr>
					<td>Hit:</td><td><input type="text" name="hit" value="<?php echo $datos['hit'];?>"></input></td>
					<td></td>
				</tr><tr>
					<td colspan="2" align="center">Descripci&oacute;n Fisica: </td>
					<td colspan="2" align="center">Notas:</td>
				</tr><tr>
					<td colspan="2" align="center">
						<textarea rows="6" cols="25" name="descripcion" style="max-height:45px; max-width:250px"><?php echo trim($datos['descrip_fisica']);?>
						</textarea>
					</td>
					<td colspan="2" align="center">
						<textarea rows="6" cols="25" name="notas" style="max-height:45px; max-width:250px"><?php echo $datos['notas'];?>
						</textarea>
					</td>
				</tr>
			</table>
		</div><br>
	</form>
</div>


<div id="popEditarMaterial" class="ui-dialog-content">
	<form id="formPopEditarMaterial" method="post" action="#">
		<div class="divAgregarDatos">
			<table >
				<tr>
					<td>ID:</td>
					<td><input type="text" name="id" readonly="true" value="<?php echo $datos['id'];?>"></input></td>
					<td>Titulo:</td>
					<td><input type="text" name="titulo" value="<?php echo $datos['titulo'];?>"></input></td>
				</tr><tr>
					<td colspan="2" align="center">Autor:</td>
					<td>Clasificaci&oacute;n:</td><td><input type="text" name="clasificacion" value="<?php echo $datos['clasificacion'];?>"></td>
				</tr><tr>
					<td colspan="2" >
						<textarea rows="2" cols="28" name="autor" style="max-height:45px; max-width:274px" ><?php echo ($datos['autor']);?>
						</textarea>
					</td>
					<td>Signatura <br>Topograf&iacute;ca:</td>
					<td><input type="text" name="signaTopo" value="<?php echo $datos['signa_topografica'];?>"></td>
				</tr><tr>
					<td>Tipo:</td><td><input type="text" name="tipo" value="<?php echo $datos['tipo'];?>"></input></td>
					<td>Pa&iacute;s:</td><td><input type="text" name="pais" value="<?php echo $datos['pais'];?>"></input></td>
				</tr><tr>
					<td>Tema:</td><td><input type="text" name="tema" value="<?php echo $datos['tema'];?>"></input></td>
					<td>Formato:</td><td><input type="text" name="formato" value="<?php echo $datos['formato'];?>"></input></td>
				</tr><tr>
					<td>Idioma:</td><td><input type="text" name="idioma" value="<?php echo $datos['idioma'];?>"></input></td>
					<td>Cantidad:</td><td><input type="text" name="cantidad" value="<?php echo $datos['cantidad'];?>"></input></td>
				</tr><tr>
					<td>Tama&ntilde;o:</td><td><input type="text" name="tamano" value="<?php echo $datos['tamano'];?>"></input></td>
					<td>Precio:</td><td><input type="text" name="precio" value="<?php echo $datos['precio'];?>"></input></td>
				</tr><tr>
					<td>Hits:</td><td><input type="text" name="hit" value="<?php echo $datos['hit'];?>"></input></td>
				</tr><tr>
					<td colspan="2" align="center">Descripci&oacute;n Fisica: </td>
					<td colspan="2" align="center">Notas:</td>
				</tr><tr>
					<td colspan="2" align="center">
						<textarea rows="6" cols="25" name="descripcion" style="max-height:45px; max-width:250px"><?php echo trim($datos['descrip_fisica']);?>
						</textarea>
					</td>
					<td colspan="2" align="center">
						<textarea rows="6" cols="25" name="notas" style="max-height:45px; max-width:250px"><?php echo $datos['notas'];?>
						</textarea>
					</td>
				</tr>
			</table>
		</div><br>
	</form>
</div>

<div id="popEditarUsuario" class="ui-dialog-content">
	<form id="formPopEditarUsuario">
		<div class="divAgregarDatos">
			<table>
				<tr>
					<td rowspan="2" colspan="2" align="center"><img src="<?php echo $datos['fotografia'];?>" width="100px" height="100px"></td>
					<td>ID:</td>
					<td><input type="text" name="id" readonly="true" value="<?php echo $datos['id'];?>"</td>
				</tr><tr>
					<td>Nombre:</td>
					<td><input type="text" name="nombre" value="<?php echo $datos['nombre'];?>"</td>
				</tr><tr>
					<td>Apellido Paterno:</td>
					<td><input type="text" name="a_paterno" value="<?php echo $datos['a_paterno'];?>"</td>
					<td>Apellido Materno:</td>
					<td><input type="text" name="a_materno" value="<?php echo $datos['a_materno'];?>"</td>
				</tr><tr>
					<td>Sexo:</td>
					<td><input type="text" name="sexo" value="<?php echo $datos['sexo'];?>"</td>
					<td>Tel&eacute;fono Particular:</td>
					<td><input type="text" name="telefono_particular" value="<?php echo $datos['telefono_particular'];?>"</td>
				</tr><tr>
					<td>Tel&eacute;fono 2:</td>
					<td><input type="text" name="telefono_2" value="<?php echo $datos['telefono_2'];?>"</td>
					<td>Tel&eacute;fono Trabajo:</td>
					<td><input type="text" name="telefono_trabajo" value="<?php echo $datos['telefono_trabajo'];?>"</td>
				</tr><tr>
					<td>Fecha de Nacimiento:</td>
					<td><input type="text" name="fecha_nacimiento" value="<?php echo $datos['fecha_nacimiento'];?>"</td>
					<td>C&oacute;digo Postal:</td>
					<td><input type="text" name="codigo_postal" value="<?php echo $datos['codigo_postal'];?>"</td>
				</tr><tr>
					<td>Direacci&oacute;n:</td>
					<td><input type="text" name="direccion" value="<?php echo $datos['direccion'];?>"</td>
					<td>Estado:</td>
					<td><input type="text" name="estado" value="<?php echo $datos['estado'];?>"</td>
				</tr><tr>
					<td>Ocupaci&oacute;n:</td>
					<td><input type="text" name="ocupacion" value="<?php echo $datos['ocupacion'];?>"</td>
					<td>Carrera:</td>
					<td><input type="text" name="carrera" value="<?php echo $datos['carrera'];?>"</td>
				</tr><tr>
					<td>Escuela:</td>
					<td><input type="text" name="escuela" value="<?php echo $datos['escuela'];?>"</td>
					<td>Email:</td>
					<td><input type="text" name="e_mail" value="<?php echo $datos['e_mail'];?>"</td>
				</tr><tr>
					<td>Semestre:</td>
					<td><input type="text" name="semestre" value="<?php echo $datos['semestre'];?>"</td>
					<td>Fecha de Registro:</td>
					<td><input type="text" name="fecha_registro" value="<?php echo $datos['fecha_registro'];?>"</td>
				</tr><tr>
					<td>Usuario:</td>
					<td><input type="text" name="usuario" value="<?php echo $datos['usuario'];?>"</td>
					<td>Contrase&ntilde;a:</td>
					<td><input type="text" name="contrasena" value="<?php echo $datos['contrasena'];?>"</td>
				</tr>
			</table>
		</div>
	</form>
</div>

<div id="popEditarAdmin" class="ui-dialog-content">
	<form id="formPopEditarAdmin">
		<div class="divAgregarDatos">
			<table border="1">
				<tr>
					<td>ID:</td>
					<td><input type="text" readonly="true" name="id" value="<?php echo $datos['id'];?>"</td>
					<td>Nombre:</td>
					<td><input type="text" name="nombre" value="<?php echo $datos['nombre'];?>"</td>
				</tr><tr>
					<td>Apellidos:</td>
					<td><input type="text" name="apellidos" value="<?php echo $datos['apellidos'];?>"</td>
					<td>Cargo:</td>
					<td><input type="text" name="cargo" value="<?php echo $datos['cargo'];?>"</td>
				</tr><tr>
					<td>Fecha de Registro:</td>
					<td><input type="text" name="fecha_registro" value="<?php echo $datos['fecha_registro'];?>"</td>
					<td></td>
					<td></td>
				</tr><tr>
					<td>Usuario:</td>
					<td><input type="text" name="usuario" value="<?php echo $datos['usuario'];?>"</td>
					<td>Contrase&ntilde;a:</td>
					<td><input type="text" name="contrasena" value="<?php echo $datos['contrasena'];?>"</td>
				</tr>
			</table>
			Privilegios
			<table>
				<tr>
					<td><input type="checkbox" name="checkAgregarAdmin" value="ok" <?php if($datos['agregar_admin']==1){echo "checked";}?>/>Agregar Administrador</td>
					<td><input type="checkbox" name="checkEliminarAdmin" value="ok"<?php if($datos['eliminar_admin']==1){echo "checked";}?>/>Eliminar Administrador</td>
					<td><input type="checkbox" name="checkAgregarUsuario" value="ok" <?php if($datos['agregar_usuario']==1){echo "checked";}?>/>Agregar Usuario</td>
                    <td><input type="checkbox" name="checkEliminarUsuario" value="ok" <?php if($datos['eliminar_usuario']==1){echo "checked";}?>/>Eliminar Usuario</td>
				</tr><tr>
					<td><input type="checkbox" name="checkAgregarLibro" value="ok" <?php if($datos['agregar_libro']==1){echo "checked";}?>/>Agregar Libro</td>
                    <td><input type="checkbox" name="checkEliminarLibro" value="ok" <?php if($datos['eliminar_libro']==1){echo "checked";}?>/>Eliminar Libro</td>
					<td><input type="checkbox" name="checkPrestamos" value="ok" <?php if($datos['prestamos']==1){echo "checked";}?>/>Realizar Prestamos</td>
				</tr>
			</table>
		</div>
	</form>
</div>

<?php
}else{
?>
<div id="popEditarAdmin" class="ui-dialog-content">
	<form id="formPopEditarAdmin">
		<div class="divAgregarDatos">
			Error en la lectura de Datos
		</div>
	</form>
</div>

<div id="popEditarLibro" class="ui-dialog-content">
	<form id="formPopEditarLibro">
		<div class="divAgregarDatos">
			Error en la lectura de Datos
		</div>
	</form>
</div>


<div id="popEditarMaterial" class="ui-dialog-content">
	<form id="formPopEditarMaterial">
		<div class="divAgregarDatos">
			Error en la lectura de Datos
		</div>
	</form>
</div>

<div id="popEditarUsuario" class="ui-dialog-content">
	<form id="formPopEditarUsuario">
		<div class="divAgregarDatos">
			Error en la lectura de Datos
		</div>
	</form>
</div>
	<?php
}
?>