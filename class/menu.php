<?php 
include_once("bd.php");
class menu extends bd{
	var $tabla="menu";
	function mostrarMenu($codUsuario){
		$this->campos=array("*");
		switch ($codUsuario) {
			case 1:{return $this->getRecords("superadmin=1 and activo=1");}break;
			case 2:{return $this->getRecords("gerente=1 and activo=1");}break;
			case 3:{return $this->getRecords("supervisorobras=1 and activo=1");}break;
			case 4:{return $this->getRecords("supervisormaquinas=1 and activo=1");}break;
			case 5:{return $this->getRecords("secretaria=1 and activo=1");}break;
			case 6:{return $this->getRecords("obrero=1 and activo=1");}break;
		}
	}
}
?>