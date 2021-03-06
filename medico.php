<?php 
session_start();
if($_SESSION['username']== '')
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
							<li><a href="#">Médico</a></li>
							<li><a id="registro" href="registro.php">Registro</a></li>
							<li><a href="bd/cerrarsesion.php">Cerrar Sesión</a></li>
						</ul>
						<ul class="side-nav" id="mobile-demo">
							<li><a href="medicamento.php">Medicamento</i></a></li>
							<li><a href="#">Médico</a></li>
							<li><a id="registroCollapse" href="registro.php">Registro</a></li>
							<li><a href="bd/cerrarsesion.php">Cerrar Sesión</a></li>
						</ul>
					</div>
				</div>
			</nav>

			<ul class="tabs z-depth-1">
				<li class="tab col s4"><a class="active" href="#test1">Buscar Médico</a></li>
				<li class="tab col s4"><a href="#test2">Agregar Médico</a></li>
				<li class="tab col s4"><a href="#test3">Reportes</a></li>
			</ul>
		</div>
		
		<div id="test1" class="col s12">
			<form>
				<div class="row">
					<div class="input-field col s10">
						<input id="buscar" type="text" class="validate">
						<label for="buscar">Buscar</label>
					</div>
					<div class="col s2">
						<select id="criterio">
							<option value="Nombre">Nombre</option>
							<option value="Cedula">Cédula</option>
							<option value="Tanda">Tanda</option>
							<option value="Especialidad">Especialidad</option>
							<option value="Estado">Estado</option>
						</select>
					</div>
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

			<form id="medicoform" name="medicoform" method="POST" action="bd/insertar_medico.php" enctype="plain/text">

				<div class="row">
					<div class="input-field col s6">
						<input  id="nombre" name="nombre" type="text" pattern="[A-Z ]+" title="Solo letras" class="validate" required>
						<label for="nombre">Nombre</label>
					</div>
					
					<div class="input-field col s6">
						<input  id="cedula" name="cedula" type="text" pattern="[0-9]{11}" title="Cédula sin guiones" class="validate" required>
						<label for="cedula">Cédula</label>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s6">
						<input  id="especialidad" name="especialidad" type="text" pattern="[A-Z ]+" title="Solo letras" class="validate" required>
						<label for="especialidad">Especialidad</label>
					</div>
					

					<div class="col s6">
						<label>Tanda</label>
						<select id="tanda" name="tanda">
							<option value="Matutina">Matutina</option>
							<option value="Vespertina">Vespertina</option>
						</select>
					</div>
				</div>

				<div class="row"> 
					<div class="col s6">
						<label>Estado</label>
						<select  id="estado" name="estado">
							<option value="Activo">Activo</option>
							<option value="Inactivo">Inactivo</option>
						</select>
					</div>
				</div>
				<div class="buttons">
					<button id="aceptar" class="btn waves-effect waves-light">Agregar</button>
					<button id = "cancelar" class="btn waves-effect red darken-1" type="button">Cancelar</button>
				</div>
			</form>
		</div>
		

		<div id="test3" class ="col s12">
			<div class="row">
				<form>
					<div class="col s4">
						<label for="from">Desde</label>
						<input id="from" type="date" class="datepicker">
					</div>
					<div class="col s4">
						<label for="until">Hasta</label>
						<input id="until" type="date" class="datepicker">
					</div>
				</form>
				<button id="reporte" class="btn waves-effect waves-light col s4 " >Reporte</button>
				

				<form action="bd/exportar.php" method="post" id="ExportarTabla">
					<button id="exportar" class="btn waves-effect waves-light col s2 offset-s1" >Exportar</button>
					<input type="hidden" id="datos_a_enviar" name="datos_a_enviar" />
					<input type="hidden" id="tiporeporte" name="tiporeporte" value="Medico">
				</form>

			</div>

			<table class="striped" id="reporteMedico">
				<tr>
					<th>Usuario</th>
					<th>Nombre</th>
					<th>Cédula</th>
					<th>Tanda</th>
					<th>Especialidad</th>
					<th>Estado</th>
					<th>Fecha</th>
				</tr>
			</table>
			
		</div>

		<!--Import jQuery before materialize.js-->
		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="js/materialize.min.js"></script>
		<script type="text/javascript" src="js/global.js"></script>
		<script type="text/javascript" src="js/medico.js"></script>
		<script type="text/javascript">

			$(document).ready(function(){
				var tipo = '<?php echo $_SESSION['tipo']?>';
				if (tipo !='admin'){
					$('#registro').hide();
					$('#registroCollapse').hide();
				}	
			});

		</script>
		
	</body>
	</html>
