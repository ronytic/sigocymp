<?php
include_once("../../login/check.php");
include_once("../../impresion/pdf.php");
$titulo="Reporte de Licitaciones presentadas hasta la Fecha";
extract($_GET);
class PDF extends PPDF{
	function Cabecera(){
		global $fecha,$anio,$mes,$dias;
		$this->CuadroCabecera(50,"Fecha de Referencia:",20,$fecha);
		$this->Ln();
		$this->TituloCabecera(10,"N");
		$this->TituloCabecera(50,"titulo");
		$this->TituloCabecera(70,"descripcion");
		$this->TituloCabecera(35,"entidad");
		$this->TituloCabecera(30,"fechapublicacion");
		$this->TituloCabecera(50,"observación");
	}	
}


include_once("../../class/licitacion.php");
$licitacion=new licitacion;

$where="fechapublicacion <='$fecha'";


//echo $where;
$pdf=new PDF("L","mm","letter");
$pdf->AddPage();
foreach($licitacion->mostrarTodos($where) as $l){$i++;
	//$o=array_shift($obra->mostrar($c['codobra']));
	//$e=array_shift($empleado->mostrar($c['codempleado']));
	$pdf->CuadroCuerpo(10,$i,0,"R");
	$pdf->CuadroCuerpo(50,$l['titulo']);
	$pdf->CuadroCuerpo(70,$l['descripcion'],0);
	$pdf->CuadroCuerpo(35,$l['entidad'],0);
	$pdf->CuadroCuerpo(30,$l['fechapublicacion'],0);
	$pdf->CuadroCuerpo(50,$l['obs'],0);
	$pdf->Ln();
}
$pdf->Output();
?>