<?php
include_once("../../login/check.php");
$titulo="Listado de Archivos de Adjudicaciones";
$folder="../../";
include_once("../../funciones/funciones.php");
$narchivo="adjudicacion";
include_once '../../class/'.$narchivo.'.php';
${$narchivo}=new $narchivo;
$datos=todolista(${$narchivo}->mostrarTodo(),"codadjudicacion","codigoentidad,objetocontratacion","-");

$n1archivo="documentocomun";
include_once '../../class/'.$n1archivo.'.php';
${$n1archivo}=new $n1archivo;
$datos1=todolista(${$n1archivo}->mostrarTodo(),"coddocumentocomun","nombre,tipo","-");

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
                        <td><?php campos("Documento Común","coddocumentocomun","select",$datos1,1);?></td>
                        <td><?php campos("Adjudicación","codadjudicacion","select",$datos,0);?></td>
                        <td><?php campos("Observación","obs","text","",0,array("size"=>15));?></td>
					</tr>
                    <tr>
                        <td><?php campos("Buscar","enviar","submit","",0,array("size"=>15));?></td>
                    </tr>
                </table>
            </form>
            <a href="nuevo.php" class="botoninfo">Registrar Nuevo Documento Adjudicación</a>
            </fieldset>
        </div>
        <div class="clear"></div>
        <div id="respuesta"></div>
    </div>
</div>
<?php include_once "../../piepagina.php";?>
