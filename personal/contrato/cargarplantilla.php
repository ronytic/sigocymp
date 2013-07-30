<?php
include_once '../../login/check.php';
$id=$_POST['id'];

include_once '../../class/plantilla.php';
$plantilla=new plantilla;
$plan=array_shift($plantilla->mostrar($id));
 campos("Plantilla","plantilla","textarea","","",array("class"=>"ckeditor","rows"=>50,"cols"=>90));
?>