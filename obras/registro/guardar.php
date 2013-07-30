<?php
include_once("../../login/check.php");
if(!empty($_POST)):
$narchivo="obra";
	include_once '../../class/'.$narchivo.'.php';
	${$narchivo}=new $narchivo;
	extract($_POST);

	$valores=array("nombre"=>"'$nombre'",
					"lugar"=>"'$lugar'",
					"descripcion"=>"'$descripcion'",
					"fechainicio"=>"'$fechainicio'",
					"fechafin"=>"'$fechafin'",
					"codpropietario"=>"'$codpropietario'",
					"codadjudicacion"=>"'$codadjudicacion'",
					"obs"=>"'$obs'",
				);
	${$narchivo}->insertar($valores);
	$mensaje[]="SUS DATOS  GUARDARON CORRECTAMENTE";

$codinsercion=${$narchivo}->last_id();
$titulo="Confirmación de Guardado";
$folder="../../";
include_once '../../mensajeresultado.php';
endif;?>