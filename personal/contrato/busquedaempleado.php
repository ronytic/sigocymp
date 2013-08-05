<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	include_once '../../class/contrato.php';
	include_once '../../class/empleado.php';
	$nombre=$_POST['nombre'];
	$paterno=$_POST['paterno'];
	$materno=$_POST['materno'];
	$ci=$_POST['ci'];
	$tipo=$_POST['tipo'];
	$contrato=new contrato;
	$empleado=new empleado;
	switch($tipo){
		case "nuevo":{
			$emp=$empleado->mostrarTodo("nombre LIKE '%$nombre%' and appaterno LIKE '%$apep%' and apmaterno LIKE '%$apem%' and ci LIKE '%$ci%' and cargo LIKE '%$cargo%'");
			$titulo=array("nombre"=>"Nombre","appaterno"=>"Apellido Paterno","apmaterno"=>"Apellido Materno","ci"=>"C.I.","cargo"=>"Cargo");
			listadoTabla($titulo,$emp,1,"","","",array("Nuevo Contrato"=>"nuevoempleado.php"));
					}break;
		case "registrado":{
			$emp=$contrato->contratoEmpleado("e.nombre LIKE '%$nombre%' and e.appaterno LIKE '%$apep%' and e.apmaterno LIKE '%$apem%' and e.ci LIKE '%$ci%' and e.codempleado=c.codempleado");
			$titulo=array("nombrecontrato"=>"Nombre","nombre"=>"Nombre","appaterno"=>"Apellido Paterno","apmaterno"=>"Apellido Materno","ci"=>"C.I.","cargo"=>"Cargo");
			listadoTabla($titulo,$emp,1,"modificarcontrato.php","eliminarcontrato.php","");
					}break;
	}
	
	
}
?>