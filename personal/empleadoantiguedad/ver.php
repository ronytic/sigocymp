<?php
include_once("../../login/check.php");
include_once("../../impresion/pdf.php");
$titulo="Reporte de Personal con Antigüedad";
extract($_GET);
class PDF extends PPDF{
	function Cabecera(){
		global $fecha,$anio,$mes,$dias;
		$this->CuadroCabecera(50,"Fecha de Referencia:",20,$fecha);
		$this->CuadroCabecera(50,"Tiempo Antigüedad, Años:",10,$anio);
		$this->CuadroCabecera(15,"Meses:",10,$mes);
		$this->CuadroCabecera(10,"Dias:",10,$dias);
		$this->Ln();
		$this->TituloCabecera(10,"N");
		$this->TituloCabecera(50,"Empleado");
		$this->TituloCabecera(70,"Dirección");
		$this->TituloCabecera(25,"FechaIngreso");
		$this->TituloCabecera(30,"Fecha Nac");
		$this->TituloCabecera(30,"Cargo");
		$this->TituloCabecera(30,"Teléfono");
	}	
}


include_once("../../class/obra.php");
include_once("../../class/contrato.php");
include_once("../../class/empleado.php");
$contrato=new contrato;
$obra=new obra;
$empleado=new empleado;
$where="fechain <=ADDDATE(ADDDATE(ADDDATE('$fecha', INTERVAL -$dias DAY),INTERVAL -$mes MONTH),INTERVAL -$anio YEAR)";


//echo $where;
$pdf=new PDF("L","mm","letter");
$pdf->AddPage();
foreach($empleado->mostrarTodos($where) as $e){$i++;
	//$o=array_shift($obra->mostrar($c['codobra']));
	//$e=array_shift($empleado->mostrar($c['codempleado']));
	$pdf->CuadroCuerpo(10,$i,0,"R");
	$pdf->CuadroCuerpo(50,$e['appaterno']." ".$e['apmaterno']." ".$e['nombre']);
	$pdf->CuadroCuerpo(70,$e['direccion'],0);
	$pdf->CuadroCuerpo(25,$e['fechain'],0);
	$pdf->CuadroCuerpo(30,$e['fechanac'],0);
	$pdf->CuadroCuerpo(30,$e['cargo'],0);
	$pdf->CuadroCuerpo(30,$c['duracioncontrato'],0);
	$pdf->CuadroCuerpo(30,$c['salariocontrato'],0);
	$pdf->Ln();
}
$pdf->Output();
?>