// ESTA FUNÇAO E RESPONSAVEL POR CAPITURAR O ID DO CAMPO ESTADO SELECIONADO
// E RETORNA A CIDADE DESTE ESTADO
$(function(){
	$("#estados").change(function(){
		var id = $(this). val();
		$.ajax({
			type: "POST",
			url: "exibe_cidade.php?id="+id,
			dataType: "text",
			success: function (res)
			{
				$("#cidades").children(".cidades").remove();
				$("#cidades").append(res);
			}
		});
	});  
});