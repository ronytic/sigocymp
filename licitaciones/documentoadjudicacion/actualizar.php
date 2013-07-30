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
${$narchivo}->actualizar($valores,$id);
$codinsercion=$id;
$mensaje[]="SUS DATOS SE GUARDARON CORRECTAMENTE";
$titulo="Confirmación de Guardado";
$folder="../../";
include_once '../../mensajeresultado.php';
endif;?>