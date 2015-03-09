$(function() {

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



	var wasclicked = false, tmp = '';
	$('#searchButton').click(function() {
		

		var nombre = $('#buscar').val(),
		etiqueta = '<table class= "striped" id=tablaMedicamento>'+
		'<tr><th>Nombre</th><th>T/Fármaco</th><th>Marca</th><th>Cantidad</th><th>Ubicación</th></tr><tr>';
		if (tmp != nombre)
			wasclicked = false;              

		if (wasclicked == false) {

			$.ajax({

				type : 'POST',
				url : 'bd/buscar_medicamento.php',
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
						$('#tablaMedicamento').html(etiqueta); 
						wasclicked = true;  
						tmp = nombre;
					}  
				}
			}); 
		}
	});
});