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
${$narchivo}->actualizar($valores,$id);
$codinsercion=$id;
$mensaje[]="SUS DATOS SE GUARDARON CORRECTAMENTE";
$titulo="Confirmación de Actualización";
$folder="../../";
include_once '../../mensajeresultado.php';
endif;?>