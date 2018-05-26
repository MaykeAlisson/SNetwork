<?php

include ("conecta.php");

$maximoCar = 6;

$sql = "SELECT *FROM usuario ORDER BY id DESC LIMIT $maximoCar ";

$resultado_id = mysqli_query($conexao, $sql);


if ($resultado_id) {

	while ($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)) {
		echo '<div class=" cardUser col-md-12">
        <div class="cardNome">
        <span style="word-spacing: -6px;">'.$registro['nome'].'</span>
        </div>
        <div class="cardPro">
        <span class="glyphicon glyphicon-education" style="word-spacing: -7px;"> '.$registro['idProfissao'].'</span>
        <span class="cardPro2 glyphicon glyphicon-education" style="word-spacing: -7px;"> '.$registro['idProfissao2'].'</span>
        </div>
        <div class="cardInfo">
        <ul class="cardUl">
        <li class="cardLi">
        <span class="cardValue glyphicon glyphicon-globe"> '.$registro['idCidade'].'</span>
        <span class="cardValue glyphicon glyphicon-earphone" id="tel"> '.$registro['telefone'].'</span>
        </li>
        </ul>
        <div class="estrelas">
        <ul class="cardUl">
        <li class="cardLi">
        <span class="cardLabel">Status:</span>
        <span class="cardValue"> '.$registro['disponibilidade'].'</span>
        </li>
        <li class="cardLi">
        <span class="cardLabel">Especialização:</span>     
        <span class="cardValue"> '.$registro['observacao'].'</span>         
        </li>          
        </ul>
        </div>
        </div>
        </div>
        ';
    }

    
}else{
	echo "Erro na consulta de usuarios no banco de dados";
}


?>



