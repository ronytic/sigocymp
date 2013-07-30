<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	$narchivo="obra";
	include_once '../../class/'.$narchivo.'.php';
	${$narchivo}=new $narchivo;
	extract($_POST);
	
	$datos=${$narchivo}->mostrarTodo("nombre LIKE '%$nombre%' and lugar LIKE '%$lugar%' and codpropietario LIKE '%$codpropietario%'");
	$titulo=array("nombre"=>"Nombre","lugar"=>"Lugar","fechainicio"=>"Fecha de Inicio","fechafin"=>"Fecha de Fin");
	listadoTabla($titulo,$datos,1,"modificar.php","eliminar.php","ver.php");
		
}
?>