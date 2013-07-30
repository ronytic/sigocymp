<?php
include_once '../../login/check.php';
$folder="../../";
$titulo="Modificar Material Usado de Obra";

extract($_GET);
$narchivo="materialusado";
include_once '../../class/'.$narchivo.'.php';
${$narchivo}=new $narchivo;
$datos=array_shift(${$narchivo}->mostrar($id));



$n1archivo="avanceobra";
include_once '../../class/'.$n1archivo.'.php';
${$n1archivo}=new $n1archivo;
$avan=todolista(${$n1archivo}->mostrarTodo(),"codavanceobra","numeroavance,descripcion","-");
$n2archivo="materialobra";
include_once '../../class/'.$n2archivo.'.php';
${$n2archivo}=new $n2archivo;
$mat=todolista(${$n2archivo}->mostrarTodo(),"codmaterialobra","descripcion","");

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
                    	<td colspan="2"><?php campos("Avance de Obra","codavanceobra","select",$avan,0,"",$datos['codavanceobra']);?></td>
                        <td colspan="2"><?php campos("Material Obra","codmaterialobra","select",$mat,0,"",$datos['codmaterialobra']);?></td>
					</tr>
					<tr>
						<td colspan="2"><?php campos("Fecha de Uso","fechauso","date",$datos['fechauso'],1,array("size"=>30));?></td>
                        <td colspan="2"><?php campos("Cantidad","cantidad","text",$datos['cantidad'],1,array("size"=>30));?></td>
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