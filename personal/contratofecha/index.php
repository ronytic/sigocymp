<?php
include_once("../../login/check.php");
$titulo="Reporte de Contratos hasta la fecha";
$folder="../../";
include_once("../../funciones/funciones.php");

include_once("../../class/obra.php");
$obra=new obra;
$listaobras=todoLista($obra->mostrarTodo(),"codobra","nombre","-");

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
                        <td><?php campos("Fecha limite de Contrato","fechacontrato","date",date('Y-m-d'),1,array("size"=>15));?></td>
                        <td><?php campos("Obra <small>No seleccionar=Todos</small>","codobra","select",$listaobras,0);?></td>
                        <td><?php campos("Tipo Contrato","tipocontrato","search","",0);?></td>
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