<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	include_once '../../class/empleado.php';
	$nombre=$_POST['nombre'];
	$apep=$_POST['paterno'];
	$apem=$_POST['matenro'];
	$ci=$_POST['ci'];
	$cargo=$_POST['cargo'];
	$empleado=new empleado;
	$emp=$empleado->mostrarTodo("nombre LIKE '%$nombre%' and appaterno LIKE '%$apep%' and apmaterno LIKE '%$apem%' and ci LIKE '%$ci%' and cargo LIKE '%$cargo%'");
	$titulo=array("nombre"=>"Nombre","appaterno"=>"Apellido Paterno","apmaterno"=>"Apellido Materno","ci"=>"C.I.","cargo"=>"Cargo");
	listadoTabla($titulo,$emp,1,"modificar.php","eliminar.php","ver.php");
}
?>