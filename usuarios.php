			<div id="divUsuarios">
                	<section id="sectionPrincipalUsuarios" class="sectionPrincipal" align="center">
                    	<div id="divBusquedaUsuarios">
                		<b style="margin-right:400px">Usuarios:</b>
                    	<div id="divBusquedaRapidaUsuarios" class="divAgregarDatos">
                    		<center>
                            <b>Búsqueda Simple</b><br>
                            Palabra(s):
                            	<form id="formBusquedaUsuarios">
                                	<input type="text" name="txtPalabra">
                                    <input type="submit" value="Buscar">
                                </form>
                            </center><br>
                    	</div><br>
                        	<b>Búsqueda Avanzada</b>
                        	<a href="#" id="btnBusquedaAvanzadaUsuarios"><img src="img/btn_avanzado.png" alt="avanzada"></a>
                            <br>
                        <div id="divBusquedaAvanzadaUsuarios" class="divAgregarDatos">
                        	<center><form id="formBusquedaUsuariosAvanzada" method="post">
                            <br>
                            	<table >
                                	<tr>
                                    	<td>Nombre(s):</td><td>Código:</td>
                                    </tr><tr>
                                        <td><input type="text" name="nombre"></td><td><input type="text" name="id"></td>
                                    </tr><tr>
                                    	<td>Apellido Paterno:</td><td>E-mail:</td>
                                    </tr><tr>
                                        <td><input type="text" name="a_paterno"></td><td><input type="text" name="e_mail"></td>
                                    </tr><tr>
                                    	<td>Usuario:</td><td>Dirección:</td>
                                    </tr><tr>
                                    	<td><input type="text" name="usuario"></td><td><input type="text" name="direccion"></td>
                                    </tr><tr>
                                    	<td>Tipo:</td>
                                        <td align="right"><input type="reset" value="Borrar"></td>
                                    </tr><tr>
                                    	<td><select name="tipo">
											<option value="usuario">Usuario</option>
											<option value="admin">Administrador</option>
											</select>
										</td>
                                        <td align="right"><input type="submit" value="Buscar"></td>
                                    </tr>
                                    <tr></tr>
                                    <tr></tr>
                                    <tr></tr>
                                    <tr></tr>
                                    <tr></tr>
                                    <tr></tr>
                                    <tr></tr>
                                    <tr></tr>
                                </table>
                            </center></form>
                        </div><br>
                        </div>
                        <div id="divAgregarUsuario">
                        	<b style="margin-right:300px">Agregar Usuario</b>
                            <form id="agregarUsuario" method="post"  enctype="multipart/form-data">
                              <br>
                            	<div class="divAgregarDatos">
                                <center><table>
                                	<tr>
                                    	<td>Nombre(s):</td><td>Apellido Paterno:</td>
                                    </tr><tr>
                                    	<td><input type="text" name="txtNombre"></td><td><input type="text" name="txtApellidoP"></td>
                                    </tr><tr>
                                    	<td>Apellido Materno:</td><td>Fecha Nacimiento:</td>
                                    </tr><tr>
                                    	<td><input type="text" name="txtApellidoM"></td>
                                        <td><input type="text" class="date" name="fechaNacimiento" maxlength="0"></td>
                                    </tr><tr>
                                    	<td>Sexo:</td><td>Código Postal:</td>
                                    </tr><tr>
                                    	<td><select name="txtSexo">
                                        		<option value="Masculino">Masculino</option>
                                                <option value="Femenino">Femenino</option>
                                            </select></td>
                                        <td><input type="text" class="validarNumeros" name="numCodigoPostal"></td>
                                    </tr><tr>
                                    	<td>Teléfono Particular:</td><td>Teléfono Trabajo:</td>
                                    </tr><tr>
                                    	<td><input type="text" class="validarNumeros" name="telParticular"></td>
                                        <td><input type="text" class="validarNumeros" name="telTrabajo"></td>
                                    </tr><tr>
                                    	<td>Teléfono 2:</td><td>Ocupación:</td>
                                    </tr><tr>
                                    	<td><input type="text" class="validarNumeros" name="tel2"></td>
                                        <td><input type="text" name="txtOcupacion"></td>
                                    </tr><tr>
                                    	<td>E-mail:</td><td>Carrera:</td>
                                    </tr><tr>
                                    	<td><input type="text" name="txtEmail"></td>
                                        <td><input type="text" name="txtCarrera"></td>
                                    </tr><tr>
                                    	<td>Nombre de escuela:</td><td>Semestre:</td>
                                    </tr><tr>
                                    	<td><input type="text" name="txtNomEsc"></td><td><input type="text" name="txtSemestre"></td>
                                    </tr><tr>
                                    	<td>Usuario:</td><td>Contraseña:</td>
                                    </tr><tr>
                                    	<td><input type="text" name="txtUsuario"></td><td><input type="text" name="txtContrasena"></td>
                                    </tr><tr>
                                    	<td colspan="2">Dirección:</td>
                                    </tr><tr>
                                    	<td colspan="2">
                                        	<textarea rows="3" cols="45" wrap="virtual" name="txtDireccion" style="max-height:25px; max-width:400px"></textarea>
                                        </td>
                                    </tr>
                                <center></table><br>
                        		</div><br>
                                <div class="divAgregarDatos">
                                	<table>
                                    	<tr>
                                        	<td rowspan="3"><img src="img/Libro.png" height="60" width="100"></td>
                                            <td colspan="2"><b>Imagen para mostrar</b></td>
                                        </tr><tr>
                                        	<td><a id="aAgregarImagen">Agregar Imagen:</a></td>
                                            <td><input type="file" accept="image/jpeg ,image/jpg , image/gif, image/png , image/bmp" name="foto"></td>  
											<input type="hidden" name="form" value="agregarUsuario">
                                        </tr>
                                    </table>
                                </div><br>
                                <div class="divAgregarDatos" align="center">
                                	<table width="80%">
                                    	<tr align="center"><td><input type="reset" value="Borrar" /></td>
                                        <td><input type="submit" value="Crear" /></td></tr>
                                    </table>
                                </div><br />
                            </form>
                        </div>
                        <div id="divAgregarAdmin" align="center">
                        	<b style="margin-right:300px">Agregar Administrador</b>
                            <form id="agregarAdmin" method="post">
                              <br>
                            	<div class="divAgregarDatos">
                                	<table>
                                    	<tr>
                                        	<td>Nombre(s):</td><td>Apellidos:</td><td>Usuario:</td>
                                        </tr><tr>
                                        	<td><input type="text" name="txtNombre" /></td>
                                            <td><input type="text" name="txtApellidos"/></td>
                                            <td><input type="text" name="txtUsuario" /></td>
                                        </tr><tr>
                                        	<td>Fecha Registro:</td><td>Cargo:</td><td>Contraseña:</td>
                                        </tr><tr>                           	
                                            <td><input type="text" class="date" name="txtRegistro"/></td>
                                        	<td><input type="text" name="txtCargo" /></td>
                                            <td><input type="text" name="txtContrasena" /></td>
											<input type="hidden" name="form" value="agregarAdmin" />
                                        </tr>
                                    </table>
                                </div><br />
                                <div class="divAgregarDatos" align="center">
                                	<b>Permisos:</b>
                                      <br><br>
                                	<table align="center" width="100%">
                                    	<tr>
                                        	<td><input type="checkbox" name="checkAgregarAdmin" value="ok"/> Agregar Administrador</td>
                                           <td><input type="checkbox" name="checkEliminarAdmin" value="ok"/> Eliminar Administrador</td>
                                        </tr><tr>
                                        <tr></tr>
                                        <tr></tr>
                                        <tr></tr>
                                        
                                        	<td><input type="checkbox" name="checkAgregarUsuario" value="ok"/> Agregar Usuario</td>
                                            <td><input type="checkbox" name="checkEliminarUsuario" value="ok"/> Eliminar Usuario</td>
                                        </tr><tr>
                                        <tr></tr>
                                        <tr></tr>
                                        <tr></tr>
                                        
                                        	<td><input type="checkbox" name="checkAgregarLibro" value="ok"/> Agregar Libro</td>
                                            <td><input type="checkbox" name="checkEliminarLibro" value="ok"/>  Eliminar Libro</td>
                                        </tr><tr>
                                        <tr></tr>
                                        <tr></tr>
                                        <tr></tr>
                                        
                                      	<td><input type="checkbox" name="checkPrestamos" value="ok"/> Realizar Préstamos</td>
                                        </tr>
                                        <tr></tr>
                                        <tr></tr>
                                        <tr></tr>
                                        <tr></tr>
                                        <tr></tr>
                                        <tr></tr>
                                        <tr></tr>
                                    </table>
                                </div><br>
                                <div class="divAgregarDatos" align="center">
                                	<table>
                                    	<td><input type="reset" value="Borrar"/></td><td><input type="submit" value="Crear" /></td>
                                    </table>
                                </div><br />
                            </form>
                        </div>
                	</section>
                    <aside>
                    	<div class="divContenedorAside">
                		<!--Bienvenida Aside-->
            				<div class="divAsideBienvenida"><span><h3>Bienvenido</h3> <br><br> 
                            <h5>Ingres&oacute; como: 
                    			<?php
									if(isset($_SESSION["usuario"])){
										echo $_SESSION["usuario"];
                        			}else{
										header ("Location: index.php");
                        			} 
								?>
                            </h5>
                    		</div>
                			<div class="divAsideLogout">
                    			<form action="logout.php" method="post" id="btnLogout"><input type="submit" value="Salir"></form></form>
                    		</div>
                		</div>
                        
                        <br>
                        <div class="divAsideDown" id="divAsideDownUsuarios">
                			<div id="divAsideDownAgregarElementoUsuarios">
                    			<center>
                					<div class="divAsideAgregarElemento">
                    					Agregar Usuario:<br>
                        				<button id="btnNuevoUsuario" name="btnNuevoUsuarioo">Nuevo</button>
                    				</div>
                                    <div class="divAsideAgregarElemento">
                    					Agregar Admin:<br>
                        				<button id="btnNuevoAdmin" name="btnNuevoAdmin">Nuevo</button>
                    				</div>
                    			</center>
                    		</div>
                            <div  class="divAsideDownCancelar" id="divAsideDownCancelarUsuario">
                				<br><input type="button" value="Cancelar" id="btnCancelarUsuario"><br><br>
               				</div> 
                		</div>   
                    </aside>
                </div>
				
