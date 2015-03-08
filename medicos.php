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

	<title>DispMed-Gestión de Médicos</title>
	
</head>
<body>
	
	<div class="row">
		<div class="col s12">
			
			<nav>
				<div class="nav-wrapper">
					<div class="col s12">
						<a href="medicamento.php" class="brand-logo"><img src="img/logo.png"></a>
						<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
						<ul class="right hide-on-med-and-down" id="staggered-test">
							<li><a href="medicamento.php">Medicamento</i></a></li>
							<li><a href="medicos.php">Médico</a></li>
							<li><a href="bd/cerrarsesion.php">Cerrar Sesión</a></li>
						</ul>
						<ul class="side-nav" id="mobile-demo">
							<li><a href="medicamento.php">Medicamento</i></a></li>
							<li><a href="medicos.php">Médico</a></li>
							<li><a href="bd/cerrarsesion.php">Cerrar Sesión</a></li>
						</ul>
					</div>
				</div>
			</nav>

			<ul class="tabs z-depth-1">
				<li class="tab col s6"><a class="active" href="#test1">Buscar Médico</a></li>
				<li class="tab col s6"><a href="#test2">Agregar Médico</a></li>
				
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

			<table class="striped" id="tablaMedico">
				<tr>
					<th>Nombre</th>
					<th>Cédula</th>
					<th>Tanda</th>
					<th>Especialidad</th>
					<th>Estado</th>
				</tr>
			</table>
			<div class="col s1 offset-s11">
				<a id="btn1" class="btn-floating btn-large waves-effect waves-light tooltipped" data-position="botton" data-delay="50" data-tooltip="Agregar"><i class="mdi-content-add"></i></a>
			</div>
		</div>
		

		<div id="test2" class="col s12">

			<form id="medicoform" name="medicoform" action="bd/insertar_medico.php" method="POST" enctype="plain/text">

				<div class="row">
					<div class="input-field col s6">
						<input name="nombre" id="nombre" type="text" pattern="[A-Z ]+" title="Solo letras" class="validate" required>
						<label for="nombre">Nombre</label>
					</div>
					
					<div class="input-field col s6">
						<input name="cedula" id="cedula" type="text" pattern="[0-9]{11}" title="Cédula sin guiones" x required>
						<label for="cedula">Cédula</label>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s6">
						<input name="especialidad" id="especialidad" type="text" pattern="[A-Z ]+" title="Solo letras" class="validate" required>
						<label for="especialidad">Especialidad</label>
					</div>
					

					<div class="col s6">
						<label>Tanda</label>
						<select name="tanda" id="tanda">
							<option value="0">Matutina</option>
							<option value="1">Vespertina</option>
						</select>
					</div>
				</div>

				<div class="row"> 
					<div class="col s6">
						<label>Estado</label>
						<select name="estado" id="estado">
							<option value="0">Activo</option>
							<option value="1">Inactivo</option>
						</select>
					</div>
				</div>

				<div class="buttons">
					<button id="aceptar" class="btn waves-effect waves-light" type="submit" name="action">Agregar</button>
					<button id = "cancelar" class="btn waves-effect red darken-1" type="button">Cancelar</button>
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
</script>

</body>
</html>
