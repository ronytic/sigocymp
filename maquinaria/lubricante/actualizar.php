<?php
include_once("../../login/check.php");
if(!empty($_POST)):
$narchivo="lubricante";
include_once '../../class/'.$narchivo.'.php';
${$narchivo}=new $narchivo;
extract($_POST);
	$valores=array("codfichakardex"=>"'$codfichakardex'",
					"descripcion"=>"'$descripcion'",
					"unidadmedida"=>"'$unidadmedida'",
					"cantidad"=>"'$cantidad'"
				);
${$narchivo}->actualizar($valores,$id);
$codinsercion=$id;
$mensaje[]="SUS DATOS SE GUARDARON CORRECTAMENTE";
$titulo="Confirmación de Actualización";
$folder="../../";
include_once '../../mensajeresultado.php';
endif;?>