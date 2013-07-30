<?php
include_once("../../login/check.php");
if(!empty($_POST)):
$narchivo="propietario";
include_once '../../class/'.$narchivo.'.php';
${$narchivo}=new $narchivo;
extract($_POST);
	$valores=array("nitci"=>"'$nitci'",
					"razonsocial"=>"'$razonsocial'",
					"direccion"=>"'$direccion'",
					"contacto"=>"'$contacto'",
					"fonocontacto"=>"'$fonocontacto'",
					"emailcontacto"=>"'$emailcontacto'",
				);
${$narchivo}->actualizar($valores,$id);
$codinsercion=$id;
$mensaje[]="SUS DATOS DEL PROVEEDOR SE GUARDARON CORRECTAMENTE";
$titulo="Proveedor de Repuesto Actualizad";
$folder="../../";
include_once '../../mensajeresultado.php';
endif;?>