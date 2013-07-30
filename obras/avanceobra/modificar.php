<?php
include_once '../../login/check.php';
$folder="../../";
$titulo="Modificar Avance de Obra";
extract($_GET);
$narchivo="avanceobra";
include_once '../../class/'.$narchivo.'.php';
${$narchivo}=new $narchivo;
$datos=array_shift(${$narchivo}->mostrar($id));

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
						<td colspan="2"><?php campos("Numero Avance","numeroavance","text",$datos['numeroavance'],1,array("required"=>"required","size"=>"50"));?></td>
					</tr>
                    <tr>
						<td colspan="2"><?php campos("Fecha Avance","fechaavance","date",$datos['fechaavance'],0,array("required"=>"required","size"=>"50"));?></td>
					</tr>
                    <tr>
						<td colspan="2"><?php campos("Descripción","descripcion","text",$datos['descripcion'],0,array("required"=>"required","size"=>"50"));?></td>
					</tr>
                    <tr>
						<td colspan="2"><?php campos("Planilla Digital","planilladigital","text",$datos['planilladigital'],0,array("required"=>"required","size"=>"50"));?></td>
					</tr>
                    <tr>
                    	<td colspan="2"><?php campos("Observación","obs","textarea",$datos['obs'],0,array("rows"=>"10","cols"=>"40"));?></td>
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