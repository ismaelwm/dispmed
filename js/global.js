$(function() {
	//inicializar calendario
	$('.datepicker').pickadate({
	});
	
	//inicializar selects
	$('select').material_select();
	
	//inicializar botón callapse
	$(".button-collapse").sideNav();
	
	//animación a las listas
	showStaggeredList('#staggered-test');


//inicializar tooltip
$('.tooltipped').tooltip({delay: 50});

//toast y mover de tab en el botón cancelar
$('#cancelar').click(function(){
	$('ul.tabs').tabs('select_tab', 'test1');
	toast('Se ha cancelado la operación!', 3000);	
});

//botón "+" mover a segundo tab
$('#btn1').click(function(){

	$('ul.tabs').tabs('select_tab', 'test2');
});

//Mayusculas todos los campos
$('input[type="text"]').keyup(function() {
	this.value=this.value.toUpperCase();
});
});