<?php
include_once("../../login/check.php");
$titulo="Reporte  de Proveedores de Repuestos";
$folder="../../";
include_once("../../funciones/funciones.php");

include_once "../../cabecerahtml.php";
?>
<?php include_once "../../cabecera.php";?>
<div class="grid_12">
	<div class="contenido">
    	<div class="grid_8 prefix_2 alpha">
        	<fieldset>
        	<div class="titulo">Criterio de Búsqueda de Proveedores de Repuestos</div>
            <form id="busqueda" action="busqueda.php" method="post">
                <table class="tablabus">
                    <tr>
                        <td><?php campos("Nombre","nombre","text","",1,array("size"=>15));?></td>
                        <td><?php campos("Direccion","direccion","text","",0,array("size"=>15));?></td>
                        <td><?php campos("Teléfono","telefono","text","",0,array("size"=>15));?></td>
                        <td><?php campos("E-Mail","mail","text","",0,array("size"=>15));?></td>
                        					</tr>
                    <tr>

                        <td><?php campos("Buscar","enviar","submit","",0,array("size"=>15));?></td>
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