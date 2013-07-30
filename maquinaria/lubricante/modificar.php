<?php
include_once '../../login/check.php';
$folder="../../";
$titulo="Modificar Lubricante";

extract($_GET);
$narchivo="lubricante";
include_once '../../class/'.$narchivo.'.php';
${$narchivo}=new $narchivo;
$datos=array_shift(${$narchivo}->mostrar($id));



$n1archivo="fichakardex";
include_once '../../class/'.$n1archivo.'.php';
${$n1archivo}=new $n1archivo;
$fk=todolista(${$n1archivo}->mostrarTodo(),"codfichakardex","fechakardex,detalleservicio"," - ");

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
                    	<td colspan="2"><?php campos("Ficha kardex","codfichakardex","select",$fk,0,"",$datos['codfichakardex']);?></td>
                        <td colspan="2"><?php campos("Descripción","descripcion","text",$datos['descripcion'],1);?></td>
					</tr>
					<tr>
						<td colspan="2"><?php campos("Unidad Medida","unidadmedida","text",$datos['unidadmedida'],0,array("size"=>30));?></td>
                        <td colspan="2"><?php campos("Cantidad","cantidad","text",$datos['cantidad'],0,array("size"=>30));?></td>
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