<?php
include_once '../../login/check.php';
$folder="../../";
$titulo="Registro de Nuevo Documento de Adjudicación";
include_once '../../funciones/funciones.php';

$n2archivo="adjudicacion";
include_once '../../class/'.$n2archivo.'.php';
${$n2archivo}=new $n2archivo;
$datos2=todolista(${$n2archivo}->mostrarTodo(),"codadjudicacion","codigoentidad,objetocontratacion","-");

$n1archivo="documentocomun";
include_once '../../class/'.$n1archivo.'.php';
${$n1archivo}=new $n1archivo;
$datos1=todolista(${$n1archivo}->mostrarTodo(),"coddocumentocomun","nombre,tipo","-");

include_once '../../cabecerahtml.php';
?>
<?php include_once '../../cabecera.php';?>
<div class="grid_12">
	<div class="contenido">
    	<div class="prefix_3 grid_4 alpha">
			<fieldset>
				<div class="titulo"><?php echo $titulo;?></div>
                <form action="guardar.php" method="post" enctype="multipart/form-data">
				<table class="tablareg">
                    <tr>
						<td colspan="2"><?php campos("Adjudicación","codadjudicacion","select",$datos2,0,"",$_GET['codadjudicacion']);?></td>
					</tr>
                     <tr>
						<td colspan="2"><?php campos("Documento Común","coddocumentocomun","select",$datos1);?></td>
					</tr>
                    <tr>
                    	<td colspan="2"><?php campos("Observación","obs","textarea","",0,array("rows"=>"10","cols"=>"40"));?></td>
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