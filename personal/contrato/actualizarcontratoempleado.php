<?php
include_once("../../login/check.php");
if(!empty($_POST)):
include_once("../../class/contrato.php");
$contrato=new contrato;
$id=$_POST['id'];
$nombre=$_POST['nombrecontrato'];
$plantilla=htmlspecialchars($_POST['plantilla']);
//empieza la copia de archivos
$valores=array(
				"nombrecontrato"=>"'$nombre'",
				"contrato"=>"'$plantilla'",
					);
					$contrato->actualizar($valores,$id);
					$mensaje[]="SUS DATOS SE GUARDARON CORRECTAMENTE";

$titulo="Actualizdo del Contrato";
$folder="../../";
$archivolistar="listarempleado.php";
include_once '../../mensajeresultado.php';
endif;?>