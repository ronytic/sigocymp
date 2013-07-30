<?php
include_once("bd.php");
class contrato extends bd{
	var $tabla="contrato";
	function contratoEmpleado($where){
		$this->tabla="contrato c,empleado e";
		$this->campos=array('*');
		$orden=$orden?$orden:"e.codempleado";
		$condicion=$where?$where.' and ':'';
		if($cantidad==0)
			return $this->getRecords($condicion."e.activo=1 and c.activo=1",$orden,0,0,0,0);
		else
			return $this->getRecords($condicion."e.activo=1 and c.activo=1",$orden,0,$cantidad,0,0);
	}
}
?>