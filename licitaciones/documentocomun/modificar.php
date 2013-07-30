<?php
include_once '../../login/check.php';
$folder="../../";
$titulo="Modificar Archivo Comun";
extract($_GET);
$narchivo="documentocomun";
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
						<td colspan="2"><?php campos("Nombre","nombre","text",$datos['nombre'],1,array("required"=>"required","size"=>"50"));?></td>
					</tr>
                    <tr>
						<td colspan="2"><?php campos("Tipo","tipo","text",$datos['tipo'],0,array("required"=>"required","size"=>"50"));?></td>
					</tr>
                    <tr>
						<td colspan="2"><?php campos("Descripción","descripcion","text",$datos['descripcion'],0,array("required"=>"required","size"=>"50"));?></td>
					</tr>
					<tr>
                    	<td colspan="2"><?php campos("Documento Digital","documentodigital","file");?></td>
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