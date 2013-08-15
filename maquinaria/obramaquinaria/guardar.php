<?php
include_once("../../login/check.php");
if(!empty($_POST)):
$narchivo="obramaquinaria";
include_once("../../class/maquinaria.php");
$maquinaria=new maquinaria;
$maquinaria->actualizar(array("estado"=>"'ocupado'"),"$codmaquinaria");
	include_once '../../class/'.$narchivo.'.php';
	${$narchivo}=new $narchivo;
	extract($_POST);

	$valores=array("codmaquinaria"=>"'$codmaquinaria'",
					"codempleadooperador"=>"'$codempleado'",
					"codobra"=>"'$codobra'",
				);
	${$narchivo}->insertar($valores);
	$mensaje[]="SUS DATOS  GUARDARON CORRECTAMENTE";

$codinsercion=${$narchivo}->last_id();
$titulo="Confirmación de Guardado";
$folder="../../";
include_once '../../mensajeresultado.php';
endif;?>