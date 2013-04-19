<div id="divCirculacion">
            	<section id="sectionPrincipalCirculacion" class="sectionPrincipal" align="center">
                	<b style="margin-right:400px">Préstamos</b>
                	<br><div id="divBusquedaRapidaCirculacion" class="divAgregarDatos">
                    	<b>Búsqueda Simple</b><br>
                         Palabra(s):
                         <form id="formBusquedaCirculacion">
                         	<input type="text" name="txtPalabra">
                            <input type="submit" value="Buscar">
                         </form><br>
                    </div>
                    <b>Realizar Préstamo</b>
                    <div class="divAgregarDatos" align="center">
                    	<br><form id="agregarPrestamo" method="post">
                        	<table>
                            	<tr>
                                	
									<td align="center"><input type="radio" name="tipo" value="libro" checked="checked"/>Libros
                                    <input type="radio" name="tipo" value="material" />Material</td>
									<td></td>
                                </tr><tr>
								<tr></tr>
								<tr></tr>
								<tr></tr>
								<tr></tr>
                                	<td align="center"><font size="-1">Signatura Topogr&aacute;fica:</font></td>
									<td>Código de Usuario:</td>
                                </tr><tr>
                                	<td><input type="text" name="signaTopo"></td>
                                    <td><input type="text" class="validarNumeros" name="txtIdUsuario"></td>
                                </tr><tr >
                                	<td>Fecha de Préstamo:</td><td>Fecha de entrega:</td>
                                </tr><tr>
                                	<td><input type="text" class="date" name="fechaPrestamo" maxlength="0"></td>
                                    <td><input type="text" class="date" id="dateFinPrestamoAgregar" name="fechaEntrega" maxlength="0"></td>
                                </tr><tr>
									<td colspan='2' align="center">Notas:</td>
								</tr><tr>
									<td colspan='2'>
										<text  rows="3" cols="40" wrap="virtual" name="txtNotas" style="max-height:40px; max-width:350px"></textarea>
									</td>
								</tr>
                            </table><br>
                            <div class="divAgregarDatos">
                            	<table width="100%" >
                                	<tr align="center">
                                    	<td><input type="reset" value="Borrar"></td>
                                        <td></td>
                                        <td><input type="submit" id="btnGeneraPrestamo" value="Generar"></td>
                                    </tr>
                                </table>
                            </div>
                        </form><br>
                    </div><br>
					<b>Registrar entrada de Material</b>
					<div class="divAgregarDatos">
                           	<table width="100%" >
                               	<tr align="center">
                                   	<td><input id="btnEntrada" type="button" value="Entrada" onClick="entrada();"></td>
                                   </tr>
                               </table>
					</div><br>
                </section>
				<div id="divEntrada">
				<form id="formDivEntrada" method="post">
					<table>
						<tr>
							<td><input type="text" name="idUsuario"></input></td>
							<td><input type="text" name="idRecurso"></input></td>
						</tr><tr>
							<td>ID usuario:</td>
							<td><font size="-1">Signatura Topogr&aacute;fica:</font><select name="tipo">
                                 <option value="libro">Libros</option>
								 <option value="material">Material</option>
                                 </select>
							</td>
						</tr>
					</table>
				</form>
				</div>
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
                    </aside>
            </div>
            