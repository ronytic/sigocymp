<?php
include_once '../../login/check.php';
$folder="../../";
$titulo="Modificar Propietario";
include_once '../../cabecerahtml.php';
$narchivo="propietario";
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
						<td><?php campos("Nit/CI","nitci","text",$datos['nitci'],1,array("required"=>"required"));?></td>
						<td><?php campos("Razon Social","razonsocial","text",$datos['razonsocial']);?></td>
					</tr>
					<tr>
						<td><?php campos("Dirección","direccion","text",$datos['direccion']);?></td>
                        <td><?php campos("Contacto","contacto","text",$datos['contacto']);?></td>
					</tr>
                    <tr>
						<td><?php campos("Telefono Contacto","fonocontacto","text",$datos['fonocontacto']);?></td>
                        <td><?php campos("Email Contacto","emailcontacto","text",$datos['emailcontacto']);?></td>
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