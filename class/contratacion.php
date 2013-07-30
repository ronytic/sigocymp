<?php
include_once("bd.php");
class contratacion extends bd{
	var $tabla="contratacion";
	function contratoEmpleado($where){
		$this->tabla="contratacion c,empleado e";
		$this->campos=array('*');
		$orden=$orden?$orden:"e.codempleado";
		$condicion=$where?$where.' and ':'';
		if($cantidad==0)
			return $this->getRecords($condicion."c.activo=1 and c.activo=1",$orden,0,0,0,0);
		else
			return $this->getRecords($condicion."c.activo=1 and c.activo=1",$orden,0,$cantidad,0,0);
	}
}
?>