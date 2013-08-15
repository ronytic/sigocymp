<?php
include_once("../../login/check.php");
if(!empty($_POST)):
include_once("../../class/maquinaria.php");
$maquinaria=new maquinaria;
$descripcion=$_POST['descripcion'];
$altura=$_POST['altura'];
$ancho=$_POST['ancho'];
$peso=$_POST['peso'];
$precio=$_POST['precio'];
$tipo=$_POST['tipo'];
$cantidad=$_POST['cantidad'];
$estado=$_POST['estado'];
$horometro=$_POST['horometro'];
$observacion=$_POST['observacion'];

if(($_FILES['foto']['type']=="image/jpeg" || $_FILES['foto']['type']=="image/png" || $_FILES['foto']['type']=="image/gif") && $_FILES['foto']['size']<="100000"){
	@$foto=$_FILES['foto']['name'];
	@copy($_FILES['foto']['tmp_name'],"../foto/".$_FILES['foto']['name']);
}else{
	//mensaje que no es valido el tipo de archivo
	$mensaje[]="El tipo de Archivo de imagen no es valido de la imagen";	
}
	$valores=array("descrip"=>"'$descripcion'",
					"altura"=>"'$altura'",
					"ancho"=>"'$ancho'",
					"peso"=>"'$peso'",
					"precio"=>"'$precio'",
					"tipo"=>"'$tipo'",
					"cantidad"=>"'$cantidad'",
					"estado"=>"'$estado'",
					"foto"=>"'$foto'",
					"obsmaq"=>"'$observacion'",
					"horometrocompra"=>"$horometro",
					
				);
	$maquinaria->insertar($valores);
	$mensaje[]="SUS DATOS DE LA MAQUINARIA SE GUARDARON CORRECTAMENTE";


$titulo="Registro de Nueva Maquinaria";
$folder="../../";
$archivonuevo="nuevamaquina.php";
include_once '../../mensajeresultado.php';
endif;?>