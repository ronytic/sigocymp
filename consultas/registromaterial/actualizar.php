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
${$narchivo}->actualizar($valores,$id);
$codinsercion=$id;
$mensaje[]="SUS DATOS SE GUARDARON CORRECTAMENTE";
$titulo="Confirmación de Guardado";
$folder="../../";
include_once '../../mensajeresultado.php';
endif;?>