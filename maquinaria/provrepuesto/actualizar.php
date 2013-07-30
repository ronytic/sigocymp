<?php
include_once("../../login/check.php");
if(!empty($_POST)):
$narchivo="proveedorrepuesto";
include_once '../../class/'.$narchivo.'.php';
${$narchivo}=new $narchivo;
extract($_POST);
	$valores=array("nombre"=>"'$nombre'",
					"direccion"=>"'$direccion'",
					"telefono"=>"'$telefono'",
					"mail"=>"'$mail'"					
				);
${$narchivo}->actualizar($valores,$id);
$codinsercion=$id;
$mensaje[]="SUS DATOS DEL PROVEEDOR SE GUARDARON CORRECTAMENTE";
$titulo="Proveedor de Repuesto Actualizad";
$folder="../../";
include_once '../../mensajeresultado.php';
endif;?>