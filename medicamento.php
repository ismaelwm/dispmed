<?php 
session_start();
if($_SESSION['username']!= 1)
	header('location: index.php');
?>

<html>
<head>
	<meta charset="utf-8"/>
	<!--Import materialize.css-->
	<link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
	<link href="img/dispmed.ico" rel="shortcut icon" type="image/x-icon">
	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>

	<title>DispMed-Gestión de Medicamentos</title>
</head>
<body>

	<div class="row">

		<div class="col s12">
			<nav>
				<div class="nav-wrapper">
					<div class="col s12">
						<a href="#" class="brand-logo"><img src="img/logo.png"></a>
						<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
						<ul class="right hide-on-med-and-down" id="staggered-test">
							<li><a href="medicamento.php">Medicamento</i></a></li>
							<li><a href="medicos.php">Médico</a></li>
							<li><a href="bd/CerrarSesion.php">Cerrar Sesión</a></li>
						</ul>
						<ul class="side-nav" id="mobile-demo">
							<li><a href="medicamento.php">Medicamento</i></a></li>
							<li><a href="medicos.php">Médico</a></li>
							<li><a href="bd/cerrarsesion.php">Cerrar Sesión</a></li>
						</ul>
					</div>
				</div>
			</nav>

			<ul class="tabs z-depth-1" id="staggered-test">
				<li class="tab col s4"><a class="active" href="#test1">Buscar Medicamento</a></li>
				<li class="tab col s4"><a href="#test2">Agregar Medicamento</a></li>
			</ul>
		</div>
		
		<div id="test1" class="col s12">

			<form>
				<div class="input-field col s12">
					<input id="buscar" name = "buscar" type="text" class="validate">
					<label for="buscar">Buscar</label>
				</div>
			</form>

			<a class="btn waves-effect" id="searchButton">Buscar
				<i class="mdi-content-send right"></i>
			</a>


			<table class="striped" id="tablaMedicamento">
				<tr>
					<th>Nombre</th>
					<th>T/Fármaco</th>
					<th>Marca</th>
					<th>Cantidad</th>
					<th>Ubicacion</th>
				</tr>
			</table>

			<div class="col s1 offset-s11">
				<a id="btn1" class="btn-floating btn-large waves-effect waves-light tooltipped" data-position="botton" data-delay="50" data-tooltip="Agregar"><i class="mdi-content-add"></i></a>
			</div>

			
		</div>

		
		<div id="test2" class="col s12">

			<form id="medicamentoform" name="medicamentoform" action="bd/insertar_medicamento.php" method="POST" enctype="plain/text">

				<div class="row">
					<div class="input-field col s6">
						<input name="nombre" id="nombre" type="text" class="validate" required>
						<label for="nombre">Nombre</label>
					</div>
					
					<div class="input-field col s6">
						<input name="marca" id="marca" type="text" class="validate" required>
						<label for="marca">Marca</label>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s6">
						<input name="cantidad" id="cantidad" type="text" pattern="[0-9]+" title="Solo números" class="validate" required>
						<label for="cantidad">Cantidad</label>
					</div>
					
					<div class="col s6">
						<label>Tipo Fármaco</label>
						<select name="tipoFarmaco" id="tipoFarmaco">
							<option value="" disabled selected>Seleccione un tipo</option>
							<option value="1">Capsula</option>
							<option value="2">Comprimido</option>
							<option value="3">Jarabe</option>
						</select>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s6">
						<input name="tramo" id="tramo" type="text" placeholder="1" pattern="[0-9]+" title="Solo números" class="validate" required>
						<label for="tramo">Tramo</label>
					</div>
					
					<div class="input-field col s6">
						<input name="estante" id="estante" type="text" placeholder="B" pattern="[A-Z]" title="Solo letras" class="validate" required>
						<label for="estante">Estante</label>
					</div>
				</div>


				<div class="row">
					<div class="input-field col s6">
						<input name="celda" id="celda" type="text" placeholder="2" pattern="[0-9]+" title="Solo números" class="validate" required>
						<label for="celda">Celda</label>
					</div>
				</div>



				<div class="buttons">
					<button id="aceptar" class="btn waves-effect waves-light" type="submit" name="action">Agregar</button>
					<button id = "cancelar" class="red darken-1 waves-effect btn" type="button">Cancelar</button>
				</div>
			</form>
		</div>
		
		<!--Import jQuery before materialize.js-->
		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="js/materialize.min.js"></script>
		<script type="text/javascript" src="js/myjs.js"></script>

		<script type="text/javascript">

			$(function() {


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
</script>

</body>
</html>
