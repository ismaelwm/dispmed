$(function() {
	$('select').material_select();
	
	$(".button-collapse").sideNav();
	
	showStaggeredList('#staggered-test');
	
	$('.tooltipped').tooltip({delay: 50});
	
	$('#cancelar').click(function(){
		$('ul.tabs').tabs('select_tab', 'test1');
		toast('Se ha cancelado la operación', 3000);	
	});
	
	$('#btn1').click(function(){
		
		$('ul.tabs').tabs('select_tab', 'test2');
	});
	
	/*$('#aceptar').click(function(){
		toast('Se ha agregado el elemento', 3000);	
	});
*/

$('#medicoform').submit(function () {

	$.post("bd/insertar_medico.php",$("#medicoform").serialize(), function(data){
		$('#nombre').val("");
		$('#cedula').val("");
		$('#especialidad').val("");
	});
	return false;
});



$('#medicamentoform').submit(function () {

	$.post("bd/insertar_medicamento.php",$("#medicamentoform").serialize(), function(data){
		$('#nombre').val("");
		$('#marca').val("");
		$('#cantidad').val("");
		$('#tramo').val("");
		$('#estante').val("");
		$('#celda').val("");
	});
	return false;
});


$('input[type="text"]').keyup(function() {
	this.value=this.value.toUpperCase();
});
});