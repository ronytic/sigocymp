<?php
include_once '../../login/check.php';
$folder="../../";
$titulo="Registro de Nueva Obra";
include_once '../../funciones/funciones.php';
$narchivo="propietario";
include_once '../../class/'.$narchivo.'.php';
${$narchivo}=new $narchivo;
$pro=todolista(${$narchivo}->mostrarTodo(),"codpropietario","razonsocial","");
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
                <form action="guardar.php" method="post" enctype="multipart/form-data">
				<table class="tablareg">
					<tr>
						<td><?php campos("Nombre Obra","nombre","text","",1,array("required"=>"required"));?></td>
						<td><?php campos("Lugar","lugar","text");?></td>
                    </tr>
					<tr>
                    	<td colspan="2"><?php campos("Descripción","descripcion","text","",0,array("size"=>"50"));?></td>
					</tr>
					<tr>
						<td><?php campos("Fecha Inicio","fechainicio","date","");?></td>
                        <td><?php campos("Fecha Fin","fechafin","date");?></td>
					</tr>
                    <tr>
						<td colspan="2"><?php campos("Propietario","codpropietario","select",$pro);?></td>
                    </tr>
                    <tr>
                        <td colspan="2"><?php campos("Adjudicación","codadjudicacion","select",$adj);?></td>
					</tr>
                    <tr>
                        <td colspan="2"><?php campos("Observación","obs","textarea");?></td>
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