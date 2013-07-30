<?php
include_once("../../login/check.php");
if(!empty($_POST)):
$narchivo="obraempleado";
	include_once '../../class/'.$narchivo.'.php';
	${$narchivo}=new $narchivo;
	extract($_POST);

	$valores=array("cargo"=>"'$cargo'",
					"codempleado"=>"'$codempleado'",
					"codobra"=>"'$codobra'",
				);
	${$narchivo}->insertar($valores);
	$mensaje[]="SUS DATOS  GUARDARON CORRECTAMENTE";

$codinsercion=${$narchivo}->last_id();
$titulo="Confirmación de Guardado";
$folder="../../";
include_once '../../mensajeresultado.php';
endif;?>