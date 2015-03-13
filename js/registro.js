    $(function() {

      $('select').material_select();
      
      $('#acceder').click(function() {

        var nombre = $('#username').val(), pass = $('#password').val(), tipou = $('#tipo').val();

        $.ajax({

          type : 'POST',
          url : 'bd/registrar.php',
          data : {username: nombre, password: pass, tipo: tipou},
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
