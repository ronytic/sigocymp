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

	$valores=array("descrip"=>"'$descripcion'",
					"altura"=>"$altura",
					"ancho"=>"$ancho",
					"peso"=>"$peso",
					"precio"=>"$precio",
					"tipo"=>"'$tipo'",
					"cantidad"=>"$cantidad",
					"estado"=>"'$estado'",
					"obsmaq"=>"'$observacion'",
					"horometrocompra"=>"$horometro",
					
				);
	$maquinaria->insertar($valores);
	$mensaje[]="SUS DATOS DE LA MAQUINARIA SE GUARDARON CORRECTAMENTE";


$titulo="Registro de Nueva Maquinaria";
$folder="../../";
include_once '../../mensajeresultado.php';
endif;?>