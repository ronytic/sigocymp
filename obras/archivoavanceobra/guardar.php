<?php
include_once("../../login/check.php");
if(!empty($_POST)):
$narchivo="archivoavanceobra";
	include_once '../../class/'.$narchivo.'.php';
	${$narchivo}=new $narchivo;
	extract($_POST);
	if($archivodigital=subirarchivo($_FILES['archivodigital'],"../documentosavanceobra/")){
	}else{
		//mensaje que no es valido el tipo de archivo	
		$mensaje[]="Archivo no válido. Verifique e intente nuevamente";
	}
	
	$valores=array("titulo"=>"'$titulo'",
					"archivodigital"=>"'$archivodigital'",
					"descripcion"=>"'$descripcion'",
					"codavanceobra"=>"'$codavanceobra'",
					"obs"=>"'$obs'",
				);
	${$narchivo}->insertar($valores);
	$mensaje[]="SUS DATOS SE GUARDARON CORRECTAMENTE";

$codinsercion=${$narchivo}->last_id();
$titulo="Confirmacion de Guardado";
$folder="../../";
include_once '../../mensajeresultado.php';
endif;?>