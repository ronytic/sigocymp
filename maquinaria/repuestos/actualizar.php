<?php
include_once("../../login/check.php");
if(!empty($_POST)):
$narchivo="repuesto";
include_once '../../class/'.$narchivo.'.php';
${$narchivo}=new $narchivo;
extract($_POST);
	$valores=array("descripcion"=>"'$descripcion'",
					"precio"=>"'$precio'",
					"tipo"=>"'$tipo'",
					"tiempovida"=>"'$tiempovida'",
					"codigodefabricacion"=>"'$codigodefabricacion'",
					"codproveedorrepuesto"=>"'$codproveedorrepuesto'",
				);
${$narchivo}->actualizar($valores,$id);
$codinsercion=$id;
$mensaje[]="SUS DATOS SE GUARDARON CORRECTAMENTE";
$titulo="Confirmación de Actualización";
$folder="../../";
include_once '../../mensajeresultado.php';
endif;?>