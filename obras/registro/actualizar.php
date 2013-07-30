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
${$narchivo}->actualizar($valores,$id);
$codinsercion=$id;
$mensaje[]="SUS DATOS SE GUARDARON CORRECTAMENTE";
$titulo="Confirmación de Actualización";
$folder="../../";
include_once '../../mensajeresultado.php';
endif;?>