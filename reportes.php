<div id="divReportes">
            	<section id="sectionPrincipalReportes" class="sectionPrincipal" align="center">
                	<form id="formReporte" method="post" action="pdf/html2pdf/pdfMaker.php">
                    <br>
                   	 	<div class="divAgregarDatos" align="center">
							<table width="100%">
								<tr>
									<td colspan="3"><b>Usuarios</b></td>
								</tr>
                            	<tr>
                                	<td>Rango de edad:</td><td>
									<select name="edad">
										<option value="todas">Todas</option>
										<option value="nino">1-13</option>
										<option value="adolecente">13-18</option>
										<option value="adulto_joven">18-30</option>
										<option value="adulto_mayor">30-60</option>
										<option value="edad3">mayor de 60</option>
									<select></td>
									<td>Sexo:</td>
									<td><select name="sexo">
											<option value="Indiferente">Indistinto</option>
											<option value="Masculino">Masculino</option>
											<option value="Femenino">Femenino</option>
										</select>
									</td>
								</tr><tr>
									<td>Ocupaci&oacute;n:</td>
									<td><input type="text" name="ocupacion"></input></td>
								</tr><tr>
								<tr></tr>
								<tr></tr>
								<tr></tr>
								<tr></tr>
								<tr></tr>
								<tr></tr>
								<tr></tr>
								<tr></tr>
								<tr></tr>
									<td colspan="3"><b>Recursos</b></td>
								</tr>
								<tr>
									<td>Signatura Topogr&aacute;fica:</td>
									<td><input type="text" name="signaTopo"></input></td>
									<td>Tipo:</td>
									<td><select name="tipo">
										<option value="todos">Todos</option>
										<option value="libros">Libro</option>
										<option value="material">Material</option>
									</select></td>
								</tr>
							</table>
                        </div><br>
                       
                        <b style="margin-left:10px">Rango de tiempo</b>
                        <div class="divAgregarDatos" align="center">
                        	<table>
                            	<tr align="center">
                                	<td>De</td><td><input type="date" class="date" name="prestaFechaIni" maxlength="0"></td>
                                    <td>a</td><td><input type="date" class="date" name="prestaFechaFin" maxlength="0"></td>
                                </tr>
                            </table>
                        </div><br>
						<div class="divAgregarDatos" align="center" >
							<table width="60%" align="center">
								<tr align="center">
									<td><input type="reset" value="Borrar"/> </td><td><input type="submit" value="Generar"/></td>
								</tr>
							</table>
						</div><br><br>
                    </form>
                  
                </section>
                <aside>
            	<!--Bienvenida y Salir ( Cuadro Aside)-->
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