<?php
include_once("../../login/check.php");
include_once("../../impresion/pdf.php");
$titulo="Reporte General de Maquinarias";
extract($_GET);
class PDF extends PPDF{
	function Cabecera(){
		global $fecha,$anio,$mes,$dias;
		$this->TituloCabecera(10,"N");
		$this->TituloCabecera(100,"Obra");
		$this->TituloCabecera(50,"Empleado");
		$this->TituloCabecera(50,"Maquinaria");
		$this->TituloCabecera(40,"Maquinaria Tipo");
	}	
}


include_once("../../class/maquinaria.php");
include_once("../../class/licitacion.php");
$maquinaria=new maquinaria;
$licitacion=new licitacion;

$where="descrip LIKE '%$descripcion%' and tipo LIKE '%$tipo%' and estado LIKE '%$estado%'";


//echo $where;
$pdf=new PDF("L","mm","letter");
$pdf->AddPage();
foreach($maquinaria->mostrarTodoUnion("obramaquinaria om,obra o,empleado e,maquinaria m","om.codobramaquinaria,o.nombre,e.nombre as nombres,e.appaterno as paterno,e.apmaterno as materno,m.descrip,m.tipo","om.codobramaquinaria","om.codempleadooperador LIKE '%$codempleado%' and om.codobra LIKE '%$codobra%' and om.codmaquinaria LIKE '%$codmaquinaria%' and om.codempleadooperador=e.codempleado and om.codobra=o.codobra and om.codmaquinaria=m.codmaquinaria","om.") as $ad){$i++;
	//$o=array_shift($obra->mostrar($c['codobra']));
	//$e=array_shift($empleado->mostrar($c['codempleado']));
	$pdf->CuadroCuerpo(10,$i,0,"R");
	$pdf->CuadroCuerpo(100,$ad['nombre']);
	$pdf->CuadroCuerpo(50,$ad['nombres']." ".$ad['paterno']." ".$ad['materno'],0);
	$pdf->CuadroCuerpo(50,$ad['descrip'],0);
	$pdf->CuadroCuerpo(40,$ad['tipo'],0);
	$pdf->Ln();
}
$pdf->Output();
?>