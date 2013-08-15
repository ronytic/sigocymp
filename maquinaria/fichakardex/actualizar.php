<?php
include_once("../../login/check.php");
if(!empty($_POST)):
$narchivo="fichakardex";
include_once '../../class/'.$narchivo.'.php';
${$narchivo}=new $narchivo;
extract($_POST);
	$valores=array("codmaquinaria"=>"'$codmaquinaria'",
					"codempleadooperador"=>"'$codempleadooperador'",
					"codobra"=>"'$codobra'",
					"fechakardex"=>"'$fechakardex'",
					"horometroinicial"=>"'$horometroinicial'",
					"horometrofin"=>"'$horometrofin'",
					"horaingreso"=>"'$horaingreso'",
					"horasalida"=>"'$horasalida'",
					"combustible"=>"'$combustible'",
					"motor"=>"'$motor'",
					"mandosfinales"=>"'$mandosfinales'",
					"grasa"=>"'$grasa'",
					"sistemahidraulico"=>"'$sistemahidraulico'",
					"transmision"=>"'$transmision'",
					"detalleservicio"=>"'$detalleservicio'",
					"obs"=>"'$obs'",
				);
${$narchivo}->actualizar($valores,$id);
$codinsercion=$id;
$mensaje[]="SUS DATOS SE GUARDARON CORRECTAMENTE";
$titulo="Confirmación de Actualización";
$folder="../../";
include_once '../../mensajeresultado.php';
endif;?>