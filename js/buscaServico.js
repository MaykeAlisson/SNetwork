$(document).ready(function(){
  $('#btnBuscaPessoa').click(function(){
    

                    //requisicao ajax para página de pesquisa
                    $.ajax({
                      url: "get_servico.php",
                      method: 'post',
                      data: $('#formBuscaServico').serialize(),
                    }).done(function(retorno_requisicao) {
                      $('#addCard').html(retorno_requisicao);

                        //ação que será tomada após clicar no link de paginação
                        $('.paginar').click(function(){
                          var pagina_clicada = $(this).data('pagina_clicada');
                            pagina_clicada = pagina_clicada - 1; //necessário para ajusar o parâmetro offset

                            //recupera os parametros de paginacao do formulario
                            var registros_por_pagina = $('#registros_por_pagina').val();
                            var pagina_atual = $('#pagina_atual').val();

                            var offset_atualizado = pagina_clicada * registros_por_pagina;
                            //aplica o valor atualizado do offset ao campo do form
                            $('#offset').val(offset_atualizado);

                            //refaz a pesquisa (chamada recursiva do método)
                            $('#btnBuscaPessoa').click();
                          });
                      });

                    return false; //para não ativar a trigger de submit do formulário

                  });
});