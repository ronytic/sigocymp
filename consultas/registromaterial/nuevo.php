<?php
include_once '../../login/check.php';
$folder="../../";
$titulo="Registro de Nuevo Material";
include_once '../../funciones/funciones.php';
$narchivo="licitacion";
include_once '../../class/'.$narchivo.'.php';
${$narchivo}=new $narchivo;
$lic=todolista(${$narchivo}->mostrarTodo(),"codlicitacion","titulo","");
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
						<td colspan="2"><?php campos("Material","nombre","text","",1,array("required"=>"required","size"=>"50"));?></td>
					</tr>
					<tr>
                    	<td colspan="2"><?php campos("Unidad Medida","unidadmedida","text","",0,array("required"=>"required","size"=>"50"));?></td>
					</tr>
                    <tr>
						<td colspan="2"><?php campos("Precio Unitario","preciounitario","text","",0,array("required"=>"required","size"=>"50"));?></td>
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