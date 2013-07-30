<?php
include_once("../../login/check.php");
if(!empty($_POST)):
$narchivo="adjudicacion";
	include_once '../../class/'.$narchivo.'.php';
	${$narchivo}=new $narchivo;
	extract($_POST);
	$valores=array("codigoentidad"=>"'$codigoentidad'",
					"entidad"=>"'$entidad'",
					"objetocontratacion"=>"'$objetocontratacion'",
					"fechaperiodo"=>"'$fechaperiodo'",
					"codlicitacion"=>"'$codlicitacion'",
					"modalidad"=>"'$modalidad'",
					"tipocontratacion"=>"'$tipocontratacion'",
					"obs"=>"'$obs'",
				);
	${$narchivo}->insertar($valores);
	$mensaje[]="SUS DATOS DE LA ADJUDICACION SE GUARDARON CORRECTAMENTE";

$codinsercion=${$narchivo}->last_id();
$titulo="Confirmacion de Guardado";
$folder="../../";
include_once '../../mensajeresultado.php';
endif;?>