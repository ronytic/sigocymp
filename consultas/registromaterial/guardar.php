<?php
include_once("../../login/check.php");
if(!empty($_POST)):
$narchivo="material";
	include_once '../../class/'.$narchivo.'.php';
	${$narchivo}=new $narchivo;
	extract($_POST);
	$valores=array("nombre"=>"'$nombre'",
					"unidadmedida"=>"'$unidadmedida'",
					"preciounitario"=>"'$preciounitario'",
				);
	${$narchivo}->insertar($valores);
	$mensaje[]="SUS DATOS DE MATERIAL SE GUARDARON CORRECTAMENTE";

$codinsercion=${$narchivo}->last_id();
$titulo="Confirmacion de Guardado";
$folder="../../";
include_once '../../mensajeresultado.php';
endif;?>