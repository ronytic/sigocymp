<?php  
include_once("../../login/check.php");
if (!empty($_GET)) {
	$nombre="fichakardex";
	include_once '../../class/'.$nombre.'.php';
	${$nombre}=new $nombre;
	$id=$_GET['id'];
	$fecha=date("Y-m-d");
	$hora=date("H:i:s");
	$valores=array("activo"=>0,"idelimina"=>$_SESSION['CodUsuarioLog'],"fechaelimina"=>"'$fecha'","horaelimina"=>"'$hora'");
	${$nombre}->actualizar($valores,$id);
}
?>