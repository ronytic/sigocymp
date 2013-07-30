<?php
include_once '../../login/check.php';
$folder="../../";
$titulo="Modificar Mantenimiento de Maquinaria";

extract($_GET);
$narchivo="mantenimientomaquinaria";
include_once '../../class/'.$narchivo.'.php';
${$narchivo}=new $narchivo;
$datos=array_shift(${$narchivo}->mostrar($id));



$n1archivo="maquinaria";
include_once '../../class/'.$n1archivo.'.php';
${$n1archivo}=new $n1archivo;
$maq=todolista(${$n1archivo}->mostrarTodo(),"codmaquinaria","descrip","");
$n2archivo="repuesto";
include_once '../../class/'.$n2archivo.'.php';
${$n2archivo}=new $n2archivo;
$rep=todolista(${$n2archivo}->mostrarTodo(),"codrepuesto","descripcion","");

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
                        <td colspan="2"><?php campos("Repuesto","codrepuesto","select",$rep,0,"",$datos['codrepuesto']);?></td>
					</tr>
					<tr>
						<td colspan="2"><?php campos("Fecha de Mantenimiento","fechamantenimiento","date",$datos['fechamantenimiento'],1,array("size"=>30));?></td>
                        <td colspan="2"><?php campos("Cantidad","cantidad","text",$datos['cantidad'],1,array("size"=>30));?></td>
                    </tr>
                    <tr>
                    	<td colspan="2"><?php campos("Titulo","titulo","text",$datos['titulo'],1,array("size"=>30));?></td>
                        <td colspan="2"><?php campos("Detalle","detalle","text",$datos['detalle'],1,array("size"=>30));?></td>
                    </tr>
                    <tr>
						<td colspan="2"><?php campos("Observación","obs","text",$datos['obs'],1,array("size"=>30));?></td>
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