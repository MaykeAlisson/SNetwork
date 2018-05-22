//ESTA FUNÇAO E RESPONSAVEL POR CAREGAR OS CARDS
$(document).ready( function(){


	function atualizaCard(){
        // CARREGA CARDS
        $.ajax({
        	url: 'get_usuario.php',
        	success: function (data) {
        		$('#addCard').html(data);

          }
        });
      }

      atualizaCard();

    });




