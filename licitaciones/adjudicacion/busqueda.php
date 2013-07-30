<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	$narchivo="adjudicacion";
	include_once '../../class/'.$narchivo.'.php';
	${$narchivo}=new $narchivo;
	extract($_POST);
	
	$datos=${$narchivo}->mostrarTodo("codigoentidad LIKE '%$codigoentidad%' and entidad LIKE '%$entidad%' and objetocontratacion LIKE '%$objetocontratacion%' and modalidad LIKE '%$modalidad%'");
	$titulo=array("codigoentidad"=>"Codigo Entidad","entidad"=>"Entidad","objetocontratacion"=>"Objeto Contratacion","modalidad"=>"Modalidad");
	listadoTabla($titulo,$datos,1,"modificar.php","eliminar.php","ver.php");
		
}
?>