<?php
include_once("bd.php");
class adjudicacion extends bd{
	function CantidadPorGrupo(){
		$this->campos=array("count(*)as Cantidad,entidad");
		return $this->getRecords("activo=1",0,"entidad");
	}
}
?>