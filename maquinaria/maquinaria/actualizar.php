<?php
include_once("../../login/check.php");
if(!empty($_POST)):
$narchivo="maquinaria";
include_once '../../class/'.$narchivo.'.php';
${$narchivo}=new $narchivo;
$id=$_POST['id'];
$descripcion=$_POST['descripcion'];
$altura=$_POST['altura'];
$ancho=$_POST['ancho'];
$peso=$_POST['peso'];
$precio=$_POST['precio'];
$tipo=$_POST['tipo'];
$cantidad=$_POST['cantidad'];
$estado=$_POST['estado'];
$horometro=$_POST['horometro'];
$empleado=$_POST['empleado']==""?0:$_POST['empleado'];
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
	${$narchivo}->actualizar($valores,$id);
	$mensaje[]="SUS DATOS DE LA MAQUINARIA SE GUARDARON CORRECTAMENTE";


$titulo="Actualización de la Maquinaria";
$folder="../../";
include_once '../../mensajeresultado.php';
endif;?>