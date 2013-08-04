<?php
include_once("../../login/check.php");
if(!empty($_POST)):
include_once("../../class/contrato.php");
$contrato=new contrato;
$id=$_POST['id'];
$nombre=$_POST['nombrecontrato'];
$plantilla=htmlspecialchars($_POST['plantilla']);

$codcontratante=$_POST['codcontratante'];
$codobra=$_POST['codobra'];
if(empty($codobra)){$codobra=0;}
$cargocontrato=$_POST['cargocontrato'];
$fechacontrato=$_POST['fechacontrato'];
$tipocontrato=$_POST['tipocontrato'];
$duracioncontrato=$_POST['duracioncontrato'];
$salariocontrato=$_POST['salariocontrato'];
//empieza la copia de archivos
if(($_FILES['foto']['type']=="image/jpeg" || $_FILES['foto']['type']=="image/png" || $_FILES['foto']['type']=="image/gif") && $_FILES['foto']['size']<="1000000"){
	@$foto=$_FILES['foto']['name'];
	@copy($_FILES['foto']['tmp_name'],"../fotocontratos/".$_FILES['foto']['name']);
}else{
	//mensaje que no es valido el tipo de archivo
	$mensaje[]="El tipo de Archivo de imagen no es valido de la imagen";	
}
$valores=array("codempleado"=>"'$id'",
				"nombrecontrato"=>"'$nombre'",
				"contrato"=>"'$plantilla'",
				"codcontratante"=>$codcontratante,
				"codobra"=>"$codobra",
				"cargo"=>"'".$cargocontrato."'",
				"fechacontrato"=>"'".$fechacontrato."'",
				"tipocontrato"=>"'".$tipocontrato."'",
				"duracioncontrato"=>"'".$duracioncontrato."'",
				"salariocontrato"=>"'".$salariocontrato."'",
				"imgcontrato"=>"'".$foto."'",
				);
					$contrato->insertar($valores);
					$mensaje[]="SUS DATOS SE GUARDARON CORRECTAMENTE";
$archivonuevo="listarempleado.php";

$titulo="Registro de Nuevo Contrato";
$folder="../../";
$archivolistar="listarempleado.php";

include_once '../../mensajeresultado.php';
endif;?>