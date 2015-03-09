$(function() {

	$('#aceptar').click(function () {

		$.ajax({

			type : 'POST',
			url : 'bd/insertar_medico.php',
			data : {nombre : $('#nombre').val(), cedula: $('#cedula').val(), especialidad :$('#especialidad').val(), tanda: $('#tanda').val(), estado: $('#estado').val()},
			success : function(data) {

				if (data.trim() != '') {
					toast(data, 3000);
				} else {

					$('#nombre').val("");
					$('#cedula').val("");
					$('#especialidad').val("");
					toast('Se ha agregado el médico', 3000);
				}
			}
		});
	});

	var wasclicked = false, tmp = '';
	$('#searchButton').click(function() {
		

		var nombre = $('#buscar').val(),
		etiqueta = '<table class= "striped" id=tablaMedico>'+
		'<tr><th>Nombre</th><th>Cedula</th><th>Tanda</th><th>Especialidad</th><th>Estado</th></tr><tr>';
		if (tmp != nombre)
			wasclicked = false;              

		if (wasclicked == false) {

			$.ajax({

				type : 'POST',
				url : 'bd/buscar_medico.php',
				data : {buscar:nombre},
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
						wasclicked = true;  
						tmp = nombre; 
					} 
				}

			}); 
		}
	});
});