<?php 
include_once '../bootstrap.php';

use system\model\GraficoClientes;


?>
var $grafico1 = jQuery.noConflict();

$grafico1(document).ready(function(){
	
	
	$grafico1('#grafico3').highcharts({


		credits:{
			enabled: false
		},
				
		        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45,
                beta: 0
            }
        },
        
        title: {
            text: 'Quantidade de Clientes PJ por Executivo de Venda'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.y}</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                depth: 35,
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Quantidade',
            data: [
					<?php 
					$Clientes = new GraficoClientes();
					$Clientes->QuantidadeClientesPj();
					?>
            	  ]
        		}],
        		
        				 exporting: {
            filename: 'ClientesXExecutivoVenda'
        }
        		
    });
});