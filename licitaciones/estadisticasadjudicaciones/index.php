<?php
include_once("../../login/check.php");
$titulo="Reporte de Estadistico de Adjudicaciones";
$folder="../../";
include_once("../../funciones/funciones.php");

include_once("../../class/obra.php");
$obra=new obra;
$listaobras=todoLista($obra->mostrarTodo(),"codobra","nombre","-");
$listacontrato=array('0'=>0);
for($i=1;$i<=30;$i++){
$listacontrato[$i]=$i;
}

include_once("../../class/adjudicacion.php");
$adjudicacion=new adjudicacion;

$cantidadTotal=count($adjudicacion->mostrarTodo());
//echo $cantidadTotal;

foreach($adjudicacion->CantidadPorGrupo() as $ad){
	echo "['".$ad['entidad']."', ".porcentaje($cantidadTotal,$ad['Cantidad'])."],";	
}

include_once "../../cabecerahtml.php";
?>
<script language="javascript" src="../../js/highcharts.js" type="text/javascript"></script>
<?php include_once "../../cabecera.php";?>
<div class="grid_12">
	<div class="contenido">
    	<div class="grid_8 prefix_2 alpha">
        	<fieldset>
        	<div class="titulo"><?php echo $titulo;?></div>
            <!--<form id="busqueda" action="busqueda.php" method="post">
                <table class="tablabus">
                    <tr>
                        <td><?php campos("Código Entidad","codigoentidad","text","",1,array("size"=>15));?></td>
                        <td><?php campos("Entidad","entidad","text","",0,array("size"=>15));?></td>
                        <td><?php campos("Objeto de Contratación","objetocontratacion","text","",0,array("size"=>15));?></td>
                        <td><?php campos("Modalidad ","modalidad","text","",0,array("size"=>15));?></td>
					</tr>
                    <tr>
                        <td><?php campos("Ver Reporte","enviar","submit","",0,array("size"=>15));?></td>
                    </tr>
                </table>
            </form>-->
            <div id="respuesta">
        
        
        </div>
            </fieldset>
        </div>
        <div class="clear"></div>
        
        <script language="javascript">
       $(function () {
    var chart;
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'respuesta',
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: '<?php echo $titulo;?>'
            },
            tooltip: {
        	    pointFormat: '{series.name}: <b>{point.percentage}%</b>',
            	percentageDecimals: 1
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        color: '#000000',
                        connectorColor: '#000000',
                        formatter: function() {
                            return '<b>'+ this.point.name +'</b>: '+ this.percentage +' %';
                        }
                    }
                }
            },
            series: [{
                type: 'pie',
                name: 'Instituciones Adjudicadas',
                data: [
					<?php
					foreach($adjudicacion->CantidadPorGrupo() as $ad){
	echo "['".$ad['entidad']."', ".porcentaje($cantidadTotal,$ad['Cantidad'])."],";	
}
					?>
                    /*['Firefox',   45.0],
                    ['IE',       26.8],
                    {
                        name: 'Chrome',
                        y: 12.8,
                        sliced: true,
                        selected: true
                    },
                    ['Safari',    8.5],
                    ['Opera',     6.2],
                    ['Others',   0.7]*/
                ]
            }]
        });
    });
    
});
        </script>
    </div>
</div>
<?php include_once "../../piepagina.php";?>