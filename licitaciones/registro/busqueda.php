<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	$narchivo="licitacion";
	include_once '../../class/'.$narchivo.'.php';
	${$narchivo}=new $narchivo;
	extract($_POST);
	
	$datos=${$narchivo}->mostrarTodo("titulo LIKE '%$titulo%' and descripcion LIKE '%$descripcion%'");
	$titulo=array("titulo"=>"Nombre","descripcion"=>"Lugar","entidad"=>"Entidad","fechapublicacion"=>"Fecha de Publicación");
	listadoTabla($titulo,$datos,1,"modificar.php","eliminar.php","ver.php");
		
}
?>