<?php
include_once("../../login/check.php");
include_once("../../impresion/pdf.php");
$titulo="Reporte General de Adjudicaciones";
extract($_GET);
class PDF extends PPDF{
	function Cabecera(){
		global $fecha,$anio,$mes,$dias;
		$this->CuadroCabecera(50,"Fecha de Referencia:",20,$fecha);
		$this->Ln();
		$this->TituloCabecera(10,"N");
		$this->TituloCabecera(30,"Código Entidad");
		$this->TituloCabecera(50,"Entidad");
		$this->TituloCabecera(45,"Objeto Contratación");
		$this->TituloCabecera(30,"Fecha Periodo");
		$this->TituloCabecera(50,"Modalidad");
		$this->TituloCabecera(40,"Tipo Contratación");
	}	
}


include_once("../../class/adjudicacion.php");
include_once("../../class/licitacion.php");
$adjudicacion=new adjudicacion;
$licitacion=new licitacion;

$where="codigoentidad LIKE '%$codigoentidad%' and entidad LIKE '%$entidad%' and objetocontratacion LIKE '%$objetocontratacion%' and modalidad LIKE '%$modalidad%'";


//echo $where;
$pdf=new PDF("L","mm","letter");
$pdf->AddPage();
foreach($adjudicacion->mostrarTodos($where) as $ad){$i++;
	//$o=array_shift($obra->mostrar($c['codobra']));
	//$e=array_shift($empleado->mostrar($c['codempleado']));
	$pdf->CuadroCuerpo(10,$i,0,"R");
	$pdf->CuadroCuerpo(30,$ad['codigoentidad']);
	$pdf->CuadroCuerpo(50,$ad['entidad'],0);
	$pdf->CuadroCuerpo(45,$ad['objetocontratacion'],0);
	$pdf->CuadroCuerpo(30,$ad['fechaperiodo'],0);
	$pdf->CuadroCuerpo(50,$ad['modalidad'],0);
	$pdf->CuadroCuerpo(40,$ad['tipocontratacion'],0);
	$pdf->Ln();
}
$pdf->Output();
?>