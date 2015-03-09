<?php 
session_start();
if($_SESSION['username']== 1)
    header('location: medicamento.php');
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8"/>
  <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
  <link rel="stylesheet" type="text/css" href="css/login.css">
  <link href="img/dispmed.ico" rel="shortcut icon" type="image/x-icon">
  <title>DispMed-Login</title>
</head>
<body>

  <div class="row">
    <div class="card col s12 m4 offset-m4 ">
      <img class="profile-img" src="img/logo_login.png">

      <!--empieza el formulario-->
      <form>

        <div class="row">
          <div class="input-field">
            <input id="username" type="text">
            <label  for="username">Usuario</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field">
            <input id="password" type="password" >
            <label for="password">Contraseña</label>
          </div>
        </div>
      </form>
      <button id="acceder" class="btn waves-effect waves-light col s12" >Acceder</button>
    </div>
    
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript">

        $(function() {

            $('#acceder').click(function() {
                
                var nombre = $('#username').val(), pass = $('#password').val();
                
                $.ajax({

                    type : 'POST',
                    url : 'bd/validar.php',
                    data : {username: nombre, password: pass},
                    success : function(data) {
                        
                      if (data.trim() == '') {
                        window.location = 'medicamento.php';
                      } 
                      else {
                        toast(data, 3000);
                      }
                    }
                });
            });  
        });

    </script>

    </body>
    </html>