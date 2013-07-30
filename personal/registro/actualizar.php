<?php
include_once("../../login/check.php");
if(!empty($_POST)):
include_once("../../class/empleado.php");
$empleado=new empleado;
$id=$_POST['id'];
$ci=$_POST['ci'];
$ciudad=$_POST['ciudad'];
$nom=$_POST['nombres'];
$appat=$_POST['paterno'];
$apmat=$_POST['materno'];
$dir=$_POST['direccion'];
$telefono=$_POST['telefono'];
$cargo=$_POST['cargo'];
$fechain=$_POST['fechain'];
$fechanac=$_POST['fechanac'];
//empieza la copia de archivos
if(($_FILES['foto']['type']=="image/jpeg" || $_FILES['foto']['type']=="image/png" || $_FILES['foto']['type']=="image/gif") && $_FILES['foto']['size']<="100000"){
	@$foto=$_FILES['foto']['name'];
	@copy($_FILES['foto']['tmp_name'],"../foto/".$_FILES['foto']['name']);
}else{
	//mensaje que no es valido el tipo de archivo
	$mensaje[]="El tipo de Archivo de imagen no es valido de la imagen";	
}

if(($_FILES['curriculum']['type']=="application/pdf" || $_FILES['curriculum']['type']=="application/msword" || $_FILES['curriculum']['type']=="application/vnd.openxmlformats-officedocument.wordprocessingml.document") && $_FILES['curriculum']['size']<="500000000"){
	@$curriculum=$_FILES['curriculum']['name'];
	@copy($_FILES['curriculum']['tmp_name'],"../curriculum/".$_FILES['curriculum']['name']);
}else{
	//mensaje que no es valido el tipo de archivo	
	$mensaje[]="Archivo no válido del curriculum. Verifique e intente nuevamente";
}
$e=$empleado->mostrarTodo("ci=$ci");
if(count($e)==1){
	$valores=array("ci"=>$ci,
					"ciudad"=>"'$ciudad'",
					"nombre"=>"'$nom'",
					"appaterno"=>"'$appat'",
					"apmaterno"=>"'$apmat'",
					"direccion"=>"'$dir'",
					"fechanac"=>"'$fechanac'",
					"fono"=>"'$telefono'",
					"foto"=>"'$foto'",
					"cargo"=>"'$cargo'",
					"fechain"=>"'$fechain'",
					"curriculum"=>"'$curriculum'"
					);
					$empleado->actualizar($valores,$id);
					$mensaje[]="SUS DATOS SE GUARDARON CORRECTAMENTE";
}else{
	$mensaje[]="Ya existe un empleado ya registrado con el mismo numero de carnet";
}


$titulo="Registro de Nuevo Personal";
$folder="../../";
include_once '../../mensajeresultado.php';
endif;?>