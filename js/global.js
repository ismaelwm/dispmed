$(function() {

	$('select').material_select();
	
	$(".button-collapse").sideNav();
	
	showStaggeredList('#staggered-test');
	
	$('.tooltipped').tooltip({delay: 50});
	
	$('#cancelar').click(function(){
		$('ul.tabs').tabs('select_tab', 'test1');
		toast('Se ha cancelado la operación!', 3000);	
	});
	
	$('#btn1').click(function(){
		
		$('ul.tabs').tabs('select_tab', 'test2');
	});
	

$('input[type="text"]').keyup(function() {
	this.value=this.value.toUpperCase();
});
});