<?php
include_once '../../login/check.php';
$folder="../../";
$titulo="Modificar Adjudicación";
include_once '../../cabecerahtml.php';
$narchivo="material";
include_once '../../class/'.$narchivo.'.php';
${$narchivo}=new $narchivo;
extract($_GET);


$datos=array_shift(${$narchivo}->mostrar($id));

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
						<td colspan="2"><?php campos("Material","nombre","text",$datos['nombre'],1,array("required"=>"required","size"=>"50"));?></td>
					</tr>
					<tr>
                    	<td colspan="2"><?php campos("Unidad Medida","unidadmedida","text",$datos['unidadmedida'],0,array("required"=>"required","size"=>"50"));?></td>
					</tr>
                    <tr>
						<td colspan="2"><?php campos("Precio Unitario","preciounitario","text",$datos['preciounitario'],0,array("required"=>"required","size"=>"50"));?></td>
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