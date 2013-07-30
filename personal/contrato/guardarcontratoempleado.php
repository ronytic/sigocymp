<?php
include_once("../../login/check.php");
if(!empty($_POST)):
include_once("../../class/contrato.php");
$contrato=new contrato;
$id=$_POST['id'];
$nombre=$_POST['nombrecontrato'];
$plantilla=htmlspecialchars($_POST['plantilla']);
//empieza la copia de archivos
$valores=array("codempleado"=>"'$id'",
				"nombrecontrato"=>"'$nombre'",
					"contrato"=>"'$plantilla'",
					);
					$contrato->insertar($valores);
					$mensaje[]="SUS DATOS SE GUARDARON CORRECTAMENTE";

$titulo="Registro de Nuevo Contrato";
$folder="../../";
$archivolistar="listarempleado.php";
include_once '../../mensajeresultado.php';
endif;?>