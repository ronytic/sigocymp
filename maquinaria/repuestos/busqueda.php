<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	
	$narchivo="repuesto";
	include_once '../../class/'.$narchivo.'.php';
	${$narchivo}=new $narchivo;
	extract($_POST);
	
	$datos=${$narchivo}->mostrarTodo("descripcion LIKE '%$descripcion%' and tipo LIKE '%$tipo%' and codigodefabricacion LIKE '%$codigodefabricacion%' and codproveedorrepuesto LIKE '%$codproveedorrepuesto%'");
	$titulo=array("descripcion"=>"Descripción","tipo"=>"Tipo","codigodefabricacion"=>"Código de fabricacion","precio"=>"Precio");
	listadoTabla($titulo,$datos,1,"modificar.php","eliminar.php","ver.php");
		
}
?>