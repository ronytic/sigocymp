<?php
include_once("../../login/check.php");
if(!empty($_POST)):
$narchivo="materialobra";
	include_once '../../class/'.$narchivo.'.php';
	${$narchivo}=new $narchivo;
	extract($_POST);

	$valores=array("descripcion"=>"'$descripcion'",
					"cantidadinicial"=>"'$cantidadinicial'",
					"unidadmedida"=>"'$unidadmedida'",
					"stock"=>"'$stock'",
					"preciounitario"=>"'$preciounitario'",
					"preciototal"=>"'$preciototal'",
					"codobra"=>"'$codobra'",
					"codproveedormaterial"=>"'$codproveedormaterial'"
				);
	${$narchivo}->insertar($valores);
	$mensaje[]="SUS DATOS  GUARDARON CORRECTAMENTE";

$codinsercion=${$narchivo}->last_id();
$titulo="Confirmación de Guardado";
$folder="../../";
include_once '../../mensajeresultado.php';
endif;?>