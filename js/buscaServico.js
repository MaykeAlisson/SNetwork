$(document).ready( function(){

  $('#btnBuscaPessoa').click(function() {
    if($('#nomeServico').val().length > 0){
      $.ajax({
        url: 'get_servico.php',
        method: 'post',
        data: $('#formBuscaServico').serialize(),
        success: function(data) {
          $('#primeiraDiv').html(data);

          $('.btn-like').click(function(){
            var id_usuario = $(this).data('id_usuario');

            $('#btn-like-'+id_usuario).hide();

            $.ajax({
              url: 'like.php',
              method: 'post',
              data: { like_id_usuario: id_usuario },
              success:function (data) {
                alert('Registro realizado com sucesso');
              }
            });
            
          });
        }
      });
    }
  });

});