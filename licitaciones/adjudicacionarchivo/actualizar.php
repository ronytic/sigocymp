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
	
	if($archivodigital!=""){
		$valores["archivodigital"]="'$archivodigital'";
	}
	$valores=array("titulo"=>"'$titulo'",
					"descripcion"=>"'$descripcion'",
					"codadjudicacion"=>"'$codadjudicacion'",
					"obs"=>"'$obs'",
				);
${$narchivo}->actualizar($valores,$id);
$codinsercion=$id;
$mensaje[]="SUS DATOS SE GUARDARON CORRECTAMENTE";
$titulo="Confirmación de Guardado";
$folder="../../";
include_once '../../mensajeresultado.php';
endif;?>