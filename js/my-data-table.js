$(document).ready(function(){
	$('#table-bootstrap').dataTable({
		"oLanguage": {
			"oPaginate":{
				"sPrevious": "Anterior ",
				"sNext": "Proximo"	
					},
				"sLengthMenu": "Mostrar _MENU_ resultado(s)",
				"sSearch": "Pesquisar: ",
				"sInfo": "Mostrando _START_ a _END_ de _TOTAL_",
				"sInfoFiltered": "(Total: _MAX_ resultado(s))",
				"sZeroRecords": "Resultado nao encontrado",
				"sInfoEmpty": "Sem resultados"
		}
	});
});