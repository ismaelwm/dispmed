$(function() {


//Insertar medicamento
	$('#medicamentoform').submit(function () {

		$.post("bd/insertar_medicamento.php",$("#medicamentoform").serialize(), 

			function(data){
				
				if (data == ''){
					$('#nombre').val("");
					$('#marca').val("");
					$('#cantidad').val("");
					$('#tramo').val("");
					$('#estante').val("");
					$('#celda').val("");
					
					toast('Se ha agregado el medicamento!', 3000);
				}else{

					toast('Esta ubicación está ocupada!', 3000);

				}

			});

		return false;
	});



//Buscar medicamento	
	$('#searchButton').click(function() {
		

		var nombre = $('#buscar').val(), crite = $('#criterio').val(),
		etiqueta = '<table class= "striped" id=tablaMedicamento>'+
		'<tr><th>Nombre</th><th>T/Fármaco</th><th>Marca</th><th>Cantidad</th><th>Ubicación</th></tr><tr>';
		

		

		$.ajax({

			type : 'POST',
			url : 'bd/buscar_medicamento.php',
			data : {buscar:nombre, criterio:crite},
			success : function(d) {

				if (d==''){

					toast('No se encontraron coincidencias', 3000);

				}else{
					var r = d.split('*');
					for (var i = 0; i < r.length-1; i++) {

						if (r[i] == 'tr')
							etiqueta += '</tr><tr>';
						else
							etiqueta += '<td>'+ r[i]+'</td>';
					}
					etiqueta += '</tr></table>';  
					$('#tablaMedicamento').html(etiqueta); 
					
				}  
			}
		}); 
		
	});


//Reporte de medicamentos	
	$('#reporte').click(function() {

		

		var ffrom = $('#from').val(), funtil = $('#until').val(),
		etiqueta = '<table class= "striped" id=reporteMedicamento>'+
		'<tr><th>Usuario</th><th>Nombre</th><th>T/Fármaco</th><th>Marca</th><th>Cantidad</th><th>Ubicación</th><th>Fecha</th></tr><tr>';


		

		$.ajax({

			type : 'POST',
			url : 'bd/reporte_medicamento.php',
			data : {from:ffrom, until:funtil},
			success : function(data) {
				

				if (data.indexOf('*')==-1){

					toast('No se encontraron registros!', 3000);

				}else{
					var r = data.split('*');
					for (var i = 0; i < r.length-1; i++) {

						if (r[i] == 'tr')
							etiqueta += '</tr><tr>';
						else
							etiqueta += '<td>'+ r[i]+'</td>';
					}
					etiqueta += '</tr></table>';  
					$('#reporteMedicamento').html(etiqueta); 


				}  
			}
		}); 
		
	});

	//Exportar reporte
	$("#exportar").click(function(event) {
		$("#datos_a_enviar").val( $("<div>").append( $("#reporteMedicamento").eq(0).clone()).html());
		$("#ExportarTabla").submit();
	});

});