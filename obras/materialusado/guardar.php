<?php
include_once("../../login/check.php");
if(!empty($_POST)):
$narchivo="materialusado";
	include_once '../../class/'.$narchivo.'.php';
	${$narchivo}=new $narchivo;
	extract($_POST);

	$valores=array("codavanceobra"=>"'$codavanceobra'",
					"codmaterialobra"=>"'$codmaterialobra'",
					"fechauso"=>"'$fechauso'",
					"cantidad"=>"'$cantidad'",
					"obs"=>"'$obs'",
				);
	${$narchivo}->insertar($valores);
	$mensaje[]="SUS DATOS  GUARDARON CORRECTAMENTE";

$codinsercion=${$narchivo}->last_id();
$titulo="Confirmación de Guardado";
$folder="../../";
include_once '../../mensajeresultado.php';
endif;?>