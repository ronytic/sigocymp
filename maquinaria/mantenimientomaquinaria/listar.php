<?php
include_once("../../login/check.php");
$titulo="Listado de Mantenimiento de Maquinaria";
$folder="../../";
include_once("../../funciones/funciones.php");

$n1archivo="maquinaria";
include_once '../../class/'.$n1archivo.'.php';
${$n1archivo}=new $n1archivo;
$maq=todolista(${$n1archivo}->mostrarTodo(),"codmaquinaria","descrip","-");
$n2archivo="repuesto";
include_once '../../class/'.$n2archivo.'.php';
${$n2archivo}=new $n2archivo;
$rep=todolista(${$n2archivo}->mostrarTodo(),"codrepuesto","descripcion","");

include_once "../../cabecerahtml.php";
?>
<?php include_once "../../cabecera.php";?>
<div class="grid_12">
	<div class="contenido">
    	<div class="grid_8 prefix_2 alpha">
        	<fieldset>
        	<div class="titulo"><?php echo $titulo;?></div>
            <form id="busqueda" action="busqueda.php" method="post">
                <table class="tablabus">
                    <tr>
                       	<td><?php campos("Maquinaria","codmaquinaria","select",$maq,0);?></td>
                        <td><?php campos("Repuesto","codrepuesto","select",$rep,0);?></td>
                         <td><?php campos("Fecha de Mantenimiento","fechamantenimiento","date","",0);?></td>
					</tr>
                    <tr>
                        <td><?php campos("Buscar","enviar","submit","",0,array("size"=>15));?></td>
                    </tr>
                </table>
            </form>
            <a href="nuevo.php" class="botoninfo">Registrar Mantenimiento de Maquinaria</a>
            </fieldset>
        </div>
        <div class="clear"></div>
        <div id="respuesta"></div>
    </div>
</div>
<?php include_once "../../piepagina.php";?>
