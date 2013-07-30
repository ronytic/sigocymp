<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	$narchivo="documentoadjudicacion";
	include_once '../../class/'.$narchivo.'.php';
	${$narchivo}=new $narchivo;
	extract($_POST);
	$datos=${$narchivo}->mostrarTodoUnion("adjudicacion a,documentocomun dc,documentoadjudicacion da","da.*,a.*,dc.*,da.*","da.coddocumentoadjudicacion","da.codadjudicacion LIKE '%$codadjudicacion%' and da.coddocumentocomun LIKE '%$coddocumentocomun%' and da.obs LIKE '%$obs%' and da.codadjudicacion=a.codadjudicacion and da.coddocumentocomun=dc.coddocumentocomun","da.");
	$titulo=array("entidad"=>"Adjudicación","nombre"=>"Documento","obs"=>"Observación");
	listadoTabla($titulo,$datos,1,"modificar.php","eliminar.php","ver.php");
		
}
?>