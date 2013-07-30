<?php
include_once("bd.php");
class usuarios extends bd{
	var $tabla="usuarios";
	function loginUsuarios($Usuario,$Password){
		$this->campos=array("count(*) as Can,idusuarios,nivel");	
		return $this->getRecords("usuario='$Usuario' and password=MD5('$Password') and activo=1");
	}
	function mostrar($cod){
		$this->campos=array("*");	
		return $this->getRecords("idusuarios='$cod' and activo=1");
	}
}
?>