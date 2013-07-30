<?php
include_once("../../login/check.php");
if(!empty($_POST)):
$narchivo="documentocomun";
include_once '../../class/'.$narchivo.'.php';
${$narchivo}=new $narchivo;
extract($_POST);
	if($documentodigital=subirarchivo($_FILES['documentodigital'],"../documentoscomunes/")){
	}else{
		//mensaje que no es valido el tipo de archivo	
		$mensaje[]="Archivo no válido. Verifique e intente nuevamente";
	}
	
	if($documentodigital!=""){
		$valores["documentodigital"]="'$documentodigital'";
	}
	$valores=array("nombre"=>"'$nombre'",
					"tipo"=>"'$tipo'",
					"descripcion"=>"'$descripcion'", 
					"obs"=>"'$obs'",
				);
${$narchivo}->actualizar($valores,$id);
$codinsercion=$id;
$mensaje[]="SUS DATOS SE GUARDARON CORRECTAMENTE";
$titulo="Confirmación de Guardado";
$folder="../../";
include_once '../../mensajeresultado.php';
endif;?>