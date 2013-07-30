<?php
include_once("../../login/check.php");
$titulo="Listado de Lubricante Registrados";
$folder="../../";
include_once("../../funciones/funciones.php");

$n1archivo="fichakardex";
include_once '../../class/'.$n1archivo.'.php';
${$n1archivo}=new $n1archivo;
$fk=todolista(${$n1archivo}->mostrarTodo(),"codfichakardex","fechakardex,detalleservicio"," - ");

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
                       	<td><?php campos("Ficha Kardex","codfichakardex","select",$fk,0);?></td>
                        <td><?php campos("Descripción","descripcion","text","",0);?></td>
					</tr>
                    <tr>
                        <td><?php campos("Buscar","enviar","submit","",0,array("size"=>15));?></td>
                    </tr>
                </table>
            </form>
            <a href="nuevo.php" class="botoninfo">Registrar de Lubricante</a>
            </fieldset>
        </div>
        <div class="clear"></div>
        <div id="respuesta"></div>
    </div>
</div>
<?php include_once "../../piepagina.php";?>
