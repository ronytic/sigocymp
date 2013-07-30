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
${$narchivo}->actualizar($valores,$id);
$codinsercion=$id;
$mensaje[]="SUS DATOS SE GUARDARON CORRECTAMENTE";
$titulo="Confirmación de Actualización";
$folder="../../";
include_once '../../mensajeresultado.php';
endif;?>