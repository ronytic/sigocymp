<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	$narchivo="maquinaria";
	include_once '../../class/'.$narchivo.'.php';
	${$narchivo}=new $narchivo;
	extract($_POST);
	$dat=${$narchivo}->mostrarTodo("descrip LIKE '%$descripcion%' and tipo LIKE '%$tipo%' and estado LIKE '%$estado%'");
	$titulo=array("descrip"=>"Descripción","tipo"=>"Tipo","estado"=>"Estado");
	listadoTabla($titulo,$dat,1,"modificar.php","eliminar.php","ver.php");

	
}
?>