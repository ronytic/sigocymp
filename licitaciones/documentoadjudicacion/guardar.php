<?php
include_once("../../login/check.php");
if(!empty($_POST)):
$narchivo="documentoadjudicacion";
	include_once '../../class/'.$narchivo.'.php';
	${$narchivo}=new $narchivo;
	extract($_POST);
	$valores=array("codadjudicacion"=>"'$codadjudicacion'",
					"coddocumentocomun"=>"'$coddocumentocomun'",
					"obs"=>"'$obs'",
				);
	${$narchivo}->insertar($valores);
	$mensaje[]="SUS DATOS SE GUARDARON CORRECTAMENTE";

$codinsercion=${$narchivo}->last_id();
$titulo="Confirmacion de Guardado";
$folder="../../";
include_once '../../mensajeresultado.php';
endif;?>