<?php
include_once("../../login/check.php");
if(!empty($_POST)):
$narchivo="mantenimientomaquinaria";
	include_once '../../class/'.$narchivo.'.php';
	${$narchivo}=new $narchivo;
	extract($_POST);

	$valores=array("codmaquinaria"=>"'$codmaquinaria'",
					"codrepuesto"=>"'$codrepuesto'",
					"fechamantenimiento"=>"'$fechamantenimiento'",
					"cantidad"=>"'$cantidad'",
					"titulo"=>"'$titulo'",
					"detalle"=>"'$detalle'",
					"obs"=>"'$obs'",
				);
	${$narchivo}->insertar($valores);
	$mensaje[]="SUS DATOS  GUARDARON CORRECTAMENTE";

$codinsercion=${$narchivo}->last_id();
$titulo="Confirmación de Guardado";
$folder="../../";
include_once '../../mensajeresultado.php';
endif;?>