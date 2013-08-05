<?php
include_once("../../impresion/pdf.php");
$titulo="Presupuesto";
include_once("../../class/material.php");
$material=new material;
class PDF extends PPDF{
	function Cabecera(){
		$this->TituloCabecera(10,"N");
		$this->TituloCabecera(65,"Material");	
		$this->TituloCabecera(40,"Unidad");	
		$this->TituloCabecera(20,"Precio Uni");	
		$this->TituloCabecera(20,"Cantidad");	
		$this->TituloCabecera(20,"Total");	
	}
}
$mat=$_POST['m'];
$pdf=new PDF;
$pdf->AddPage();
$st=0;
$tt=0;
$i=0;
foreach($mat as $m){
	if($m['codmaterial']=="linea"){
		$pdf->CuadroCuerpoResaltar(155,"Subtotal",1,"R",1,1);
		$pdf->CuadroCuerpoResaltar(20,$st,1,"R",1,1);
		$st=0;
	}else{$i++;
		$mate=array_shift($material->mostrar($m['codmaterial']));
		$t=$mate['preciounitario']*$m['cantidad'];
		$pdf->CuadroCuerpo(10,$i,0,"R",1);
		$pdf->CuadroCuerpo(65,$mate['nombre'],0,"",1);
		$pdf->CuadroCuerpo(40,$mate['unidadmedida'],0,"",1);
		$pdf->CuadroCuerpo(20,$mate['preciounitario'],0,"C",1);
		$pdf->CuadroCuerpo(20,$m['cantidad'],0,"C",1);
		$pdf->CuadroCuerpo(20,$t,0,"R",1);
		$st+=$t;
		$tt+=$t;
	}
	$pdf->ln();	
}
$pdf->CuadroCuerpoResaltar(155,"Total Presupuesto",1,"R",1,1);
$pdf->CuadroCuerpoResaltar(20,$tt,1,"R",1,1);
$pdf->Output();
?>