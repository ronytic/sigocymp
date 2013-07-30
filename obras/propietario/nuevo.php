<?php
include_once '../../login/check.php';
$folder="../../";
$titulo="Registro de Nuevo Propietario";
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
						<td><?php campos("Nit/CI","nitci","text","",1,array("required"=>"required"));?></td>
						<td><?php campos("Razon Social","razonsocial","text");?></td>
					</tr>
					<tr>
						<td><?php campos("Dirección","direccion","text","");?></td>
                        <td><?php campos("Contacto","contacto","text");?></td>
					</tr>
                    <tr>
						<td><?php campos("Telefono Contacto","fonocontacto","text","");?></td>
                        <td><?php campos("Email Contacto","emailcontacto","text");?></td>
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