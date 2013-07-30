<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	$narchivo="propietario";
	include_once '../../class/'.$narchivo.'.php';
	${$narchivo}=new $narchivo;
	extract($_POST);
	
	$prov=${$narchivo}->mostrarTodo("nitci LIKE '%$nit%' and razonsocial LIKE '%$razon%'");
	$titulo=array("razonsocial"=>"Razon Social","fonocontacto"=>"Teléfono","contacto"=>"Contacto");
	listadoTabla($titulo,$prov,1,"modificar.php","eliminar.php","ver.php");
		
}
?>