<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	$narchivo="documentocomun";
	include_once '../../class/'.$narchivo.'.php';
	${$narchivo}=new $narchivo;
	extract($_POST);
	$directorio="../documentoscomunes/";
	$datos=${$narchivo}->mostrarTodo("nombre LIKE '%$nombre%' and tipo LIKE '%$tipo%'");
	$titulo=array("nombre"=>"Nombre","tipo"=>"Tipo","descripcion"=>"Descripción","documentodigital"=>"Documento Digital");
	listadoTabla($titulo,$datos,1,"modificar.php","eliminar.php","ver.php");
		
}
?>