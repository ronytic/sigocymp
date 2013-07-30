<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	$narchivo="obramaquinaria";
	include_once '../../class/'.$narchivo.'.php';
	${$narchivo}=new $narchivo;
	extract($_POST);
	
	$datos=${$narchivo}->mostrarTodoUnion("obramaquinaria om,obra o,empleado e,maquinaria m","om.codobramaquinaria,o.nombre,e.nombre as nombres,e.appaterno as paterno,e.apmaterno as materno,m.descrip,m.tipo","om.codobramaquinaria","om.codempleadooperador LIKE '%$codempleado%' and om.codobra LIKE '%$codobra%' and om.codmaquinaria LIKE '%$codmaquinaria%' and om.codempleadooperador=e.codempleado and om.codobra=o.codobra and om.codmaquinaria=m.codmaquinaria","om.");
	$titulo=array("nombre"=>"Obra","nombres"=>"Empleado","paterno"=>"Emp. Paterno","materno"=>"Emp. Materno","descrip"=>"Desc. Maquinaria","tipo"=>"Tipo Maquinaria");
	listadoTabla($titulo,$datos,1,"modificar.php","eliminar.php","ver.php");
		
}
?>