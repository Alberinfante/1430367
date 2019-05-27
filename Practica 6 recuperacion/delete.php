<?php 
if (isset($_GET['id'])){
	include_once('database.php');
	$maestros = new DatabaseMaestro();
	$id=intval($_GET['id']);
	$res = $maestros->deleteMaestro($id);
	if($res){
		header('location: index.php');
	}else{
		echo "Error al eliminar el registro";
	}
}


if (isset($_GET['matricula'])){
	include_once('database.php');
	$alumno = new DatabaseAlumno();
	$matricula=intval($_GET['matricula']);
	$res = $alumno->deleteAlumno($matricula);
	if($res){
		header('location: index.php');
	}else{
		echo "Error al eliminar el registro";
	}
}
?>