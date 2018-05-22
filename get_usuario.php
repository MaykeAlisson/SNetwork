<?php

include ("conecta.php");



$sql = "SELECT *FROM usuario ORDER BY id DESC";

$resultado_id = mysqli_query($conexao, $sql);

if ($resultado_id) {

	while ($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)) {
		echo '<div class="cardUser">
        <div class="cardLike">
        <span>Recomendar</span>
        <button type="button" class="btn-like" id="btn-like-'.$registro['id'].'" data-id_usuario="'.$registro['id'].'">Like</button>
        </div>
        <div class="cardNome">
        <span>'.$registro['nome'].'</span>
        </div>
        <div class="cardPro">
        <span>'.$registro['idProfissao'].'</span>
        </div>
        <div class="cardInfo">
        <ul class="cardUl">
        <li class="cardLi">
        <span class="cardLabel">Cidade</span>
        <span class="cardValue">'.$registro['idCidade'].'</span>
        </li>
        <li class="cardLi">
        <span class="cardLabel">Status</span>
        <span class="cardValue">'.$registro['disponibilidade'].'</span>
        </li>
        <li class="cardLi">
        <span class="cardLabel">Like</span>
        <span class="cardValue">'.$registro['avaliacao'].'</span>
        </li>
        </ul>
        </div>
        <div class="cardTel">
        <span>'.$registro['telefone'].'</span>
        </div>
        </div>
        ';
    }

    
}else{
	echo "Erro na consulta de usuarios no banco de dados";
}


?>

<script type="text/javascript">
    $(document).ready( function () {

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
    })
</script>