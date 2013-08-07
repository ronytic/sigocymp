<?php
include_once("../../login/check.php");
include_once("../../impresion/pdf.php");
$titulo="Reporte de Personal Contratos hasta la Fecha";
extract($_GET);
class PDF extends PPDF{
	function Cabecera(){
		global $fechacontrato;
		$this->CuadroCabecera(50,"Fecha Limite de Contrato",20,$fechacontrato);
		$this->Ln();
		$this->TituloCabecera(10,"N");
		$this->TituloCabecera(50,"Empleado");
		$this->TituloCabecera(50,"Obra");
		$this->TituloCabecera(20,"FechaCont");
		$this->TituloCabecera(30,"Cargo");
		$this->TituloCabecera(30,"Tipo Contrato");
		$this->TituloCabecera(30,"Duración Cont.");
		$this->TituloCabecera(30,"Salario Cont.");
	}	
}


include_once("../../class/obra.php");
include_once("../../class/contrato.php");
include_once("../../class/empleado.php");
$contrato=new contrato;
$obra=new obra;
$empleado=new empleado;
$where='';
if(!empty($fechacontrato)){
	$where="`fechacontrato`<='$fechacontrato'";
}
if(!empty($codobra)){
	$where=(empty($fechacontrato))?"`codobra`=$codobra":$where." and `codobra`=$codobra";
}
if(!empty($tipocontrato)){
	$where=(empty($where))?$where."`tipocontrato` LIKE '%$tipocontrato%'":$where." and `tipocontrato` LIKE '%$tipocontrato%'";
}

//echo $where;
$pdf=new PDF("L","mm","letter");
$pdf->AddPage();
foreach($contrato->mostrarTodos($where) as $c){$i++;
	$o=array_shift($obra->mostrar($c['codobra']));
	$e=array_shift($empleado->mostrar($c['codempleado']));
	$pdf->CuadroCuerpo(10,$i,0,"R");
	$pdf->CuadroCuerpo(50,$e['appaterno']." ".$e['apmaterno']." ".$e['nombre']);
	$pdf->CuadroCuerpo(50,$o['nombre'],0);
	$pdf->CuadroCuerpo(20,$c['fechacontrato'],0);
	$pdf->CuadroCuerpo(30,$c['cargo'],0);
	$pdf->CuadroCuerpo(30,$c['tipocontrato'],0);
	$pdf->CuadroCuerpo(30,$c['duracioncontrato'],0);
	$pdf->CuadroCuerpo(30,$c['salariocontrato'],0);
	$pdf->Ln();
}
$pdf->Output();
?>