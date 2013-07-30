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
	if($documentodigital!=""){
		$valores["documentodigital"]="'$documentodigital'";
	}
	$valores=array("titulo"=>"'$titulo'",
					"descripcion"=>"'$descripcion'",
					
					"entidad"=>"'$entidad'",
					"fechapublicacion"=>"'$fechapublicacion'",
					"obs"=>"'$obs'",
				);
${$narchivo}->actualizar($valores,$id);
$codinsercion=$id;
$mensaje[]="SUS DATOS DEL PROVEEDOR SE GUARDARON CORRECTAMENTE";
$titulo="Proveedor de Repuesto Actualizad";
$folder="../../";
include_once '../../mensajeresultado.php';
endif;?>