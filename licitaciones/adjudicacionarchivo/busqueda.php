<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	$narchivo="archivoadjudicacion";
	include_once '../../class/'.$narchivo.'.php';
	${$narchivo}=new $narchivo;
	extract($_POST);
	$directorio="../documentosadjudicacion/";
	$datos=${$narchivo}->mostrarTodo("titulo LIKE '%$titulo%' and descripcion LIKE '%$descripcion%' and codadjudicacion LIKE '%$codadjudicacion%'");
	$titulo=array("titulo"=>"Titulo","descripcion"=>"descripcion","archivodigital"=>"Archivo Digital");
	listadoTabla($titulo,$datos,1,"modificar.php","eliminar.php","ver.php");
		
}
?>