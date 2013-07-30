<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	$narchivo="materialusado";
	include_once '../../class/'.$narchivo.'.php';
	${$narchivo}=new $narchivo;
	extract($_POST);
	
	$datos=${$narchivo}->mostrarTodoUnion("repuesto r,maquinaria m,mantenimientomaquinaria mm","mm.codmantenimientomaquinaria,r.descripcion as rdescripcion,m.descrip,mm.fechamantenimiento","mm.codmantenimientomaquinaria","mm.codmaquinaria=m.codmaquinaria and mm.codmaquinaria LIKE '%$codmaquinaria%' and mm.codrepuesto=r.codrepuesto and mm.codrepuesto LIKE '%$codrepuesto%' and mm.fechamantenimiento LIKE '%$fechamantenimiento%'","mm.");
	$titulo=array("rdescripcion"=>"Repuesto","descrip"=>"Maquinaria","fechamantenimiento"=>"Fecha de Mantenimiento");
	listadoTabla($titulo,$datos,1,"modificar.php","eliminar.php","ver.php");
		
}
?>