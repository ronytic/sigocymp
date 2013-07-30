<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	$narchivo="avanceobra";
	include_once '../../class/'.$narchivo.'.php';
	${$narchivo}=new $narchivo;
	extract($_POST);
	$datos=${$narchivo}->mostrarTodo("numeroavance LIKE '%$numeroavance%' and fechaavance LIKE '%$fechaavance%' and descripcion LIKE '%$descripcion%'");
	$titulo=array("numeroavance"=>"Numero de Avance","fechaavance"=>"Fecha de Avance","descripcion"=>"Descripción");
	listadoTabla($titulo,$datos,1,"modificar.php","eliminar.php","ver.php");
		
}
?>