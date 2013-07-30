<?php
include_once '../../login/check.php';
$folder="../../";
$titulo="Modificar Adjudicación";
include_once '../../cabecerahtml.php';
$narchivo="adjudicacion";
include_once '../../class/'.$narchivo.'.php';
${$narchivo}=new $narchivo;
extract($_GET);

$n1archivo="licitacion";
include_once '../../class/'.$n1archivo.'.php';
${$n1archivo}=new $n1archivo;
$lic=todolista(${$n1archivo}->mostrarTodo(),"codlicitacion","titulo","");

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
						<td colspan="2"><?php campos("Codigo Entidad","codigoentidad","text",$datos['codigoentidad'],1,array("required"=>"required","size"=>"50"));?></td>
					</tr>
					<tr>
                    	<td colspan="2"><?php campos("Entidad","entidad","text",$datos['entidad'],0,array("required"=>"required","size"=>"50"));?></td>
					</tr>
                    <tr>
						<td colspan="2"><?php campos("Objeto de Contratación","objetocontratacion","text",$datos['objetocontratacion'],0,array("required"=>"required","size"=>"50"));?></td>
					</tr>
                    <tr>
						<td colspan="2"><?php campos("Fecha Periodo","fechaperiodo","date",$datos['fechaperiodo'],0,array("required"=>"required","size"=>"50"));?></td>
					</tr>
					<tr>
						<td colspan="2"><?php campos("Licitación","codlicitacion","select",$lic,0,"",$datos['codlicitacion']);?></td>
					</tr>
                    <tr>
                    	<td colspan="2"><?php campos("Modalidad","modalidad","text",$datos['modalidad'],0,array("required"=>"required","size"=>"50"));?></td>
                    </tr>
                    <tr>
                    	<td colspan="2"><?php campos("Tipo Contratación","tipocontratacion","text",$datos['tipocontratacion'],0,array("required"=>"required","size"=>"50"));?></td>
                    </tr>
                    <tr>
                    	<td colspan="2"><?php campos("Observaciones","obs","textarea",$datos['obs'],0,array("rows"=>"10","cols"=>"40"));?></td>
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