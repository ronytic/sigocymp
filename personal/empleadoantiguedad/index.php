<?php
include_once("../../login/check.php");
$titulo="Reporte de Empleados con Antiguedad";
$folder="../../";
include_once("../../funciones/funciones.php");

include_once("../../class/obra.php");
$obra=new obra;
$listaobras=todoLista($obra->mostrarTodo(),"codobra","nombre","-");
$listacontrato=array('0'=>0);
for($i=1;$i<=30;$i++){
$listacontrato[$i]=$i;
}
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
                    <td colspan="3">Tiempo de Antigüedad:</td>
                    </tr>
                    <tr>
                        <td><?php campos("Año","anio","select",$listacontrato);?></td>
                        <td><?php campos("Mes","mes","text","0",0);?></td>
                        <td><?php campos("Dias","dias","text","0",0);?></td>
                        <td><?php campos("Fecha Referente","fecha","date",date('Y-m-d'),0);?></td>
					</tr>
                    <tr>
                        <td><?php campos("Ver Reporte","enviar","submit","",0,array("size"=>15));?></td>
                    </tr>
                </table>
            </form>
            </fieldset>
        </div>
        <div class="clear"></div>
        <div id="respuesta"></div>
    </div>
</div>
<?php include_once "../../piepagina.php";?>