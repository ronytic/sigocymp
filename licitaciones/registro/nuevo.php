<?php
include_once '../../login/check.php';
$folder="../../";
$titulo="Registro de Nueva Licitación";
include_once '../../funciones/funciones.php';
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
						<td colspan="2"><?php campos("Titulo","titulo","text","",1,array("required"=>"required","size"=>"50"));?></td>
					</tr>
					<tr>
                    	<td colspan="2"><?php campos("Descripción","descripcion","text","",0,array("required"=>"required","size"=>"50"));?></td>
					</tr>
					<tr>
						<td colspan="2"><?php campos("Documento Digital","documentodigital","file","");?></td>
					</tr>
                    <tr>
						<td><?php campos("Entidad","entidad","text","");?></td>
                        <td><?php campos("Fecha de Publicacion","fechapublicacion","date");?></td>
					</tr>
                    <tr>
                    	<td colspan="2"><?php campos("Observaciones","obs","textarea","",0,array("rows"=>"10","cols"=>"40"));?></td>
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