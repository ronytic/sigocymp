<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	$narchivo="materialobra";
	include_once '../../class/'.$narchivo.'.php';
	${$narchivo}=new $narchivo;
	extract($_POST);
	
	$datos=${$narchivo}->mostrarTodoUnion("materialobra mo,obra o,proveedormaterial pm","mo.codmaterialobra,o.nombre as nombreobra,pm.nombre pmnombre,mo.*","mo.codmaterialobra","mo.codobra=o.codobra and mo.codobra LIKE '%$codobra%' and mo.codproveedormaterial=pm.codproveedormaterial and mo.codproveedormaterial LIKE '%$codproveedormaterial%' and mo.descripcion LIKE '%$descripcion%'","mo.");
	$titulo=array("descripcion"=>"Descripción","cantidadinicial"=>"Cantidad Inicial","unidadmedida"=>"Unidad Medida","nombreobra"=>"Nombre Obra","pmnombre"=>"Nombre Proveedor");
	listadoTabla($titulo,$datos,1,"modificar.php","eliminar.php","ver.php");
		
}
?>