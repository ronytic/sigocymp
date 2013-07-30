<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	$narchivo="fichakardex";
	include_once '../../class/'.$narchivo.'.php';
	${$narchivo}=new $narchivo;
	extract($_POST);
	
	$datos=${$narchivo}->mostrarTodoUnion("obra o,maquinaria m,empleado e,fichakardex fk",
	"fk.codfichakardex,o.nombre as onombre,o.lugar as olugar,m.descrip,e.nombre,e.appaterno",
	"fk.codfichakardex",
	"fk.codobra=o.codobra and fk.codobra LIKE '%$codobra%' and 
	fk.codmaquinaria=m.codmaquinaria and fk.codmaquinaria LIKE '%$codmaquinaria%' and 
	fk.codempleadooperador=e.codempleado and fk.codempleadooperador LIKE '%$codempleadooperador%' and fk.fechakardex LIKE '%$fechakardex%'",
	"fk.");
	$titulo=array("onombre"=>"Obra","olugar"=>"Obra Lugar","descrip"=>"Maquinaria","nombre"=>"Emp. Nombre","appaterno"=>"Emp. Apellido");
	listadoTabla($titulo,$datos,1,"","","",array("Ver Ficha Kardex"=>"ficha.php"));
		
}
?>