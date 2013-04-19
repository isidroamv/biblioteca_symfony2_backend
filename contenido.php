<?php session_start();
	if(!isset($_SESSION["usuario"])){
		header("Location: index.php");
	}
?>
<!DOCTYPE >
<html >
	<head>
    	<meta http-equiv="content-type" content="text/html"; charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/estilos-contenido.css">
        <link rel="stylesheet" type="text/css" href="css/menu/menu_style.css">
        <link rel="stylesheet" type="text/css" href="css/custom-theme/jquery-ui-1.7.3.custom.css">
        <link rel="stylesheet" type="text/css" href="css/dataTables/demo_page.css">
        <link rel="stylesheet" type="text/css" href="css/dataTables/demo_table.css">
        <link rel="stylesheet" type="text/css" href="css/dataTables/demo_table_jui.css">
        <script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui-1.7.3.custom.min.js"></script>
        <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="js/datepicker-es.js"></script>
		<script type="text/javascript" src="js/jquery.form.js"></script>
        <script type="text/javascript" >
			// JavaScript Document
		var x=0;
		var ba=0;
		var bau=0;
		var estado = "inicio";
			$(document).ready(function(e) {	
				
				$("#sectionDataTables").hide();	
				
				$('#divEntrada').hide();
				$('#pops').hide();
				$('#divAgregarAdmin').hide();
				$("#divReportes").hide();
				$("#divCirculacion").hide();
				$("#divUsuarios").hide();
				$("#divCatalogo").show();
				$("#divAsideDownCancelarUsuario").hide();
				$("#divBusquedaUsuarios").show();
				$("#divAgregarUsuario").hide();
				$("#divBusquedaAvanzadaUsuarios").hide();
				$("#divAgregarMaterialAvanzada").hide();
				$("#artAgregarMaterial").hide();
				$("#artAgregarLibros").hide();
				$("#artBusquedaMaterial").show();
				$("#divAsideDownAgregarElemento").show();
				$("#divAsideDownCancelar").hide();
               
			    $("#divAgregarLibroAvanzada2").hide();
				$("#divBusquedaAvanzada").hide();
				$("#divAgregarLibroAvanzada").hide();
				
				$("#spamTituloCirculacion").hide();
				$("#spamTituloMaterial").show();
				$("#spamTituloReportes").hide();
				$("#spamTituloUsuarios").hide();
				
				$("#btnBusquedaAvanzada").click(function(){
					if(ba%2==0){
						$("#divBusquedaAvanzada").show('slow');
					}else{
						$("#divBusquedaAvanzada").hide('slow');
					}
					ba=ba+1;		
				});
				
				$("#btnAgregarLibroAvanzada").click(function(){
					if(x%2==0){
						$("#divAgregarLibroAvanzada").show('slow');
						$("#divAgregarLibroAvanzada2").show('slow');
						$('footer').css('margin-top',380);
					}else{
						$("#divAgregarLibroAvanzada").hide('fast');
						$("#divAgregarLibroAvanzada2").hide('fast');
						$('footer').css('margin-top',50);
					}
					 x=x+1;		
				});
				
				$("#btnBusquedaAvanzadaUsuarios").click(function(){
					if(bau%2==0){
						$("#divBusquedaAvanzadaUsuarios").show('slow');
					}else{
						$("#divBusquedaAvanzadaUsuarios").hide('slow');
					}
					 bau=bau+1;		
				});
				
				$("#btnAgregarMaterialAvanzada").click(function(){
					if(x%2==0){
						$("#divAgregarMaterialAvanzada").show('slow');
						$('footer').css('margin-top',180);
					}else{
						$("#divAgregarMaterialAvanzada").hide('fast');
						$('footer').css('margin-top',50);
					}
					x=x+1;		
				});
				
				function aparecerDesaparecer(div){
					if(x%2==0){
						div.show('slow');
					}else{
						div.hide('slow');
					}
					x=x+1;
				}
				
				$("#btnNuevoLibro").click(function(){
						if('<?php echo $_SESSION['agregar_libro']?>'=='1'){
							mostrarAgregarLibros();
							$("#divBusquedaAvanzada").hide();
							$("#divAgregarLibroAvanzada").hide();
							$("#divAgregarLibroAvanzada2").hide();
							$('footer').css('margin-top',50);
							x=0;
						}else{
							alert("Lo sentimos, no cuentas con los permisos requeridos");
						}
				});
				
				
				$("#btnNuevoMaterial").click(function(){
					if('<?php echo $_SESSION['agregar_libro']?>'=='1'){
						mostrarAgregarMaterial();
						$("#divAgregarMaterialAvanzada").hide();
						$('footer').css('margin-top',50);
						/*$("#divBusquedaAvanzada").hide();*/
						x=0;
					}else{
						alert("Lo sentimos, no cuentas con los permisos requeridos");
					}
					
				});
				
				
				$("#btnNuevoUsuario").click(function(){
					if('<?php echo $_SESSION['agregar_usuario']?>'=='1'){
						mostrarAgregarUsuario();
						/*$("#divBusquedaAvanzada").hide();*/
						x=0;
					}else{
						alert("Lo sentimos, no cuentas con los permisos requeridos");
					}
				});
				
				$("#btnNuevoAdmin").click(function(){
					if('<?php echo $_SESSION['agregar_usuario']?>'=='1'){
						mostrarAgregarAdmin();
						/*$("#divBusquedaAvanzada").hide();*/
						x=0;
					}else{
						alert("Lo sentimos, no cuentas con los permisos requeridos");
					}
				});
				
				$("#btnCancelar").click(function(){
					switch(estado){
						case 'inicio':
							mostrarBuscarMaterial();
							break;
						case 'catalogo':
							mostrarBuscarMaterial();
							break;
						case 'agregarLibro':
							mostrarBuscarMaterial();
							$("#artAgregarLibros").hide();
							$("#divAsideDownCancelar").hide();
             				$('footer').css('margin-top',50);
							break;
						case 'agregarMaterial':
							$("#artAgregarMaterial").hide();
							mostrarBuscarMaterial();
  							$('footer').css('margin-top',50);
							break;
						case 'agregarUsuario':
							$("#divAgregarUsuario").hide();
							mostrarBuscarUsuario();
							break;
						default:
							alert("Error en el sistema");
							alert(estado);
							break;
					}
					x=0;
				});		
				
				$("#btnCancelarUsuario").click(function(){
					switch(estado){
						case 'agregarUsuario':
							$("#divAgregarUsuario").hide();
							$("#divAsideDownCancelarUsuario").hide();
							mostrarBuscarUsuario();
							$('footer').css('margin-top',50);
							break;
						case 'agregarAdmin':
							$("#divAgregarAdmin").hide();
							$("#divAsideDownCancelarUsuario").hide();
							mostrarBuscarUsuario();
							$('footer').css('margin-top',50);
							break;
						default:
							alert("Error en el sistema");
							alert(estado);
							break;
					}
					x=0;
				});		
            });
			
			function mostrarAgregarLibros(){
				$("#artBusquedaMaterial").hide();
				$("#divAsideDownAgregarElemento").hide();
				$("#artAgregarLibros").show();
				$("#divAsideDownCancelar").show();
				$('footer').show();
				$('footer').css('margin-top',50);	
				estado='agregarLibro';
			}
			
			function mostrarAgregarMaterial(){
				$("#artBusquedaMaterial").hide();
				$("#divAsideDownAgregarElemento").hide();
				
				$("#artAgregarMaterial").show();
				/*$("#divAgregarMaterial").show();*/
				/*$("#divAgregarMaterial").show();*/
				$("#divAsideDownCancelar").show();
				
				$('footer').css('margin-top',50);			
				$('footer').show();
				estado='agregarMaterial';
			}
			
			function mostrarAgregarUsuario(){
				$("#divBusquedaUsuarios").hide();
				$("#divAgregarUsuario").show();
				$("#divAsideDownAgregarElementoUsuarios").hide();		
				$("#divAsideDownCancelarUsuario").show();
				$('footer').show();
				$('footer').css('margin-top',290);	
				estado='agregarUsuario';
			}
			
			function mostrarAgregarAdmin(){
				$("#divBusquedaUsuarios").hide();
				$("#divAgregarAdmin").show();
				$("#divAsideDownAgregarElementoUsuarios").hide();		
				$("#divAsideDownCancelarUsuario").show();
				$('footer').show();
				//$('footer').css('margin-top',150);	
				estado='agregarAdmin';
			}
			
			function mostrarBuscarMaterial(){
				$("#artAgregarLibros").hide();
				$("#divAsideDownCancelar").hide();
				
				$("#artBusquedaMaterial").show();
				$("#divAsideDownAgregarElemento").show();
				$('footer').css('margin-top',2);
				$('footer').show();
				estado='inicio';				
			}
			
			function mostrarBuscarUsuario(){
				$("#divBusquedaUsuarios").show();
				$("#divAsideDownAgregarElementoUsuarios").show();
				$('footer').show();
				$('footer').css('margin-top',2);	
				
			}
			
			
			function mostarDataTables(){
				$("#sectionContenedor").hide();
				$("#sectionDataTables").show();
				$('footer').hide();
			}
			
			function agrandarFooter(altura){
				$('footer').css('margin-top',altura);
			}
			
			
			/********Pestañas************/
			
			function pestanaCatalagoOn(){
				$("#menu3").removeClass('botonTabs');
				$("#menu4").removeClass('botonTabs');
				$("#menu5").removeClass('botonTabs');
			
				$("#sectionContenedor").show();
				$("#sectionDataTables").hide();
				$("#divReportes").hide();
				$("#divCirculacion").hide();
				$("#divCatalogo").show();
				$("#divUsuarios").hide();
				//$("#menu2").removeClass('botonTab');
				$("#menu2").addClass('botonTabs');
				$("#divAgregarLibroAvanzada").hide();
				$("#divAgregarLibroAvanzada2").hide();
				$("#divAgregarMaterialAvanzada").hide();
				x=x+1;	
				$('footer').css('margin-top',50);
				$('footer').show();
			}
			function pestanaUsuarioOn(){
				$("#menu2").removeClass('botonTabs');
				$("#menu4").removeClass('botonTabs');
				$("#menu5").removeClass('botonTabs');
				
				$("#sectionContenedor").show();
				$("#sectionDataTables").hide();
				$("#divReportes").hide();
				$("#divCirculacion").hide();
				$("#divCatalogo").hide(); 
				$("#divUsuarios").show();
				//$("#menu3").removeClass('botonTab');
				$("#menu3").addClass('botonTabs');
				$('footer').css('margin-top',50);
				$('footer').show();
			}
			
			function pestanaCirculacionOn(){
				$("#menu2").removeClass('botonTabs');
				$("#menu3").removeClass('botonTabs');
				$("#menu5").removeClass('botonTabs');
				
				$("#sectionContenedor").show();
				$("#sectionDataTables").hide();
				$("#divReportes").hide();
				$("#divCatalogo").hide();
				$("#divUsuarios").hide();
				$("#divCirculacion").show();
				//$("#menu4").removeClass('botonTab');
				$("#menu4").addClass('botonTabs');
				$('footer').css('margin-top',120);
				$('footer').show();
			}	
			
			function pestanaReportesOn(){
				$("#menu2").removeClass('botonTabs');
				$("#menu3").removeClass('botonTabs');
				$("#menu4").removeClass('botonTabs');
				
				$("#sectionContenedor").show();
				$("#sectionDataTables").hide();
				$("#divCatalogo").hide();
				$("#divUsuarios").hide();
				$("#divCirculacion").hide();
				$("#divReportes").show();
				//$("#menu5").removeClass('botonTab');
				$("#menu5").addClass('botonTabs');
				$('footer').css('margin-top',50);
				$('footer').show();
			}

		</script>
        <script type="text/javascript">
			/*---------------------Contenido de los forms----------------------*/
			var oTable;
			$(function(){
				$('#formBusquedaMaterial').submit(function(){
					estado='dataTable';
					var data = $(this).serialize();
					var data =data+"&form=busquedaMaterial";
					$.post('procesadorFormBuscar.php',data,function(respuesta){
						//alert(jQuery.trim(respuesta))
						if(jQuery.trim(respuesta).substr(0,5)=='Error'){
							alert(jQuery.trim(respuesta))
						}else{
							$("#artDataTables").html(jQuery.trim(respuesta));
							mostarDataTables();
							oTable = $('#example').dataTable({
								"sPaginationType": "full_numbers"
							});	
						}
					})	;
					return false;
				});
			});
			
			$(function(){
				$('#formBusquedaCirculacion').submit(function(){
					estado='dataTable';
					var data = $(this).serialize();
					var data =data+"&form=busquedaCirculacion";
					$.post('procesadorFormBuscar.php',data,function(respuesta){
						//alert(jQuery.trim(respuesta))
						if(jQuery.trim(respuesta).substr(0,5)=='Error'){
							alert(jQuery.trim(respuesta))
						}else{
							$("#artDataTables").html(jQuery.trim(respuesta));
							mostarDataTables();
							oTable = $('#example').dataTable({
								"sPaginationType": "full_numbers"
							});	
						}
					})	;
					return false;
				});
			});
			
			$(function(){
				$('#formBusquedaMaterialAvanzada').submit(function(){
					estado='dataTable';
					var data = $(this).serialize();
					var data =data+"&form=busquedaMaterialAvanzada";
					//alert(data);
					$.post('procesadorFormBuscar.php',data,function(respuesta){
						//alert(jQuery.trim(respuesta))
						$("#artDataTables").html(jQuery.trim(respuesta));
						if(jQuery.trim(respuesta).substr(0,5)=='Error'){
							alert(jQuery.trim(respuesta))
						}else{
							mostarDataTables();
							oTable = $('#example').dataTable({
								"sPaginationType": "full_numbers"
							});
						}
					});
					return false;
				});
			});
			
			$(function(){
				$('#formBusquedaUsuarios').submit(function(){
					estado='dataTable';
					var data = $(this).serialize();
					var data =data+"&form=busquedaUsuarios";
					
					$.post('procesadorFormBuscar.php',data,function(respuesta){
						//alert(jQuery.trim(respuesta))
						$("#artDataTables").html(jQuery.trim(respuesta));
						if(jQuery.trim(respuesta).substr(0,5)=='Error'){
							alert(jQuery.trim(respuesta))
						}else{
							mostarDataTables();
							oTable = $('#example').dataTable({
								"sPaginationType": "full_numbers"
							});
						}
					});
					return false;
				});
			});
			
			$(function(){
				$('#formBusquedaUsuariosAvanzada').submit(function(){
					estado='dataTable';
					var data = $(this).serialize();
					var data =data+"&form=busquedaUsuariosAvanzada";
					
					$.post('procesadorFormBuscar.php',data,function(respuesta){
						//alert(jQuery.trim(respuesta))
						$("#artDataTables").html(jQuery.trim(respuesta));
						if(jQuery.trim(respuesta).substr(0,5)=='Error'){
							alert(jQuery.trim(respuesta))
						}else{
							mostarDataTables();
							oTable = $('#example').dataTable({
								"sPaginationType": "full_numbers"
							});
						}
					});
					return false;
				});
			});
			/* ------------Agregar Datos---------------*/ 
			$(function(){
				$("#formAgregarLibro").submit(function(){
					var data = $(this).serialize();
					var data = data+"&form=agregarLibro";
					$.post('procesadorFormCapturar.php',data,function(respuesta){
						if(jQuery.trim(respuesta).substr(0,5)=='Error'){
							alert(jQuery.trim(respuesta))
						}else{
							alert("Se ha agregado Satisfactoriamente el libro: " + respuesta );
							location.reload(true);
						}
					});
					return false;
				});
			});	
			
			$(function(){
				$("#agregarMaterial").submit(function(){
					var data = $(this).serialize();
					var data = data+"&form=agregarMaterial";
					$.post('procesadorFormCapturar.php',data,function(respuesta){
						if(jQuery.trim(respuesta).substr(0,5)=='Error'){
							alert(jQuery.trim(respuesta));
						}else{
							alert("Se ha agregado Satisfactoriamente el Material: " + respuesta );
							location.reload(true);
						}
					});
					return false;
				});
			});
			
			
				/* $("#formPopEditarLibro").submit(function(){
					alert('okform');
					var data = $(this).serialize();
					var data = data+"&form=editarLibro";
					$.post('procesadorFormCapturar.php',data,function(respuesta){
						if(jQuery.trim(respuesta).substr(0,5)=='Error'){
							alert(jQuery.trim(respuesta))
						}else{
							alert("Se ha actualizado Satisfactoriamente el libro: " + respuesta );
							//location.reload(true);
						}
					});
					return false;
				}); */
			
			$(function(){
				/* $("#agregarUsuario").submit(function(){
					var data = $(this).serialize();
					var data = data+"&form=agregarUsuario";
					$.post('procesadorFormCapturar.php',data,function(respuesta){
						if(jQuery.trim(respuesta).substr(0,5)=='Error'){
							alert(jQuery.trim(respuesta))
						}else{
							alert("Se ha agregado Satisfactoriamente el usuario: " + respuesta );
							location.reload(true);
						}
					});
					return false;
				}); */
				$('#agregarUsuario').submit(function() {
					if('<?php echo $_SESSION['agregar_usuario']?>'=='1'){
						$(this).ajaxSubmit({ 
							url:'procesadorFormCapturar.php',
							//target:'#divAux',
							success: function(data) {
								if(jQuery.trim(data).substr(0,5)=='Error'){
									alert(jQuery.trim(data))
								}else{
									alert("Se ha agregado Satisfactoriamente el usuario: " + data );
									location.reload(true);
								}
							}
						});
					}else{
						alert("Lo sentimos, no cuentas con los permisos requeridos");
					}
					return false;
				});
			});
			
			$(function(){
			$('#agregarAdmin').submit(function() {
					if('<?php echo $_SESSION['agregar_admin']?>'=='1'){
						$(this).ajaxSubmit({ 
							url:'procesadorFormCapturar.php',
							//target:'#divAux',
							success: function(data) {
								if(jQuery.trim(data).substr(0,5)=='Error'){
									alert(jQuery.trim(data))
								}else{
									alert("Se ha agregado Satisfactoriamente el Administrador: " + data );
									location.reload(true);
								}
							}
						});
					}else{
						alert("Lo sentimos, no cuentas con los permisos requeridos");
					}
					return false;
				});
			});
			
			$(function(){
				$("#agregarPrestamo").submit(function(){
					if('<?php echo $_SESSION['prestamos']?>'=='1'){
						var data = $(this).serialize();
						var data = data+"&form=agregarPrestamo";
						$.post('procesadorFormCapturar.php',data,function(respuesta){
						if(jQuery.trim(respuesta).substr(0,5)=='Error'){
							alert(jQuery.trim(respuesta))
						}else{
							alert("Se ha agregado Satisfactoriamente el Prestamo #" + respuesta );
							location.reload(true);
						}
					});
					}else{
						alert("Lo sentimos, no cuentas con los permisos requeridos");
					}
					return false;
				});
			});	
			
			/*Calendario*/
			$(function() {
				$(".date").datepicker({
					dateFormat: 'yy-mm-dd', changeMonth: true, changeYear: true, yearRange: '-11:+0'
				});
			});
			
			/*Validar Numeros*/
			$(function(){
   				$(".validarNumeros").keydown(function(event){
        		if(event.keyCode==8 || event.keyCode==9){
            		return true;
        		}else if(event.keyCode < 48 || event.keyCode > 57){
					return false;
				}
    			});
			});
			
			/* $(function(){
   				$(".backRefresh").keydown(function(event){
				//alert(event.keyCode);
					if(event.keyCode==8){
						history.go(0);
						return false;	
					}
    			});
			}); */
			
			/*Opciones del dataTables*/
			function eliminar(id,tipo){
					ventana = confirm("¿Estás seguro que deseas eliminar el "+tipo+" #"+id+"?");
					if (ventana) {
						var data = "id="+id+"&form=eliminar"+tipo;
						$.post('procesadorFormCapturar.php',data,function(respuesta){
							if(jQuery.trim(respuesta).substr(0,5)=='Error'){
								alert(jQuery.trim(respuesta));
							}else{
								//alert("Se ha eliminado Satisfactoriamente el material #" + respuesta );
								//oTable.fnReloadAjax();
								//oTable.fnClearTable(this);
								//oTable.fnDraw();
								//alert(getLastPost());
								//alert(respuesta);
								location.reload(true);
							}
						});
					}  	                             
			}
			
			/*Pop Dialog*/
			function editar(id,tipo){
					var altura = 0;
					if (tipo == 'Libro'){
						altura = 90;
					}
					if (tipo == 'Usuario'){
						altura = 120;
					}
					
					var data = "id="+id+"&form=get"+tipo;
					$.post('procesadorFormCapturar.php',data,function(respuesta){
						var data = "type="+respuesta; //recibe el arreglo en formato Json
						
						$.post('editarElementos.php',data,function(respuesta){
							$('#pops').html(respuesta);
						
							$(".ui-dialog-content").dialog("destroy");
							$('#popEditar'+tipo+'').dialog({
								title:"Editar "+tipo,
								height:480+altura,
								width:720,
								modal:true,
								buttons:{
									'Actualizar':function(){
										data = $("#formPopEditar"+tipo).serialize();
										data=decodeURI(data);
										//alert(data);
										data = data+"&form=editar"+tipo;
										$.post('procesadorFormCapturar.php',data,function(respuesta){
											if(jQuery.trim(respuesta).substr(0,5)=='Error'){
												alert(jQuery.trim(respuesta))
											}else{
												alert("Se ha actualizado Satisfactoriamente el "+tipo+": " + respuesta );
												location.reload(true);
											}
										});
									},
									'Cerrar':function(){
										$(this).dialog('close');
									}
								}
							});
						});
					});
			}
			
			function mensajeNoPermisos(){
				alert("Lo sentimos, no cuentas con los permisos requeridos");
			}
			
			function entrada(){
				$(".ui-dialog-content").dialog("destroy");
				$('#divEntrada').dialog({
					title:"Capturar Entrada",
					height:250,
					width:500,
					modal:true,
					buttons:{
						'Capturar':function(){
							data = $('#formDivEntrada').serialize();
							data = data+"&form=capturarEntrada";
							//alert(data);
							$.post('procesadorFormCapturar.php',data,function(respuesta){
								if(jQuery.trim(respuesta).substr(0,5)=='Error'){
									alert(jQuery.trim(respuesta))
								}else{
									alert("Se ha registrado entrada: " + respuesta );
									location.reload(true);
								}
							});
						},
						'Cerrar':function(){
							$(this).dialog('close');
						}
					}
				});
			}
		</script>       
		<title>Biblioteca - Los Mangos</title>
	</head>

	<body>
    	<header>
        	<!--Contenido de la cabecera-->
        	<img src="img/logo.png" align="left" height="100%" id="logo" />
	        <img src="img/sistema-de-administracion.png" align="right" height="65px" width="442px"><br>
       		<h1>&nbsp;&nbsp;&nbsp;Biblioteca Los Mangos</h1>
	        <h5 align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Centro Cultural</h5>
        </header>
        <nav>
        	<!---Menu-->
        	<div id="menucontainer">
				<div id="menunav">
					<div class="tabs">
                    	<div id="menu1" class="botonTab0" onClick="javascript:location.reload()">INICIO</div>
                        <div id="menu2" class="botonTab" onClick="pestanaCatalagoOn()">CATÁLOGO</div>
                        <div id="menu3" class="botonTab" onClick="pestanaUsuarioOn()">USUARIOS</div>
                        <div id="menu4" class="botonTab" onClick="pestanaCirculacionOn()">CIRCULACIÓN</div>
                        <div id="menu5" class="botonTab" onClick="pestanaReportesOn()">REPORTES</div>
                   </div>
				</div>
			</div>
        </nav>
        <section id="sectionContenedor">
        	<!--aqui va-->
			<?php include("catalogo.php");
				  include("usuarios.php");
				  include("circulacion.php");
				  include("reportes.php");
			?>
            
        </section>
		<section id="pops">
			
		</section>
        <section id="sectionDataTables">
            <div id="headerDataTables">
            	<!--Aquí va el header del data table-->
            </div>
            <div id="artDataTables">
            </div>
            <div id="footerDataTables">
            	<br><!--Aquí va el footer del data table-->
            </div>
        </section>
        <footer>
        	<?php include("footer.php");?>
        </footer>
		<div type="hidden" id="divAux">
		</div>
	</body>
</html>

