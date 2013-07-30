<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	$narchivo="obraempleado";
	include_once '../../class/'.$narchivo.'.php';
	${$narchivo}=new $narchivo;
	extract($_POST);
	
	$datos=${$narchivo}->mostrarTodoUnion("obraempleado oe,obra o,empleado e","oe.codobraempleado,oe.cargo,o.nombre,e.nombre as nombres,e.appaterno as paterno,e.apmaterno as materno","oe.codobraempleado","oe.cargo LIKE '%$cargo%' and oe.codempleado LIKE '%$codempleado%' and oe.codobra LIKE '%$codobra%' and oe.codempleado=e.codempleado and oe.codobra=o.codobra","oe.");
	$titulo=array("nombre"=>"Obra","nombres"=>"Empleado","paterno"=>"Emp. Paterno","materno"=>"Emp. Materno","cargo"=>"Cargo");
	listadoTabla($titulo,$datos,1,"modificar.php","eliminar.php","ver.php");
		
}
?>