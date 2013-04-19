<br>
<div id="divCatalogo">
<section id="sectionPrincipal" class="sectionPrincipal">
<!--Consulta de material-->
	<article id="artBusquedaMaterial">
		<span style="font-weight:bold" style=" font-size:14px;">
		<!--Titulo-->
        	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <spam id="spamTituloMaterial">Material:</spam>
            <spam id="spamTituloUsuarios">Usuarios:</spam>
            <spam id="spamTituloCirculacion">Circulaci&oacute;n:</spam>
            <spam id="spamTituloReportes">Reportes:</spam>
            </span><br>
            <center>
            	<div id="divBusquedaRapida">
                	<center>
                    	<form id="formBusquedaMaterial" class="formBusquedaRapida" name="formBusquedaMaterial" action="#" method="post" >
                	    	<b>B&uacute;squeda Simple</b><br>
            	            Palabra(s):<br>
        	                <input type="text" name="txtPalabras" >
    	                    <input type="submit" name="btnBuscar" id="txtBuscar" value="Buscar"><br>
                        </form>
                     </center>
                     <br>
                     <b>B&uacute;squeda Avanzada</b>
                     <a href="#" id="btnBusquedaAvanzada"><img src="img/btn_avanzado.png" alt="avalzada"></a>
                 </div>
                 <br>
                 <div id="divBusquedaAvanzada">
                 	<form id="formBusquedaMaterialAvanzada" name="formBusquedaMaterialAvanzada" action="#" method="post">
                    	<table class="tablaCatalago">
	                	<tr>
                    		<td>Autor:</td>
                            <td>Tipo:</td>	
                            <td></td>
                    	</tr>    
                        <tr>
                        	<td><input type="text" name="autor"></td>
                            <td><select name="tipo">
                                    <option value="libro">Libro</option>
                                    <option value="material">Material</option>
                                </select></td>
                            <td></td>
                        </tr>
                        <tr>
                        	<td>Título:</td>
                            <td>Idioma:</td>
                            <td></td>
                        </tr> 
                        <tr>
                        	<td><input type="text" name="titulo"></td>
                            <td><input type="text" name="idioma"></td>
                            <td></td>
                        </tr>
                        <tr>
                        	<td>Editorial:</td>
                            <td>ISBN:</td>
                            <td></td>
                        </tr> 
                        <tr>
                        	<td><input type="text" name="editorial"></td>
                            <td><input type="text" name="isbn"></td>
                            <td></td>
                        </tr>
                        <tr>
                        	<td>A&ntilde;o:</td>
                            <td>ISSN:</td>
                            <td rowspan="2"><input type="reset" value="Borrar"></td>
                        </tr>
                        <tr>
                        	<td><input type="text" name="fecha_edicion"></td>
                            <td><input type="text" name="issn"></td>
                            
                        </tr>
                        <tr>
                        	<td>No. Edici&oacute;n:</td>
                            <td><font size="-1">Signatura Topográfica:</font></td>
                            <td rowspan="3"><input type="submit" value="Buscar"></td>
                        </tr>
                        <tr>
							<td><input type="text" name="numero_edicion"></td>
							<td><input type="text" name="signa_topografica"></td>
                        </tr>
                	    </table>
                    </form><br><br>
                </div> 	
            </center>
        </article>
        <article id="artAgregarLibros">
        	<form id="formAgregarLibro" action="#" method="post" >
            	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Agregar Libro</b>
                <div class="divAgregarDatos">
                	<center>
                    	<table align="center">
                        	<tr>
                            <tr></tr>
                               <tr></tr>
                            	<td colspan="2"><center>Autor: <i>(uno por linea)</i></center></td>
                                <td></td>
                            </tr><tr>
                             	<td colspan="2">
                                	<textarea name="txtAutor" rows="0" cols="45" wrap="virtual" style="max-height:50px; max-width:400px"></textarea></td>
                                <td></td>
                             </tr><tr>
                                <td>Título:</td>
                                <td>Idioma:</td>
                             </tr><tr>
                                <td><input type="text" name="txtTitulo"></td>
                                <td><input type="text" name="txtIdioma"></td>
                             </tr><tr>
                                <td>ISBN:</td>
								<td><font size="-1">Signatura Topográfica:</font></td>
                             </tr><tr>
                                <td><input type="text" name="txtISBN"></td>
								<td><input type="text" name="txtSignaTopo"></td>
                             </tr><tr>
                                <td>Editorial:</td>
                                <td>Clasificaci&oacute;n:</td>
                             </tr><tr>
                                <td><input type="text"  name="txtEditorial"></td>
                                <td><input type="text" name="txtClasificacion"></td>
                             </tr><tr>
                                <td colspan="2">Notas:</td>
                                <td></td>
                             </tr><tr>
                                <td colspan="2">
                                	<textarea name="txtNotas" rows="5" cols="45" wrap="virtual" style="max-height:50px; max-width:400px"></textarea>
                                </td>
                             	<td></td>
                              </tr>        
                          </table><br>
                      </center>
                      </div>
                      <div>
                      <table ><tr>
                      	<td>
                        <br>
                        	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Agregar Libro Avanzada</b>
                                    <a href="#" id="btnAgregarLibroAvanzada"><img src="img/btn_avanzado.png" alt="avanzada" ></a>
                                    <br>
                                </td>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td><input type="reset" name="Borrar" value="Borrar"></td>
                                <td><input type="submit" name="enviar" value="Crear"></td></tr></table>
                            </div>
                            <div class="divAgregarDatos" id="divAgregarLibroAvanzada">
                            	<table>
                                	<tr>
                                    	<td>Precio:</td>
                                        <td>ISSN:</td>
                                        <td>Tema:</td>
                                    </tr><tr>
                                    	<td><input type="text" name="txtPrecio"></td>
                                        <td><input type="text" name="txtISSN"></td>
                                        <td><input type="text" name="txtTema"></td>
                                    </tr><tr>
                                    	<td>Fecha Edici&oacute;n:</td>
                                        <td>Pa&iacute;s:</td>
                                        <td>Lugar publicaci&oacute;n:</td>
                                    </tr><tr>
                                        <td><input type="text" name="txtFechaEdicion" class="date" maxlength="0"></td>
                                        <td><input type="text" name="txtPais"></td>
                                        <td><input type="text" name="txtLugarPublicacion"></td>
                                    </tr><tr>
                                    	<td>Tama&ntilde;o:</td>
                                        <td>Formato:</td>
                                        <td>Volumen:</td>
                                    </tr><tr>
                                    	<td><input type="text" name="txtTamano"></td>
                                        <td><input type="text" name="txtFormato"></td>
                                        <td><input type="text" name="txtVolumen"></td>
                                    </tr><tr>
                                    	<td>ICCN:</td>
                                        <td>Serie:</td>
                                        
                                    </tr><tr>
                                    	<td><input type="text" name="txtICCN"></td>
                                        <td><input type="text" name="txtSerie"></td>
                                        
                                    </tr><tr>
                                    	<td>No. de Edici&oacute;n:</td>
                                        <td>P&aacute;ginas:</td>
                                        <td>Cantidad:</td>
                                    </tr><tr>
                                    	<td><input type="text" class="validarNumeros" name="numEdicion"></td>
                                        <td><input type="text" class="validarNumeros" name="numPaginas"></td>
                                        <td><input type="text" class="validarNumeros" name="numCantidad"></td>
                                    </tr>
                                </table>
                            </div>
                        
                            <div class="divAgregarDatos" id="divAgregarLibroAvanzada2" style="margin-top:10px;">
                            	<center>
                            	<table>
                                	<tr>
                                    	<td rowspan="2" width="150"><img src="img/Libro.png" height="70%" width="70%"></td>
                                    	<td colspan="3">Descripci&oacute;n Física:</td>
                                    </tr><tr>
                                    	<td colspan="3" rowspan="3">
                                        <textarea  name="txtDescripcionFisica" rows="3" cols="35" style="max-height:50;max-width:320" ></textarea>
                                        </td>                                 
                                    </tr>
                                    <tr></tr>
	                                <tr></tr>
    	                            <tr></tr>
        	                        <tr></tr>
            	                    <tr></tr>
                	                <tr></tr>
                    	            <tr></tr>
                        	        <tr></tr>
                            	    <tr></tr>                               
                                </table>
                                </center>
                            </div>
                            <br>
                        </form> 
                    </article>
                    <article id="artAgregarMaterial">
                    <form id="agregarMaterial">
                    	<b style="margin-left:50">Agregar Material</b>
                    	<br><div class="divAgregarDatos" id="divAgregarMaterial">
                        	<center><table>
                            <br>
                            	<tr><td>Autor:</td><td>Título:</td><td></td></tr>
                                <tr><td><input type="text" name="txtAutor"></td><td><input type="text" name="txtTitulo"></td><td></td></tr>
                                <tr><td>Clasificación:</td><td>Tipo:</td><td></td></tr>
                                <tr>
                                	<td><input type="text" name="txtClasificacion"></td>
                                    <td><input type="text" name="txtTipo"></td><td></td>
                                </tr>
                                <tr><td>Idioma:</td><td><font size="-1">Signatura topográfica:</font></td><td></td></tr>
                                <tr>
									<td><input type="text" name="txtIdioma"></td>
									<td><input type="text" name="txtSignaTopo"></td><td></td>
								</tr>
                                <tr><td colspan="2">Notas:</td><td><input type="reset" value="Borrar"></td></tr>
                                <tr>
                                	<td colspan="2">
                                    	<textarea name="txtNotas" rows="3" cols="35" style="max-height:50;max-width:320"></textarea>
                                    </td>
                                    <td><input type="submit" value="Agregar"></td>
                                </tr>
                            </center></table>
                            <br>
                    	</div>
                        <br>
                        <label style="margin-left:50"><b>Agregar Material Avanzada</b></label>
                        <a href="#" id="btnAgregarMaterialAvanzada"><img src="img/btn_avanzado.png"></a>
                        <br>
                        <div class="divAgregarDatos" id="divAgregarMaterialAvanzada">
                        	<br><table>
                            	<tr>
                                	<td>Precio:</td>
                                    <td>Cantidad:</td>
                                    <td>Tema:</td>
                                </tr><tr>
                                	<td><input type="text" name="txtPrecio"></td>
                                    <td><input type="text" class="validarNumeros" name="numCantidad" ></td>
                                    <td><input type="text" name="txtTema"></td>
                                </tr><tr>
                                	<td>País:</td><td>Tamaño:</td><td>Formato:</td>
                                </tr><tr>
                                	<td><input type="text" name="txtPais"></td>
                                    <td><input type="text" name="txtTamano"></td>
                                    <td><input type="text" name="txtFormato"></td>
                                </tr><tr>
                                	<td></td><td colspan="2">Descripción Física:</td>
                                </tr><tr>
                                	<td></td>
                                    <td colspan="2">
                                    	<textarea name="txtDescrip_fisica" rows="3" cols="35" style="max-height:50;max-width:320"></textarea>
                                    </td>
                                </tr>
                                <tr></tr>
                                <tr></tr>
                                <tr></tr>
                                <tr></tr>
                                <tr></tr>
                                <tr></tr>
                                <tr></tr>
                                <tr></tr>
                                <tr></tr>
                            </table>
                        </div><br>
                    </form>
                    </article>      	
        		</section>
            <aside>
            	<!--Bienvenida y Salir ( Cuadro Aside)-->
            	<div class="divContenedorAside">
                	<!--Bienvenida Aside-->
            		<div class="divAsideBienvenida"><span><h3>Bienvenido</h3> <br><br>
                    <?php
						if(isset($_SESSION["usuario"])){
							echo "<h5>Ingres&oacute; como: $_SESSION[usuario]</h5>";
                        }else{
							header("Location: index.php");
						}?>
                    </div>
                 
                	<div class="divAsideLogout">
                    	<form action="logout.php" method="post" id="btnLogout"><input type="submit" value="Salir"></form></form>
                    </div>
                </div>
                
                <br>
                <div class="divAsideDown" id="divAsideDown">
                	<div id="divAsideDownAgregarElemento">
                    	<center>
                			<div class="divAsideAgregarElemento">
                    			Agregar Libro:<br>
                        		<button id="btnNuevoLibro" name="btnNuevoLibro">Nuevo</button>
                    		</div>
                            <div class="divAsideAgregarElemento">
                    			Agregar Material:<br>
                        		<button id="btnNuevoMaterial" name="btnNuevoMaterial">Nuevo</button>
                    		</div>
                    		
                    	</center>
                    </div>
                    <div  class="divAsideDownCancelar" id="divAsideDownCancelar">
                		<br><input type="button" value="Cancelar" id="btnCancelar"><br><br>
               		</div> 
                </div>         
       		</aside>
</div>