   $(function() {

          $('#acceder').click(function() {
            
            var nombre = $('#username').val(), pass = $('#password').val();
            
            $.ajax({

              type : 'POST',
              url : 'bd/registrar.php',
              data : {username: nombre, password: pass},
              success : function(data) {
                toast(data, 3000);
                $('#username').val("");
                $('#password').val("");
              }
            });
          });

          $('#cancelar').click(function(){
            window.location = 'medicamento.php';

          });

        });
