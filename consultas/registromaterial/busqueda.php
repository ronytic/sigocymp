<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	$narchivo="material";
	include_once '../../class/'.$narchivo.'.php';
	${$narchivo}=new $narchivo;
	extract($_POST);
	
	$datos=${$narchivo}->mostrarTodo("nombre LIKE '%$nombre%' and preciounitario LIKE '%$preciounitario%' and unidadmedida LIKE '%$unidadmedida%'");
	$titulo=array("nombre"=>"Material","unidadmedida"=>"Unidad Medida","preciounitario"=>"PrecioU");
	listadoTabla($titulo,$datos,1,"modificar.php","eliminar.php","ver.php");
		
}
?>