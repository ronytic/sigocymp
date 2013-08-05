<?php
include_once("../../login/check.php");
if(!empty($_POST)):
$narchivo="archivoadjudicacion";
	include_once '../../class/'.$narchivo.'.php';
	${$narchivo}=new $narchivo;
	extract($_POST);
	if($archivodigital=subirarchivo($_FILES['archivodigital'],"../documentosadjudicacion/")){
	}else{
		//mensaje que no es valido el tipo de archivo	
		$mensaje[]="Archivo no válido. Verifique e intente nuevamente";
	}
	
	$valores=array("titulo"=>"'$titulo'",
					"archivodigital"=>"'$archivodigital'",
					"descripcion"=>"'$descripcion'",
					"codadjudicacion"=>"'$codadjudicacion'",
					"obs"=>"'$obs'",
				);
	${$narchivo}->insertar($valores);
	$mensaje[]="SUS DATOS DE LA ADJUDICACION SE GUARDARON CORRECTAMENTE";

$codinsercion=${$narchivo}->last_id();
$archivonuevo="nuevo.php?codadjudicacion=$codadjudicacion";
$titulo="Confirmacion de Guardado";
$folder="../../";
include_once '../../mensajeresultado.php';
endif;?>