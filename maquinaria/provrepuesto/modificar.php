<?php
include_once '../../login/check.php';
$folder="../../";
$titulo="Modificar Proveedor Repuesto";
include_once '../../cabecerahtml.php';
$narchivo="proveedorrepuesto";
include_once '../../class/'.$narchivo.'.php';
${$narchivo}=new $narchivo;
extract($_GET);

$prov=array_shift(${$narchivo}->mostrar($id));

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
						<td><?php campos("Nombre Proveedor","nombre","text",$prov['nombre'],1,array("required"=>"required"));?></td>
						<td><?php campos("Direccion Proveedor","direccion","text",$prov['direccion']);?></td>
					</tr>
					<tr>
						<td><?php campos("Teléfono Proveedor","telefono","text",$prov['telefono']);?></td>
                        <td><?php campos("Email Proveedor","mail","text",$prov['mail']);?></td>
					</tr>
					<tr><td></td><td><?php campos("Guardar Proveedor","guardar","submit");?></td><td></td></tr>
				</table>
                </form>
			</fieldset>
		</div>
    	<div class="clear"></div>
    </div>
</div>
<?php include_once '../../piepagina.php';?>