<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	include_once '../../class/plantilla.php';
	$nombre=$_POST['nombre'];
	$descripcion=$_POST['descripcion'];
	$plantilla=new plantilla;
	$plan=$plantilla->mostrarTodo("nomplantilla LIKE '%$nombre%' and desplantilla LIKE '%$descripcion%'");
	$titulo=array("nomplantilla"=>"Nombre","desplantilla"=>"Descripcion");
	listadoTabla($titulo,$plan,1,"modificarplantilla.php","eliminarplantilla.php","verplantilla.php");
}
?>