<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	$narchivo="materialusado";
	include_once '../../class/'.$narchivo.'.php';
	${$narchivo}=new $narchivo;
	extract($_POST);
	
	$datos=${$narchivo}->mostrarTodoUnion("materialobra mo,avanceobra ao,materialusado mu","mu.codmaterialusado,mo.descripcion as modescripcion,ao.numeroavance,ao.descripcion as aodescripcion,mu.fechauso","mu.codmaterialusado","mu.codmaterialobra=mo.codmaterialobra and mu.codmaterialobra LIKE '%$codmaterialobra%' and mu.codavanceobra=ao.codavanceobra and mu.codavanceobra LIKE '%$codavanceobra%' and mu.fechauso LIKE '%$fechauso%'","mu.");
	$titulo=array("modescripcion"=>"Material Obra","numeroavance"=>"Numero Avance","aodescripcion"=>"Avance de Obra","fechauso"=>"Fecha de Uso");
	listadoTabla($titulo,$datos,1,"modificar.php","eliminar.php","ver.php");
		
}
?>