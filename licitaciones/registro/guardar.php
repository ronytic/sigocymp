<?php
include_once("../../login/check.php");
if(!empty($_POST)):
$narchivo="licitacion";
	include_once '../../class/'.$narchivo.'.php';
	${$narchivo}=new $narchivo;
	extract($_POST);
	if(($_FILES['documentodigital']['type']=="application/pdf" || $_FILES['documentodigital']['type']=="application/msword" || $_FILES['documentodigital']['type']=="application/vnd.openxmlformats-officedocument.wordprocessingml.document") && $_FILES['documentodigital']['size']<="500000000"){
		@$documentodigital=$_FILES['documentodigital']['name'];
		@copy($_FILES['documentodigital']['tmp_name'],"../documentos/".$_FILES['documentodigital']['name']);
	}else{
		//mensaje que no es valido el tipo de archivo	
		$mensaje[]="Archivo no válido. Verifique e intente nuevamente";
	}
	$valores=array("titulo"=>"'$titulo'",
					"descripcion"=>"'$descripcion'",
					"documentodigital"=>"'$documentodigital'",
					"entidad"=>"'$entidad'",
					"fechapublicacion"=>"'$fechapublicacion'",
					"obs"=>"'$obs'",
				);
	${$narchivo}->insertar($valores);
	$mensaje[]="SUS DATOS DE LA LICITACIÓN SE GUARDARON CORRECTAMENTE";

$codinsercion=${$narchivo}->last_id();
$titulo="Registro de Nuevo Proveedor de Repuesto";
$folder="../../";
include_once '../../mensajeresultado.php';
endif;?>