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
				);
					$contrato->insertar($valores);
					$mensaje[]="SUS DATOS SE GUARDARON CORRECTAMENTE";

$titulo="Registro de Nuevo Contrato";
$folder="../../";
$archivolistar="listarempleado.php";
include_once '../../mensajeresultado.php';
endif;?>