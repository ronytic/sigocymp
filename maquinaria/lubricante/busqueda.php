<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	$narchivo="lubricante";
	include_once '../../class/'.$narchivo.'.php';
	${$narchivo}=new $narchivo;
	extract($_POST);
	
	$datos=${$narchivo}->mostrarTodoUnion("fichakardex fk,lubricante l",
	"l.*,fk.detalleservicio",
	"l.codlubricante",
	"l.codfichakardex=fk.codfichakardex and l.descripcion LIKE '%$descripcion%'","l.");
	$titulo=array("descripcion"=>"Descripcion","cantidad"=>"Cantidad","unidadmedida"=>"Unidad Medida","detalleservicio"=>"Detalle Servicio");
	listadoTabla($titulo,$datos,1,"modificar.php","eliminar.php","ver.php");
		
}
?>