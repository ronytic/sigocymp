<?php
include_once '../../login/check.php';
$folder="../../";
$titulo="Modificar Ficha Kardex";

extract($_GET);
$narchivo="fichakardex";
include_once '../../class/'.$narchivo.'.php';
${$narchivo}=new $narchivo;
$datos=array_shift(${$narchivo}->mostrar($id));



$n1archivo="maquinaria";
include_once '../../class/'.$n1archivo.'.php';
${$n1archivo}=new $n1archivo;
$maq=todolista(${$n1archivo}->mostrarTodo(),"codmaquinaria","descrip","");
$n2archivo="obra";
include_once '../../class/'.$n2archivo.'.php';
${$n2archivo}=new $n2archivo;
$obra=todolista(${$n2archivo}->mostrarTodo(),"codobra","nombre,lugar","");
$n3archivo="empleado";
include_once '../../class/'.$n3archivo.'.php';
${$n3archivo}=new $n3archivo;
$emp=todolista(${$n3archivo}->mostrarTodo(),"codempleado","nombre,appaterno,apmaterno"," ");

include_once '../../cabecerahtml.php';
?>
<?php include_once '../../cabecera.php';?>
<div class="grid_12">
	<div class="contenido">
    	<div class="prefix_3 grid_4 alpha">
			<fieldset>
				<div class="titulo"><?php echo $titulo;?></div>
                <form action="actualizar.php" method="post" enctype="multipart/form-data">
                <?php campos("","id","hidden",$id);?>
				<table class="tablareg">
                	<tr>
                    	<td colspan="2"><?php campos("Maquinaria","codmaquinaria","select",$maq,0,"",$datos['codmaquinaria']);?></td>
                        <td colspan="2"><?php campos("Empleado","codempleadooperador","select",$emp,0,"",$datos['codempleadooperador']);?></td>
                        
					</tr>
                    <tr>
                    	<td colspan="4"><?php campos("Obra","codobra","select",$obra,0,"",$datos['codobra']);?></td>
                    </tr>
					<tr>
						<td colspan="2"><?php campos("Fecha de Kardex","fechakardex","date",$datos['fechakardex'],1,array("size"=>30));?></td>
                        
                    </tr>
                    <tr>
	                    <td colspan="2"><?php campos("Horometro Inicial","horometroinicial","text",$datos['horometroinicial'],1,array("size"=>30));?></td>
                    	<td colspan="2"><?php campos("Horometro Fin","horometrofin","text",$datos['horometrofin'],1,array("size"=>30));?></td>
                    </tr>
                    <tr>
	                    <td colspan="2"><?php campos("Hora Ingreso","horaingreso","text",$datos['horaingreso'],1,array("size"=>30));?></td>
                    	<td colspan="2"><?php campos("Hora Salida","horasalida","text",$datos['horasalida'],1,array("size"=>30));?></td>
                    </tr>
                    <tr>
                    	<td colspan="4"><?php campos("Detalle Servicio","detalleservicio","textarea",$datos['detalleservicio'],1,array("size"=>30,"cols"=>50,"rows"=>10));?></td>
                    </tr>
                    <tr>
						<td colspan="4"><?php campos("Observación","obs","textarea",$datos['obs'],1,array("size"=>30,"cols"=>50,"rows"=>10));?></td>
                    </tr>
					<tr><td></td><td><?php campos("Guardar","guardar","submit");?></td><td></td></tr>
				</table>
                </form>
			</fieldset>
		</div>
    	<div class="clear"></div>
    </div>
</div>
<?php include_once '../../piepagina.php';?>