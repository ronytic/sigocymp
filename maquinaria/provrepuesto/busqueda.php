<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	$narchivo="proveedorrepuesto";
	include_once '../../class/'.$narchivo.'.php';
	${$narchivo}=new $narchivo;
	extract($_POST);
	
	$prov=${$narchivo}->mostrarTodo("nombre LIKE '%$nombre%' and telefono LIKE '%$telefono%' and direccion LIKE '%$direccion%' and mail LIKE '%$mail%'");
	$titulo=array("nombre"=>"Nombre","telefono"=>"Teléfono","direccion"=>"Direccion","mail"=>"Email");
	listadoTabla($titulo,$prov,1,"modificar.php","eliminar.php","ver.php");
		
}
?>