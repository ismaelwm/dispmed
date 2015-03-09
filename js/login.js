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
