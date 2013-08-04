<?php
include_once("../../login/check.php");
if(!empty($_POST)):
include_once("../../class/contrato.php");
$contrato=new contrato;
$id=$_POST['id'];
$nombre=$_POST['nombrecontrato'];
$plantilla=htmlspecialchars($_POST['plantilla']);

if(($_FILES['foto']['type']=="image/jpeg" || $_FILES['foto']['type']=="image/png" || $_FILES['foto']['type']=="image/gif") && $_FILES['foto']['size']<="1000000"){
	@$foto=$_FILES['foto']['name'];
	@copy($_FILES['foto']['tmp_name'],"../fotocontratos/".$_FILES['foto']['name']);
}else{
	//mensaje que no es valido el tipo de archivo
	$mensaje[]="El tipo de Archivo de imagen no es valido de la imagen";	
}
//empieza la copia de archivos
$valores=array(
				"nombrecontrato"=>"'$nombre'",
				//"contrato"=>"'$plantilla'",
				"imgcontrato"=>"'".$foto."'",
					);
					$contrato->actualizar($valores,$id);
					$mensaje[]="SUS DATOS SE GUARDARON CORRECTAMENTE";

$archivonuevo="listarempleado.php";
$titulo="Actualizado del Contrato";
$folder="../../";
$archivolistar="listarempleado.php";
include_once '../../mensajeresultado.php';
endif;?>