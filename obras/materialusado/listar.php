<?php
include_once("../../login/check.php");
$titulo="Listado de Material de Obras";
$folder="../../";
include_once("../../funciones/funciones.php");

$n1archivo="avanceobra";
include_once '../../class/'.$n1archivo.'.php';
${$n1archivo}=new $n1archivo;
$avan=todolista(${$n1archivo}->mostrarTodo(),"codavanceobra","numeroavance,descripcion","-");
$n2archivo="materialobra";
include_once '../../class/'.$n2archivo.'.php';
${$n2archivo}=new $n2archivo;
$mat=todolista(${$n2archivo}->mostrarTodo(),"codmaterialobra","descripcion","");

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
                       	<td><?php campos("Avance de Obra","codavanceobra","select",$avan,0);?></td>
                        <td><?php campos("Material de obra","codmaterialobra","select",$mat,0);?></td>
                         <td><?php campos("Fecha de uso","fechauso","date","",0);?></td>
					</tr>
                    <tr>
                        <td><?php campos("Buscar","enviar","submit","",0,array("size"=>15));?></td>
                    </tr>
                </table>
            </form>
            <a href="nuevo.php" class="botoninfo">Asignar Material a Usado</a>
            </fieldset>
        </div>
        <div class="clear"></div>
        <div id="respuesta"></div>
    </div>
</div>
<?php include_once "../../piepagina.php";?>
