<?php
include_once("../../login/check.php");
if(!empty($_POST)):
include_once("../../class/contratacion.php");
$contratacion=new contratacion;
$codcontratado=$_POST['codcontratado'];
$codcontratante=$_POST['codcontratante'];
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
$valores=array("fechacont"=>"'$fechacontrato'",
			"tipocont"=>"'$tipocontrato'",
			"duracioncont"=>"'$duracioncontrato'",
			"salariocont"=>"'$salariocontrato'",
			"imgcontrato"=>"'$foto'",
			"codempcontratante"=>"$codcontratante",
			"codempcontratado"=>"$codcontratado"
			);
			$contratacion->insertar($valores);
				$mensaje[]="SU CONTRATO SE GUARDARON CORRECTAMENTE";


$titulo="Registro de Nueva Firma de Contrato";
$folder="../../";
include_once '../../mensajeresultado.php';
endif;?>