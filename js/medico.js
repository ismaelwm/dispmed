$(function() {

	$('#medicoform').submit(function () {

		$.post("bd/insertar_medico.php",$("#medicoform").serialize(), 	

			function(data){
				
				if (data == ''){
					$('#nombre').val("");
					$('#cedula').val("");
					$('#especialidad').val("");
					toast('Se ha agregado el médico!', 3000);
				}else{

					toast('Esta cédula ya está registrada!', 3000);

				}


			});

		return false;
	});

	
	$('#searchButton').click(function() {
		

		var nombre = $('#buscar').val(), crite = $('#criterio').val(),
		etiqueta = '<table class= "striped" id=tablaMedico>'+
		'<tr><th>Nombre</th><th>Cedula</th><th>Tanda</th><th>Especialidad</th><th>Estado</th></tr><tr>';


		

		$.ajax({

			type : 'POST',
			url : 'bd/buscar_medico.php',
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
					$('#tablaMedico').html(etiqueta); 
					
				} 
			}

		}); 
		
	});

	$('#reporte').click(function() {

		

		var ffrom = $('#from').val(), funtil = $('#until').val(),
		etiqueta = '<table class= "striped" id=reporteMedico>'+
		'<tr><th>Usuario</th><th>Nombre</th><th>Cedula</th><th>Tanda</th><th>Especialidad</th><th>Estado</th><th>Fecha</th></tr><tr>';


		

		$.ajax({

			type : 'POST',
			url : 'bd/reporte_medico.php',
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
					$('#reporteMedico').html(etiqueta); 


				}  
			}
		}); 
		
	});

	$("#exportar").click(function(event) {
		$("#datos_a_enviar").val( $("<div>").append( $("#reporteMedico").eq(0).clone()).html());
		$("#ExportarTabla").submit();
	});

});