<?php
include_once("../../login/check.php");
if(!empty($_POST)):
include_once("../../class/plantilla.php");
$plantilla=new plantilla;
$nombre=$_POST['nombre'];
$descripccion=$_POST['descripcion'];
$detalleplantilla=htmlspecialchars($_POST['plantilla']);
//empieza la copia de archivos
$valores=array("nomplantilla"=>"'$nombre'",
					"desplantilla"=>"'$descripccion'",
					"detalleplantilla"=>"'$detalleplantilla'",
					);
					$plantilla->insertar($valores);
					$mensaje[]="SUS DATOS SE GUARDARON CORRECTAMENTE";

$titulo="Registro de Nuevo Plantilla";
$folder="../../";
$archivolistar="listarplantilla.php";
include_once '../../mensajeresultado.php';
endif;?>