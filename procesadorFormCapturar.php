<?php
	require_once('conexion.php');
	require_once('claseMaterial.php');
	require_once('claseUsuario.php');
	require_once('claseCirculacion.php');
	$con = Conectar();
	switch($_POST['form']){
		case 'agregarLibro':
			$material = new Libro("libros");
			$material->agregarDatos($_POST);
			echo $_POST["txtTitulo"];
			break;
		case 'getLibro':
			$material = new Libro("libros");
			return $material->getDatos($_POST['id']);
			break;
		case 'editarLibro':
			$material = new Libro("libros");
			$material->actualizarDatos($_POST,$_POST['id']);
			echo $_POST["titulo"];
			break;
			break;
		case 'eliminarLibro':
			$material = new Libro("libros");
			$material->eliminarDatos($_POST["id"]);
			echo $_POST;
			break;
		case 'agregarMaterial':
			$material = new Material("material");
			$material->agregarDatos($_POST);
			echo $_POST["txtTitulo"];
			break;
		case 'getMaterial':
			$material = new Material("material");
			return $material->getDatos($_POST['id']);
			break;
		case 'editarMaterial':
			$material = new Material("material");
			$material->actualizarDatos($_POST,$_POST['id']);
			echo $_POST["titulo"];
			break;
		case 'eliminarMaterial':
			$material = new Material("material");
			$material->eliminarDatos($_POST["id"]);
			echo $_POST["id"];
			break;
		case 'agregarUsuario':
			$usuario = new Usuario();
			$usuario->agregarDatos($_POST);
			$id = $usuario->getId();
			if(isset($_FILES)){$usuario->cargarFoto($_FILES,$id);}
			echo $_POST["txtNombre"];
			break;
		case 'getUsuario':
			$usuario = new Usuario();
			return $usuario->getDatos($_POST['id']);
			break;
		case 'editarUsuario':
			$usuario = new Usuario();
			$usuario->actualizarDatos($_POST,$_POST['id']);
			echo $_POST["id"];
			break;
		case 'eliminarUsuario':
			$usuario = new Usuario();
			$usuario->eliminarDatos($_POST['id']);
			echo $_POST["nombre"];
			break;
		case 'agregarAdmin':
			$admin = new Administrador();
			$admin->agregarDatos($_POST);
			$id = $admin->getId();
			$admin->setPrivilegios($_POST,$id);
			echo $_POST["txtNombre"];
			break;
		case 'getAdmin':
			$admin = new Administrador();
			return $admin->getDatos($_POST['id']);
			break;
		case 'editarAdmin':
			$admin = new Administrador();
			$admin->actualizarDatos($_POST,$_POST['id']);
			$admin->actualizarPrivilegios($_POST,$_POST['id']);
			echo $_POST["nombre"];
			break;
		case 'eliminarAdmin':
			$admin = new Administrador();
			$admin->eliminarDatos($_POST['id']);
			echo $_POST["id"];
			break;
		case 'agregarPrestamo':
			$prestamo = new Prestamo();
			$prestamo->agregarDatos($_POST);
			$id = $prestamo->getId();
			echo $id;
			break;
		case 'capturarEntrada':
			$prestamo = new Prestamo();
			$prestamo->capturaEntrada($_POST);
			echo $_POST['idRecurso'];
			break;
		default:
			echo "Error en el sistema - switch";
	}
	
?>