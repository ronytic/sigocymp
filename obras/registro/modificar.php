<?php
include_once '../../login/check.php';
$folder="../../";
$titulo="Modificar Obra";

extract($_GET);
$narchivo="obra";
include_once '../../class/'.$narchivo.'.php';
${$narchivo}=new $narchivo;
$datos=array_shift(${$narchivo}->mostrar($id));



$n2archivo="propietario";
include_once '../../class/'.$n2archivo.'.php';
${$n2archivo}=new $n2archivo;
$pro=todolista(${$n2archivo}->mostrarTodo(),"codpropietario","razonsocial","");

$n1archivo="adjudicacion";
include_once '../../class/'.$n1archivo.'.php';
${$n1archivo}=new $n1archivo;
$adj=todolista(${$n1archivo}->mostrarTodo(),"codadjudicacion","codigoentidad,entidad","-");

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
						<td><?php campos("Nombre Obra","nombre","text",$datos['nombre'],1,array("required"=>"required"));?></td>
						<td><?php campos("Lugar","lugar","text",$datos['lugar']);?></td>
                    </tr>
					<tr>
                    	<td colspan="2"><?php campos("Descripción","descripcion","text",$datos['descripcion'],0,array("size"=>"50"));?></td>
					</tr>
					<tr>
						<td><?php campos("Fecha Inicio","fechainicio","date",$datos['fechainicio']);?></td>
                        <td><?php campos("Fecha Fin","fechafin","date",$datos['fechafin']);?></td>
					</tr>
                    <tr>
						<td colspan="2"><?php campos("Propietario","codpropietario","select",$pro,0,"",$datos['codpropietario']);?></td>
                    </tr>
                    <tr>
                        <td colspan="2"><?php campos("Adjudicación","codadjudicacion","select",$adj,0,"",$datos['codadjudicacion']);?></td>
					</tr>
                    <tr>
                        <td colspan="2"><?php campos("Observación","obs","textarea",$datos['obs']);?></td>
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